<?php
namespace App\Services;
use Illuminate\Support\Facades\Artisan;
class ArtisanService
{
    const ARTISAN = Artisan::class;
    public function call($command)
    {
        ARTISAN::call($command);
    }
}
