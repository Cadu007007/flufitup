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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

/* Design Testing routes */
Route::get('/user', function () {
    return view('user.home', ['active' => 'home']);
})->name('home');

Route::get('/packages', function () {
    $packages = collect();
    $packages->push( ['title' => 'Ad Hoc - Heavy', 'price' => '75 $', 'description'  => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry','button' =>'Subscribe']);
    $packages->push(['title'=> 'Bi-Weekly', 'price'=> '75 $', 'description'=> 'Lorem Ipsum is simply dummy text of the printing and typesetting industry','button'=>'Subscribe']);
    $packages->push(['title'=> 'Bi-Weekly – Big Job', 'price'=> '75 $', 'description'=> 'Lorem Ipsum is simply dummy text of the printing and typesetting industry','button'=>'Subscribe']);
    $packages->push(['title'=> 'Monthly', 'price'=> '75 $', 'description'=> 'Lorem Ipsum is simply dummy text of the printing and typesetting industry','button'=>'Subscribe']);
    $packages->push(['title'=> 'Monthly - Busy', 'price'=> '75 $', 'description'=> 'Lorem Ipsum is simply dummy text of the printing and typesetting industry','button'=>'Subscribe']);
    $packages->push(['title'=> 'Monthly - Heavy', 'price'=> '75 $', 'description'=> 'Lorem Ipsum is simply dummy text of the printing and typesetting industry','button'=>'Subscribe']);
    $packages->push(['title'=> 'Create your package', 'price'=> '', 'description'=> 'Lorem Ipsum is simply dummy text of the printing and typesetting industry','button'=>'Create']);
     
    return view('user.packages',  ['active' => 'packages', 'packages' => $packages]);
})->name('packages');

Route::get('/profile', function () {
    return view('user.profile', ['active' => 'profile']);
})->name('profile');

Route::get('/chat', function () {
    return view('user.chat', ['active' => 'chat']);
})->name('chat');

Route::get('/old_orders', function () {
    return view('user.old_orders', ['active' => 'old_orders']);
})->name('old_orders');

Route::get('/login', function () {
    return view('auth.login', ['active' => 'logout']);
})->name('login');
