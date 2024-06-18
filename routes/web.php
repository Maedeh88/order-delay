<?php

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
    return view('welcome');
});

Route::post('/delay_report', [\App\Http\Controllers\DelayReportController::class, 'orderDelayAnnounce']);
Route::post('/agent_assignment', [\App\Http\Controllers\QueueDelayController::class, 'agentAssign']);
Route::get('/get_total_delay', [\App\Http\Controllers\DelayReportController::class, 'getReportPerVendor']);
