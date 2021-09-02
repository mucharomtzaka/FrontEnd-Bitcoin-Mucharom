<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InfoController;

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



//info list exchange cryto curency 
Route::get('/info',[InfoController::class,'index']);

//Halaman convert idr to btc
Route::get('/idrtobtc',[InfoController::class,'create']);
//Halaman convert btc to idr
Route::get('/btctoidr',[InfoController::class,'create2']);

//post form idr to btc 
Route::post('/post_idr_btc',[InfoController::class,'store1']);

//post form btc to idr 
Route::post('/post_btc_idr',[InfoController::class,'store2']);
