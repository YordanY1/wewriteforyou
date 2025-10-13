<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Route;

class GenerateSitemap extends Command
{
    protected $signature = 'sitemap:generate';
    protected $description = 'Generate sitemap.xml for SEO';

    public function handle()
    {
        $this->info('🧭 Generating sitemap...');

        $staticRoutes = [
            'home',
            'how-it-works',
            'pricing',
            'reviews',
            'about',
            'rights',
            'contact',
            'terms',
            'privacy-policy',
            'cookie.policy',
        ];

        $urls = [];

        foreach ($staticRoutes as $routeName) {
            if (Route::has($routeName)) {
                $urls[] = url(route($routeName, [], false));
            }
        }

        if (empty($urls)) {
            $this->warn('⚠️ No valid routes found — sitemap not generated.');
            return;
        }

        $xml = '<?xml version="1.0" encoding="UTF-8"?>' . PHP_EOL;
        $xml .= '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">' . PHP_EOL;

        foreach ($urls as $url) {
            $priority = str_contains($url, url('/')) ? '1.0' : '0.8';
            $xml .= "  <url>\n";
            $xml .= "    <loc>{$url}</loc>\n";
            $xml .= "    <lastmod>" . now()->toDateString() . "</lastmod>\n";
            $xml .= "    <changefreq>weekly</changefreq>\n";
            $xml .= "    <priority>{$priority}</priority>\n";
            $xml .= "  </url>\n";
        }

        $xml .= '</urlset>';

        File::put(public_path('sitemap.xml'), $xml);

        $this->info('✅ Sitemap generated successfully: public/sitemap.xml');

        // Optional SEO ping
        try {
            @file_get_contents('https://www.google.com/ping?sitemap=' . urlencode(url('sitemap.xml')));
            @file_get_contents('https://www.bing.com/ping?sitemap=' . urlencode(url('sitemap.xml')));
            $this->info('🌍 Google & Bing notified successfully.');
        } catch (\Exception $e) {
            $this->warn('⚠️ Could not ping search engines: ' . $e->getMessage());
        }
    }
}
