<?php

use App\Http\Controllers\UserController;
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

// Route::get('/', function () {
//     return view('app');
// });

// Route::get('/route1',[UserController::class,'index'])->middleware('verified.email');
// Route::get('/route2',[UserController::class,'index2'])->middleware('admin.role');

Route::view('/{any?}', 'app')->where('any','.*');