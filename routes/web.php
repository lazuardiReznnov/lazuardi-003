<?php

use App\Http\Controllers\DashboardMaintenance;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardUnitController;
use App\Http\Controllers\DashboardPartsController;
use App\Http\Controllers\DashboardTypesController;
use App\Http\Controllers\DashboardModelsController;
use App\Http\Controllers\DashboardPartTenance;
use App\Http\Controllers\DashboardPartTenanceController;
use App\Http\Controllers\DashboardStockController;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

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

Route::resource(
    '/dashboard/unit/types',
    DashboardTypesController::class
)->except('show');

Route::get('/dashboard/unit/types/checkSlug', [
    DashboardTypesController::class,
    'checkSlug',
]);

Route::resource('/dashboard/units', DashboardUnitController::class);

Route::get('/dashboard/unit/getmodels', [
    DashboardUnitController::class,
    'getmodels',
]);

Route::post('/dashboard/Units/file-import', [
    DashboardUnitController::class,
    'fileImport',
]);

Route::get('/dashboard/Units/file-import-create', [
    DashboardUnitController::class,
    'fileImportCreate',
]);

Route::get('/dashboard/unit/checkSlug', [
    DashboardUnitController::class,
    'checkSlug',
]);

Route::resource(
    '/dashboard/unit/models',
    DashboardModelsController::class
)->except('show');

Route::get('/dashboard/unit/model/slug', [
    DashboardModelsController::class,
    'slug',
]);

Route::resource(
    '/dashboard/spareparts',
    DashboardPartsController::class
)->except('show');

// Route::get('/dashboard/part/cari', [DashboardPartsController::class, 'cari']);

Route::get('/dashboard/sparepart/getmodels', [
    DashboardPartsController::class,
    'getmodels',
]);

Route::get('/dashboard/sparepart/slug', [
    DashboardPartsController::class,
    'slug',
]);

Route::resource('/dashboard/stocks', DashboardStockController::class);

Route::get('/dashboard/stock/getsparepart', [
    DashboardStockController::class,
    'getsparepart',
]);

Route::resource('/dashboard/maintenances', DashboardMaintenance::class);

Route::controller(DashboardMaintenance::class)->group(function () {
    Route::get('/dashboard/maintenance/print/{maintenance:id}', 'print');

    Route::get('/dashboard/maintenance/{maintenance:id}/edit', 'editstatus');

    Route::put('dashboard/maintenance/{maintenance:id}', 'statusupdate');
});

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
