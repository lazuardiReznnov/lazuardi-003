<?php

use App\Http\Controllers\DashboardTypesController;
use App\Http\Controllers\DashboardModelsController;
use App\Http\Controllers\DashboardUnitController;

use Illuminate\Support\Facades\Route;

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

Route::resource('/dashboard/unit/models',DashboardModelsController::class);
