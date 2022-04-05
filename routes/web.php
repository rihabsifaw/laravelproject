<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostCtrl;
use App\Http\Controllers\LivreurCtrl;


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


 //for posts
 Route::get('/posts', function () {
  return redirect('/posts');
});
Route::resource('posts', PostCtrl::class);

//for livreurs
Route::get('/livreurs', function () {
  return redirect('/livreurs');
});
Route::resource('livreurs', LivreurCtrl::class);

//auth route for both
Route::group(['middleware' =>['auth']], function() {
    Route::get('/dashboard', 'App\Http\Controllers\DashboardController@index')->name
    ('dashboard');
}) ;
  

// for users
// Route::group([ 'middleware' => ['auth', 'role:client']], function() {
//     Route::get('/dashboard/myprofile','App\Http\Controllers\DashboardController@myprofile')
//     ->name('dashboard.myprofile');
//   });

  // for vendeur
// Route::group([ 'middleware' => ['auth', 'role:vendeur']], function() {
//     Route::get('/dashboard/articlecreate','App\Http\Controllers\DashboardController@articlecreate')
//     ->name('dashboard.articlecreate');
//   });

require __DIR__.'/auth.php';
