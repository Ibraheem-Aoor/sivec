<?php

namespace App\Http\Controllers;

use App\Services\CacheService;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    protected $cache_service , $request;
    public function __construct(CacheService $cache_service , Request $request)
    {
        $this->cache_service = $cache_service;
        $this->request = $request;
    }
}
