<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

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


/***************************** 
 *  TESTING ROUTES FOR DESIGN
/**************************** */


/***************************** 
 *  Home
/**************************** */

Route::get('/user', function () {
    $orders = collect();
    $orders->push(['id' => 1111111111,
                    'service'=>'Washing clothes',
                    'start_date' => '20/09/2020',
                    'price'=> '50 $',
                    'finish_date'=>"25/09/2020",
                    'status'=>"Test",
                    'service_return_duration'=>"Test",
                    'added_value_service'=>"Test",
                    'package_duration'=>"Test",
                    'number_of_pickups_per_package'=>"Test",
                    'volume_per_package'=>"Test",
                    'number_of_bags_per_package'=>"Test",
                    'pickup_address'=>"Test",
                    'drop_off_address'=>"Test",
                    'added_notes'=>"notes",
                    ]);

    $orders->push(['id' => 2222222222,
                    'service'=>'Washing clothes',
                    'start_date' => '20/09/2020',
                    'price'=> '120 $',
                    'finish_date'=>"Test",
                    'status'=>"Test",
                    'service_return_duration'=>"Test",
                    'added_value_service'=>"Test",
                    'package_duration'=>"Test",
                    'number_of_pickups_per_package'=>"Test",
                    'volume_per_package'=>"Test",
                    'number_of_bags_per_package'=>"Test",
                    'pickup_address'=>"Test",
                    'drop_off_address'=>"Test",
                    'added_notes'=>"notes",
                    ]);
                    
    return view('user.home.index', ['active' => 'home', 'orders' => $orders]);
})->name('home');


/***************************** 
 *  Packages
/**************************** */

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
    
    return view('user.packages.index',  ['active' => 'packages', 'packages' => $packages]);
})->name('packages');

Route::get('/packages/show', function () {
    return view('user.packages.show',  ['active' => 'packages']);
})->name('packages.show');

/***************************** 
 *  Profile
/**************************** */

Route::get('/profile', function () {
    return view('user.profile.index', ['active' => 'profile']);
})->name('profile');

Route::get('/profile/change_password', function () {
    return view('user.profile.change_password', ['active' => 'profile']);
})->name('profile.change_password');

Route::get('/profile/edit', function () {
    return view('user.profile.edit', ['active' => 'profile']);
})->name('profile.edit');


/***************************** 
 *  Chat
/**************************** */

Route::get('/chat', function () {
    return view('user.chat.index', ['active' => 'chat']);
})->name('chat');


/***************************** 
 *  Old Orders
/**************************** */

Route::get('/old_orders', function () {
    $orders = collect();
    $orders->push(['orderdate'=> '18/08/2020','ordernumber'=> '12121212121','startdate'=> '20/08/2020','finishdate'=> '20/08/2020','status'=> 'Delievered']);
    $orders->push(['orderdate'=> '21/08/2020','ordernumber'=> '12121212121','startdate'=> '20/08/2020','finishdate'=> '20/08/2020','status'=> 'Delievered']);
    $orders->push(['orderdate'=> '22/08/2020','ordernumber'=> '12121212121','startdate'=> '20/08/2020','finishdate'=> '20/08/2020','status'=> 'Delievered']);
    $orders->push(['orderdate'=> '23/08/2020','ordernumber'=> '12121212121','startdate'=> '20/08/2020','finishdate'=> '20/08/2020','status'=> 'Delievered']);
    $orders->push(['orderdate'=> '24/08/2020','ordernumber'=> '12121212121','startdate'=> '20/08/2020','finishdate'=> '20/08/2020','status'=> 'Delievered']);

    return view('user.old_orders.index', ['active' => 'old_orders','orders' => $orders]);
})->name('old_orders');

Route::get('/old_orders/show', function () {
    return view('user.old_orders.show', ['active' => 'old_orders']);
})->name('old_orders.show');



/***************************** 
 *  Verify Phone
/**************************** */

Route::get('/register/verifyphone', function () {
    return view('auth.verify_phone', ['active' => 'logout']);
})->name('verify_phone');



/***************************** 
 *  Set new Password
/**************************** */

Route::get('/password/new', function () {
    return view('auth.reset_password', ['active' => 'logout']);
})->name('reset_password');



/***************************** 
 *  Logout
/**************************** */

Route::get('/login', function () {
    return view('auth.login', ['active' => 'logout']);
})->name('logout');


Route::post('/dummy', function (Request $request) {
    return dd($request);
})->name('dummy');

