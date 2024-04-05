<?php

use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;
use Spatie\Sitemap\Sitemap;

/*
|--------------------------------------------------------------------------
| Console Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of your Closure based console
| commands. Each Closure is bound to a command instance allowing a
| simple approach to interacting with each command's IO methods.
|
*/

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote');

Artisan::command('sitemap:generate', function () {
    $sitemap = Sitemap::create();

    $sitemap->add(route('views.guest.home'));
    $sitemap->add(route('views.guest.brands'));
    $sitemap->add(route('views.guest.products'));
    $sitemap->add(route('views.guest.categories'));
    $sitemap->add(route('views.guest.contact'));
    $sitemap->add(route('views.guest.returns'));
    $sitemap->add(route('views.guest.terms'));
    $sitemap->add(route('views.guest.maintenance'));

    foreach (Brand::all() as $row) {
        $sitemap->add(route('views.guest.products', [
            'brand' => $row->slug,
        ]));
    }

    foreach (Category::all() as $row) {
        $sitemap->add(route('views.guest.products', [
            'category' => $row->slug,
        ]));
    }

    foreach (Product::all() as $row) {
        $sitemap->add(route('views.guest.details', $row->slug));
    }

    $sitemap->writeToFile(public_path('sitemap.xml'));

    /*$pingSearchEngines = new \Spatie\Sitemap\Pingers\SitemapPinger(config('app.url'));
    $pingSearchEngines->pingGoogle(config('services.google.site_verification'));
    $pingSearchEngines->pingBing(config('services.bing.site_verification'));*/
})->purpose('generate site map');
