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

    $packages->adhoc->push( ['id' => 1 , 'title' => 'Ad Hoc - Heavy', 'price' => '75 $', 'description'  => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry','button' =>'Subscribe']);
    $packages->adhoc->push( ['id' => 2 , 'title' => 'Ad Hoc - Heavy', 'price' => '75 $', 'description'  => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry','button' =>'Subscribe']);
    
    $packages->bi_weekly->push(['id' => 3 , 'title'=> 'Bi-Weekly', 'price'=> '75 $', 'description'=> 'Lorem Ipsum is simply dummy text of the printing and typesetting industry','button'=>'Subscribe']);
    $packages->bi_weekly->push(['id' => 4 , 'title'=> 'Bi-Weekly – Big Job', 'price'=> '75 $', 'description'=> 'Lorem Ipsum is simply dummy text of the printing and typesetting industry','button'=>'Subscribe']);
    
    $packages->monthly->push(['id' => 5, 'title'=> 'Monthly', 'price'=> '75 $', 'description'=> 'Lorem Ipsum is simply dummy text of the printing and typesetting industry','button'=>'Subscribe']);
    $packages->monthly->push(['id' => 6 , 'title'=> 'Monthly - Busy', 'price'=> '75 $', 'description'=> 'Lorem Ipsum is simply dummy text of the printing and typesetting industry','button'=>'Subscribe']);
    $packages->monthly->push(['id' => 7 , 'title'=> 'Monthly - Heavy', 'price'=> '75 $', 'description'=> 'Lorem Ipsum is simply dummy text of the printing and typesetting industry','button'=>'Subscribe']);
    
    return view('user.packages.index',  ['active' => 'packages', 'packages' => $packages]);
})->name('packages');

Route::get('/packages/show/{id}', function () {
    $packages = collect();
    $packages->push(['id' => 1111111111,
                    'package_duration'=>'1 Day',
                    'no_of_pickups' => '1 Pickup',
                    'no_of_bags'=> '2 Bags',
                    'max_weight'=>"30 Pounds",
                    'return_duration'=>"24 Hours",
                    'dry_clean_credit'=>"12 Points",
                    'added_value_service_credit'=>"10 Points",
                    'reward_points'=>"3.75 Points",
                    'price_of_extra_pound'=>"1.96/Lbs",
                    'advance_notice'=>"2 Days",
                    'price'=>'50',
                    'currency'=>'$',
                    
                    ]);


    return view('user.packages.show',  ['active' => 'packages','package' => $packages]);
})->name('package.show');

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
    $orders->push(['orderdate'=> '18/08/2020','ordernumber'=> '11111111111','startdate'=> '20/08/2020','finishdate'=> '20/08/2020','status'=> 'Delievered']);
    $orders->push(['orderdate'=> '21/08/2020','ordernumber'=> '22222222222','startdate'=> '20/08/2020','finishdate'=> '20/08/2020','status'=> 'Delievered']);
    $orders->push(['orderdate'=> '22/08/2020','ordernumber'=> '33333333333','startdate'=> '20/08/2020','finishdate'=> '20/08/2020','status'=> 'Delievered']);
    $orders->push(['orderdate'=> '23/08/2020','ordernumber'=> '44444444444','startdate'=> '20/08/2020','finishdate'=> '20/08/2020','status'=> 'Delievered']);
    $orders->push(['orderdate'=> '24/08/2020','ordernumber'=> '55555555555','startdate'=> '20/08/2020','finishdate'=> '20/08/2020','status'=> 'Delievered']);

    return view('user.old_orders.index', ['active' => 'old_orders','orders' => $orders]);
})->name('old_orders');

Route::get('/old_orders/show/{id}', function () {
    $order = collect();
    $order->push(['id' => 1111111111,
                    'service'=>'Wash and Fold',
                    'start_date' => '20/09/2020',
                    'price'=> '80 $',
                    'finish_date'=>"25/09/2020",
                    'status'=>"Delivered",
                    'service_return_duration'=>"Standard : Within 48 Hours",
                    'added_value_service'=>"All nature garment freshener",
                    'pickup_address'=>"12 - Amr Ibn El Aass - Miami - Alexandria",
                    'drop_off_address'=>"12 - Amr Ibn El Aass - Miami - Alexandria",
                    'added_notes'=>"Lorem Ipsum is simply dummy text of the printing and typesetting industry",
                    ]);
    return view('user.old_orders.show', ['active' => 'old_orders','order' => $order]);
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

