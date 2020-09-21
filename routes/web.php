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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/logout', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout' );
Auth::routes(['verify' => true]);
Auth::routes();

//Frontend Routes
Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('index');
Route::get('blogs', [App\Http\Controllers\HomeController::class, 'blogs'])->name('blogs');
Route::get('/models', [App\Http\Controllers\HomeController::class, 'models'])->name('models');
Route::get('models/grid', [App\Http\Controllers\HomeController::class, 'modelsgrid'])->name('models.grid');
Route::get('/find-talent', [App\Http\Controllers\HomeController::class, 'findtalent'])->name('findtalent');


//Backend Routes


Route::group([
	'prefix' => 'backend',
	'as' => 'backend.',
],function(){
Route::get('/', [App\Http\Controllers\Admin\DashboardController::class, 'dashboard'])->name('dashboard');
});

//postjob controller
Route::resource('postjob',App\Http\Controllers\PostJobController::class);