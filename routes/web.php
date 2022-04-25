<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardUnitController;
use App\Http\Controllers\DashboardPartsController;
use App\Http\Controllers\DashboardTypesController;
use App\Http\Controllers\DashboardModelsController;
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

Route::resource('/dashboard/spareparts', DashboardPartsController::class);

// Route::get('/dashboard/part/cari', [DashboardPartsController::class, 'cari']);

Route::get('/dashboard/sparepart/getmodels', [
    DashboardPartsController::class,
    'getmodels',
]);

Route::get('/dashboard/sparepart/slug', [
    DashboardPartsController::class,
    'slug',
]);