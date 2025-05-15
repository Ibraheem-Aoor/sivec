<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Spatie\Sitemap\Sitemap;
use Spatie\Sitemap\Tags\Url;
use App\Models\Service;

class GenerateSitemap extends Command
{
    protected $signature = 'generate:sitemap';
    protected $description = 'Generate the sitemap for the website';

    public function handle()
    {
        $sitemap = Sitemap::create();

        $locales = ['en', 'ar'];
        $staticPages = [
            '/',
            '/about',
            '/services',
            '/contact',
            '/branches',
        ];

        foreach ($locales as $locale) {
            foreach ($staticPages as $page) {
                $url = $locale === 'ar' ? "/ar{$page}" : $page;
                $sitemap->add(Url::create($url));
            }
        }

        $services = Service::with('translations')->get();
        foreach ($locales as $locale) {
            foreach ($services as $service) {
                $slug = $service->translate($locale)->slug;
                $url = $locale === 'ar' ? "/ar/service/{$slug}" : "/service/{$slug}";
                $sitemap->add(Url::create($url));
            }
        }


        $sitemap->writeToFile(public_path('sitemap.xml'));

        $this->info('Sitemap generated successfully');
    }
}
