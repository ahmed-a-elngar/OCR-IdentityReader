<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ExtracterController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group(["controller" => ExtracterController::class, "middleware" => ["api"]], function () {
    Route::post('/extract', "extract");
    Route::get('/enquiry', "enquiry");
});
