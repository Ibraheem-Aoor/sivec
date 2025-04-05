<?php

use App\Models\BusinessSetting;
use App\Models\ImageCategory;
use App\Models\ProjectCategory;
use App\Models\Service;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

function saveImage($path, $file)
{
    $full_stored_image_path = Storage::disk('public')->put($path, $file);
    return $full_stored_image_path;
}

function editImage($path, $file, $oldImage)
{
    deleteImage($oldImage);
    return saveImage($path, $file);
}
function moveFile($from, $to)
{
    if (is_file_exists($from)) {
        return Storage::disk('public')->move($from, $to);
    }
}

function deleteImage($oldImage)
{
    if ($oldImage != null) {

        $exists = Storage::disk('public')->exists($oldImage);
        if ($exists) {
            Storage::disk('public')->delete($oldImage);
            return true;
        }
    }
}

/**
 * get image url if exists. else return default placeholder image
 */
function getImageUrl($image)
{
    if (is_null($image)) {
        return asset('admin_assets/dist/img/product-placeholder.webp');
    }
    $exists = Storage::disk('public')->exists($image);
    if ($exists) {
        return Storage::url($image);
    } else {
        return asset('admin_assets/dist/img/product-placeholder.webp');
    }
}

if (!function_exists('is_file_exists')) {
    function is_file_exists($path, $disk = 'public'): bool
    {
        return Storage::disk($disk)->exists($path);
    }
}

/**
 * Download File From Storage.
 */
function downloadFile($path)
{
    $path = str_replace('storage/', '', $path);
    $exists = Storage::disk('public')->exists($path);
    if ($exists) {
        return Storage::disk('public')->download($path);
    }
}

/**
 * Generate Response
 * @param  bool $status
 * @param string $redirect
 * @param string $modal_to_hide
 * @param  string $row_to_delete
 * @param  bool $reset_form
 */
if (!function_exists('generateResponse')) {
    function generateResponse(
        $status,
        $redirect = null,
        $modal_to_hide = null,
        $row_to_delete = null,
        $reset_form = false,
        $reload = false,
        $table_reload = false,
        $table = null,
        $is_deleted = false,
        $message = null
    ) {
        $response_message = !is_null($message) ? ($message) : ($status ? __('general.response_messages.success') : __('general.response_messages.error'));
        return [
            'status' => $status,
            'message' => $response_message,
            'redirect' => $redirect ? $redirect : null,
            'modal_to_hide' => $modal_to_hide,
            'row_to_delete' => $row_to_delete,
            'reset_form' => $reset_form,
            'code' => $status ? 200 : 500,
            'reload' => $reload,
            'reload_table' => $table_reload,
            'table' => $table,
            'is_deleted' => $is_deleted,
        ];
    }
}
/**
 * Generate Api Response
 * @param  bool $status
 * @param numeric $code
 * @param array $data
 */
if (!function_exists('generateApiResoponse')) {
    function generateApiResoponse($status, $code, $data = [], $message = null)
    {
        $response = [
            'code' => $code,
            'status' => $status,
            'data' => $data,
        ];
        if ($message) {
            $response['message'] = $message;
        }
        return response()->json($response, $code);
    }
}



/**
 * get avilable locales
 * @return array
 */
if (!function_exists('getAvilableLocales')) {
    function getAvilableLocales()
    {
        return config('translatable.locales') ?? [];
    }
}
/**
 * Hash the given value
 * @param mixed $value
 * @return mixed
 */
if (!function_exists('makeHash')) {
    function makeHash($value)
    {
        return Hash::make($value);
    }
}


/**
 * get the auth user of a given guard
 * @param mixed $guard
 * @return mixed
 */
if (!function_exists('getAuthUser')) {
    function getAuthUser($guard = 'web')
    {
        return Auth::guard($guard)->user();
    }
}


if (!function_exists('generateUniqueRandomNumber')) {

    function generateUniqueRandomNumber($model, $column, $length)
    {
        // Generate a random number based on current year and random digits
        $current_year = date('Y');
        $remaining_length = $length - strlen($current_year);
        mt_srand();
        $random_number = $current_year . generateRandomDigits($remaining_length);
        if (columnValueExists($model, $column, $random_number)) {
            mt_srand();
            return generateUniqueRandomNumber($model, $column, $length);
        }
        return $random_number;
    }
}


if (!function_exists('generateRandomDigits')) {
    function generateRandomDigits($length)
    {
        $digits = '';
        for ($i = 0; $i < $length; $i++) {
            $digits .= mt_rand(0, 9);
        }
        return str_shuffle(str_shuffle($digits));
    }
}


if (!function_exists('columnValueExists')) {
    function columnValueExists($model, $column, $value)
    {
        return $model::where($column, $value)->exists();
    }
}


/**
 * get system only currency "SAR"
 * @return string
 */
if (!function_exists('getSystemCurrency')) {
    function getSystemCurrency()
    {
        return app()->getLocale() == 'ar' ? 'ريال' : 'SAR';
    }
}


/**
 * Format Price
 * @param double $price
 */

if (!function_exists('formatPrice')) {
    function formatPrice($price, $with_currency = true)
    {
        $format_price = number_format($price, 2, '.', ','); // 2 decimal places, decimal point is '.', thousands separator is ','

        return $with_currency ? ($format_price . ' ' . getSystemCurrency()) : ($format_price); // You can change the currency symbol as needed
    }
}






//highlights the selected navigation on admin panel
if (!function_exists('areActiveRoutes')) {
    function areActiveRoutes(array $routes, $output = "active")
    {
        foreach ($routes as $route) {
            if (Route::currentRouteName() == $route)
                return $output;
        }
    }
}



/**
 * Gather the meta data for the response.
 *
 * @param  LengthAwarePaginator  $paginated
 * @return array
 */
if (!function_exists('pagination')) {
    function pagination($paginated)
    {
        return [
            'current' => $paginated->currentPage(),
            'last' => $paginated->lastPage(),
            'base' => $paginated->url(1),
            'next' => $paginated->nextPageUrl(),
            'prev' => $paginated->previousPageUrl()
        ];
    }
}






if (!function_exists('getSetting')) {
    function getSetting($key, $default = null, $lang = false)
    {
        $settings = Cache::remember('business_settings', 86400, function () {
            return BusinessSetting::all();
        });

        if ($lang == false) {
            // $setting = $settings->where('key', $key)->first();
            $lang = app()->getLocale();
        }
        $setting = $settings->where('key', $key)->where('lang', $lang)->first();
        $setting = !$setting ? $settings->where('key', $key)->first() : $setting;
        return $setting == null ? $default : $setting->value;
    }
}




if (!function_exists('getAppEnv')) {
    function getAppEnv()
    {
        return env('APP_ENV', 'local');
    }
}


/**
 * return the session current locale
 */

if (!function_exists('getCurrentLocale')) {
    function getCurrentLocale()
    {
        return app()->getLocale();
    }
}

/**
 * retrive page settings
 */
if (!function_exists('getPageSettings')) {
    function getPageSettings($page = null)
    {
        return Cache::rememberForEver($page . '_' . getCurrentLocale(), function () use ($page) {
            return BusinessSetting::query()->wherePage($page)->whereLang(getCurrentLocale())->pluck('value', 'key');
        });
    }
}



/**
 * gallery parent categories to show in navBar.
 */
if (!function_exists('getProjectCategoriesForHome')) {
    function getProjectCategoriesForHome()
    {
        return Cache::rememberForever('project_parent_categories', function () {
            return ProjectCategory::query()
            ->whereNull('parent_id')
            ->with(['subCategories'])
            ->latest()
            ->get();
        });
    }
}

if (!function_exists('getHomeServices')) {
    function getHomeServices()
    {
        return Cache::rememberForever('home_page_services', function () {
            return Service::query()
                ->whereStatus('ACTIVE')
                ->with('category')
                ->limit(6)->get();
        });
    }
}


if (!function_exists('setImageCategorires')) {
    function setImageCategorires()
    {
        return Cache::rememberForever('image_categories', function () {
            return ImageCategory::query()
                ->whereNull('parent_id')
                ->orderBy('created_at', 'asc')
                ->with(['subCategories'])
                ->get();
        });
    }
}
