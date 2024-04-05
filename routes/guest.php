<?php

use App\Http\Controllers\GuestController;
use Illuminate\Support\Facades\Route;


Route::get('/', [GuestController::class, 'home_view'])->name('views.guest.home');
Route::get('/brands', [GuestController::class, 'brands_view'])->name('views.guest.brands');
Route::get('/products', [GuestController::class, 'products_view'])->name('views.guest.products');
Route::get('/catalogs', [GuestController::class, 'catalogs_view'])->name('views.guest.catalogs');
Route::get('/categories', [GuestController::class, 'categories_view'])->name('views.guest.categories');
Route::get('/products/{slug}', [GuestController::class, 'details_view'])->name('views.guest.details');
Route::get('/contact', [GuestController::class, 'contact_view'])->name('views.guest.contact');
Route::get('/quotations/{id}', [GuestController::class, 'quote_view'])->name('views.guest.quote');
Route::get('/returns-policy', [GuestController::class, 'returns_view'])->name('views.guest.returns');
Route::get('/terms-and-conditions', [GuestController::class, 'terms_view'])->name('views.guest.terms');
Route::get('/maintenance', [GuestController::class, 'maintenance_view'])->name('views.guest.maintenance');

Route::post('/contact', [GuestController::class, 'contact_action'])->name('actions.guest.contact');
