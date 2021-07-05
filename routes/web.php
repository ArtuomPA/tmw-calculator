<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\CalculatorController;
use App\Http\Controllers\BuildsListController;
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

Route::get('/', [CalculatorController::class,"viewBuild"]);

Route::get('/build/{id}', [CalculatorController::class,"viewBuild"]);

Route::get('/about', function () {
    return view('about');
});

Route::get('/faq', function () {
    return view('faq');
});

Route::get('/my-builds', [BuildsListController::class,"viewBuildsList"]);

Route::post('/ajax/calculate', [CalculatorController::class,"ajaxCalculate"]);
