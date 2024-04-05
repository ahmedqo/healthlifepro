<?php

use App\Http\Controllers\CatalogController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => '/admin', 'middleware' => ['auth']], function () {
    Route::get('/catalogs', [CatalogController::class, 'index_view'])->name('views.catalogs.index');
    Route::get('/catalogs/store', [CatalogController::class, 'store_view'])->name('views.catalogs.store');
    Route::get('/catalogs/{id}/patch', [CatalogController::class, 'patch_view'])->name('views.catalogs.patch');

    Route::get('/catalogs/fetch', [CatalogController::class, 'fetch_action'])->name('actions.catalogs.fetch');
    Route::post('/catalogs/store', [CatalogController::class, 'store_action'])->name('actions.catalogs.store');
    Route::patch('/catalogs/{id}/patch', [CatalogController::class, 'patch_action'])->name('actions.catalogs.patch');
    Route::delete('/catalogs/{id}/clear', [CatalogController::class, 'clear_action'])->name('actions.catalogs.clear');
});
