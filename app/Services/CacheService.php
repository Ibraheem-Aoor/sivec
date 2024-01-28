<?php
namespace App\Services;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Cache;

class CacheService
{
    const CACHE = Cache::class;

    public function rememberForTime($key, $value, $time, $time_unit)
    {
        $time_unit = 'add' . $time_unit;
        return self::CACHE::remember($key, now()->$time_unit($time), function () use ($value) {
            return $value;
        });
    }

    public function rememberForEver($key, $value)
    {
        if (!self::CACHE::has($key)) {
            return self::CACHE::rememberForever($key, function () use ($value) {
                return $value;
            });
        } else {
            return self::CACHE::get($key);
        }
    }


    /**
     * remmber the data from a given model (quering)
     */
    public function rememberFromModel(
        string $key,
        $model,
        array $conditions = [],
        array $relations = [],
        bool $is_pagination = false,
        int $pagination_count = 0,
        bool $is_forever = false,
        int $time = 0,
        string $time_unit = '',
    ) {
        if (!self::CACHE::has($key)) {
            $data = $this->prepareQueryFromModel($model, $conditions, $relations, $is_pagination, $pagination_count);
            return $is_forever ?
                $this->rememberForEver($key, $data)
                :
                $this->rememberForTime($key, $data, $time, $time_unit);
        } else {
            return self::CACHE::get($key);
        }
    }

    /**
     * Prepare The Query From The Given Model With The Given Conditions.
     */
    private function prepareQueryFromModel($model, array $conditions = [], array $relations = [], bool $is_pagination, int $pagination_count = 0)
    {
        $query = $model::query()->with($relations)->where($conditions);
        return $is_pagination ? $query->paginate($pagination_count) : $query->get();
    }

    public function forget($key)
    {
        CACHE::forget($key);
    }
}
