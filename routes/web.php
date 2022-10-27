<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AppController;



 Route::post('/appView/ran',[AppController::class,'ran'])->name('ran');

Route::post('/appView/create',[AppController::class,'createHashtag'])->name('createHashtag');

Route::get('/appView/random',[AppController::class,'randomView'])->name('randomView');


Route::resource('appView',AppController::class);



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
