<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ViewServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->shareData();
    }

    private function shareData()
    {
        View::share([
            'site_settings' => getPageSettings('site'),
            // 'about_page_settings' => getPageSettings('about'),
            // 'project_parent_categories' => getProjectCategoriesForHome(),
            'image_categories' => setImageCategorires(),
            'meta_desc' => __('custom.meta_data.desc'),
            'locale' => app()->getLocale(),
        ]);
    }
}
