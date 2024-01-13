<?php
namespace App\Services;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Cache;

class CacheService
{
    const CACHE =  Cache::class;
    public function forget($key)
    {
        CACHE::forget($key);
    }
}
