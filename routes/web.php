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
Route::get('/community', [App\Http\Controllers\HomeController::class, 'community'])->name('community');

Route::get('/magzine', [App\Http\Controllers\HomeController::class, 'magzine'])->name('magzine');
Route::get('/magzine/single', [App\Http\Controllers\HomeController::class, 'magzinesingle'])->name('magzine-single');

Route::get('/models', [App\Http\Controllers\HomeController::class, 'models'])->name('models');
Route::get('models/grid', [App\Http\Controllers\HomeController::class, 'modelsgrid'])->name('models.grid');
Route::get('models/single', [App\Http\Controllers\HomeController::class, 'modelsingle'])->name('models.single');
Route::get('/find-talent', [App\Http\Controllers\HomeController::class, 'findtalent'])->name('findtalent');



Route::get('/find-productions', [App\Http\Controllers\HomeController::class, 'findproductions'])->name('findproductions');
Route::get('/production/single', [App\Http\Controllers\HomeController::class, 'singleproduction'])->name('singleproduction');
Route::get('/production/apply', [App\Http\Controllers\HomeController::class, 'applyproduction'])->name('applyproduction');


//Backend Routes


Route::group([
	'prefix' => 'backend',
	'as' => 'backend.',
],function(){
Route::get('/', [App\Http\Controllers\Admin\DashboardController::class, 'dashboard'])->name('dashboard');
});

//postjob controller
Route::resource('postjob',App\Http\Controllers\PostJobController::class);