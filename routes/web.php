<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardMaintenance;
use App\Http\Controllers\DashboardUnitController;
use App\Http\Controllers\DashboardOwnerController;
use App\Http\Controllers\DashboardPartsController;
use App\Http\Controllers\DashboardStockController;
use App\Http\Controllers\DashboardTypesController;
use App\Http\Controllers\DashboardModelsController;
use App\Http\Controllers\DashboardPartTenanceController;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;
use App\Http\Controllers\DashboardCategoriePartController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('dashboard.index');
});

// Route Type Unit
Route::resource(
    '/dashboard/unit/types',
    DashboardTypesController::class
)->except('show');

Route::controller(DashboardTypesController::class)->group(function () {
    Route::get('/dashboard/unit/types/checkSlug', 'checkSlug');
    Route::post('/dashboard/unit/types/file-import', 'fileImport');
    Route::get('/dashboard/unit/types/file-import-create', 'fileImportCreate');
});
// End Route End Type

// Route Unit
Route::resource('/dashboard/units', DashboardUnitController::class);

Route::controller(DashboardUnitController::class)->group(function () {
    Route::get('/dashboard/unit/getmodels', 'getmodels');
    Route::post('/dashboard/unit/file-import', 'fileImport');
    Route::get('/dashboard/unit/file-import-create', 'fileImportCreate');
    Route::get('/dashboard/unit/checkSlug', 'checkSlug');
});
// End Route Unit

//Route Models Unit
Route::resource(
    '/dashboard/unit/models',
    DashboardModelsController::class
)->except('show');

Route::controller(DashboardModelsController::class)->group(function () {
    Route::get('/dashboard/unit/model/slug', 'slug');
    Route::post('/dashboard/unit/models/file-import', 'fileImport');
    Route::get('/dashboard/unit/models/file-import-create', 'fileImportCreate');
});

// end Models Unit

// Route Sparepart
Route::resource(
    '/dashboard/spareparts',
    DashboardPartsController::class
)->except('show');

// Route::get('/dashboard/part/cari', [DashboardPartsController::class, 'cari']);

Route::controller(DashboardPartsController::class)->group(function () {
    Route::get('/dashboard/sparepart/getmodels', 'getmodels');
    Route::get('/dashboard/sparepart/slug', 'slug');
    Route::get('/dashboard/spareparts/file-import-create', 'fileImportCreate');
    Route::post('/dashboard/spareparts/file-import', 'fileImport');
});
// End Route Sparepart

// Route Stok
Route::resource('/dashboard/stocks', DashboardStockController::class);

Route::get('/dashboard/stock/getsparepart', [
    DashboardStockController::class,
    'getsparepart',
]);

// route Maintenance
Route::resource('/dashboard/maintenances', DashboardMaintenance::class);

Route::controller(DashboardMaintenance::class)->group(function () {
    Route::get('/dashboard/maintenance/print/{maintenance:id}', 'print');
    Route::get('/dashboard/maintenance/{maintenance:id}/edit', 'editstatus');
    Route::put('dashboard/maintenance/{maintenance:id}', 'statusupdate');
});
// end Route Maintenance

// Route Part Tenance
Route::controller(DashboardPartTenanceController::class)->group(function () {
    Route::get(
        '/dashboard/maintenance/partTenances/{maintenance:id}',
        'create'
    );
    Route::post('/dashboard/maintenance/partTenances', 'store');
    Route::get(
        'dashboard/maintenance/partTenances/{partTenance:id}/edit',
        'edit'
    );
    Route::put('dashboard/maintenance/partTenances/{partTenance:id}', 'update');
    Route::delete(
        'dashboard/maintenance/partTenances/{partTenance:id}',
        'destroy'
    );
});
// End Route Part Tenance

// Route Sparepart Category
Route::resource(
    '/dashboard/sparepart/categorieParts',
    DashboardCategoriePartController::class
)->except('show');

Route::controller(DashboardCategoriePartController::class)->group(function () {
    Route::get('dashboard/sparepart/categorieParts/slug', 'slug');
    Route::get(
        'dashboard/sparepart/categorieParts/file-import-create',
        'fileImportCreate'
    );
    Route::post(
        '/dashboard/sparepart/categorieParts/file-import',
        'fileImport'
    );
});

// end Route Sparepart Category
Route::resource('/dashboard/owners', DashboardOwnerController::class);
