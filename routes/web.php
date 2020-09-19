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
    $packages->adhoc= collect();
    $packages->bi_weekly= collect();
    $packages->monthly= collect();

    $packages->adhoc->push( ['title' => 'Ad Hoc - Heavy', 'price' => '75 $', 'description'  => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry','button' =>'Subscribe']);
    $packages->adhoc->push( ['title' => 'Ad Hoc - Heavy', 'price' => '75 $', 'description'  => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry','button' =>'Subscribe']);
    
    $packages->bi_weekly->push(['title'=> 'Bi-Weekly', 'price'=> '75 $', 'description'=> 'Lorem Ipsum is simply dummy text of the printing and typesetting industry','button'=>'Subscribe']);
    $packages->bi_weekly->push(['title'=> 'Bi-Weekly – Big Job', 'price'=> '75 $', 'description'=> 'Lorem Ipsum is simply dummy text of the printing and typesetting industry','button'=>'Subscribe']);
    
    $packages->monthly->push(['title'=> 'Monthly', 'price'=> '75 $', 'description'=> 'Lorem Ipsum is simply dummy text of the printing and typesetting industry','button'=>'Subscribe']);
    $packages->monthly->push(['title'=> 'Monthly - Busy', 'price'=> '75 $', 'description'=> 'Lorem Ipsum is simply dummy text of the printing and typesetting industry','button'=>'Subscribe']);
    $packages->monthly->push(['title'=> 'Monthly - Heavy', 'price'=> '75 $', 'description'=> 'Lorem Ipsum is simply dummy text of the printing and typesetting industry','button'=>'Subscribe']);
    
    return view('user.packages',  ['active' => 'packages', 'packages' => $packages]);
})->name('packages');

Route::get('/profile', function () {
    return view('user.profile', ['active' => 'profile']);
})->name('profile');

Route::get('/chat', function () {
    return view('user.chat', ['active' => 'chat']);
})->name('chat');

Route::get('/old_orders', function () {
    $orders = collect();
    $orders->push(['orderdate'=> '18/08/2020','ordernumber'=> '12121212121','startdate'=> '20/08/2020','finishdate'=> '20/08/2020','status'=> 'Delievered']);
    $orders->push(['orderdate'=> '21/08/2020','ordernumber'=> '12121212121','startdate'=> '20/08/2020','finishdate'=> '20/08/2020','status'=> 'Delievered']);
    $orders->push(['orderdate'=> '22/08/2020','ordernumber'=> '12121212121','startdate'=> '20/08/2020','finishdate'=> '20/08/2020','status'=> 'Delievered']);
    $orders->push(['orderdate'=> '23/08/2020','ordernumber'=> '12121212121','startdate'=> '20/08/2020','finishdate'=> '20/08/2020','status'=> 'Delievered']);
    $orders->push(['orderdate'=> '24/08/2020','ordernumber'=> '12121212121','startdate'=> '20/08/2020','finishdate'=> '20/08/2020','status'=> 'Delievered']);

    return view('user.old_orders', ['active' => 'old_orders','orders' => $orders]);
})->name('old_orders');


Route::get('/register/verifyphone', function () {
    return view('auth.verify_phone', ['active' => 'logout']);
})->name('verify_phone');


Route::get('/password/new', function () {
    return view('auth.reset_password', ['active' => 'logout']);
})->name('reset_password');



Route::get('/login', function () {
    return view('auth.login', ['active' => 'logout']);
})->name('login');
