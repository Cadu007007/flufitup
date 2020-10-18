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
    
    return view('welcome',  ['active' => 'packages', 'packages' => $packages]);


});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


/******************************************************** 
 ************  TESTING ROUTES FOR DESIGN   **************
/********************************************************/


/******************************
 **** Start of USER ROUTES ****
/******************************/


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



Route::get('/order/edit/{id}', function () {
    $order = collect([]);

    $order->week_one = collect();
    $order->week_one->pickup_one = collect();
    $order->week_one->pickup_two = collect();

    $order->week_two = collect();
    $order->week_two->pickup_one = collect();
    $order->week_two->pickup_two = collect();

    $order->week_three = collect();
    $order->week_three->pickup_one = collect();
    $order->week_three->pickup_two = collect();

    $order->week_four = collect();
    $order->week_four->pickup_one = collect();
    $order->week_four->pickup_two = collect();

    $order->week_one->pickup_one->push(['pickup_one_day' => 'Sunday',
                            'pickup_one_date' => "05/23/2020", 
                            'pickup_one_time' => "11:00 – 13:00", 
                            'pickup_one_volume' => "30 Lbs", 
                            'pickup_one_nubmer_of_bags' => "2", 
                            'pickup_one_dry_clean_included' => "Yes", 
                            'pickup_one_state' => "0", 
    ]);

    
    $order->week_one->pickup_two->push(['pickup_two_day' => 'Monday',
                            'pickup_two_date' => "05/23/2020", 
                            'pickup_two_time' => "11:00 – 13:00", 
                            'pickup_two_volume' => "30 Lbs", 
                            'pickup_two_nubmer_of_bags' => "2", 
                            'pickup_two_dry_clean_included' => "Yes",
                            'pickup_two_state' => "0", 

    ]);


    $order->week_two->pickup_one->push(['pickup_one_day' => 'Tuesday',
                            'pickup_one_date' => "05/23/2020", 
                            'pickup_one_time' => "11:00 – 13:00", 
                            'pickup_one_volume' => "30 Lbs", 
                            'pickup_one_nubmer_of_bags' => "2", 
                            'pickup_one_dry_clean_included' => "Yes", 
                            'pickup_one_state' => "0", 

    ]);

    
    $order->week_two->pickup_two->push(['pickup_two_day' => 'Wednsday',
                            'pickup_two_date' => "05/23/2020", 
                            'pickup_two_time' => "11:00 – 13:00", 
                            'pickup_two_volume' => "30 Lbs", 
                            'pickup_two_nubmer_of_bags' => "2", 
                            'pickup_two_dry_clean_included' => "Yes", 
                            'pickup_two_state' => "1", 

    ]);

    $order->week_three->pickup_one->push(['pickup_one_day' => 'Thursday',
                            'pickup_one_date' => "05/23/2020", 
                            'pickup_one_time' => "11:00 – 13:00", 
                            'pickup_one_volume' => "30 Lbs", 
                            'pickup_one_nubmer_of_bags' => "2", 
                            'pickup_one_dry_clean_included' => "Yes",
                            'pickup_one_state' => "1", 

    ]);

    
    $order->week_three->pickup_two->push(['pickup_two_day' => 'Friday',
                            'pickup_two_date' => "05/23/2020", 
                            'pickup_two_time' => "11:00 – 13:00", 
                            'pickup_two_volume' => "30 Lbs", 
                            'pickup_two_nubmer_of_bags' => "2", 
                            'pickup_two_dry_clean_included' => "Yes", 
                            'pickup_two_state' => "1", 

                            ]);

    $order->week_four->pickup_one->push(['pickup_one_day' => 'Thursday',
                            'pickup_one_date' => "05/23/2020", 
                            'pickup_one_time' => "11:00 – 13:00", 
                            'pickup_one_volume' => "30 Lbs", 
                            'pickup_one_nubmer_of_bags' => "2", 
                            'pickup_one_dry_clean_included' => "Yes",
                            'pickup_one_state' => "1", 
 
    ]);

    
    $order->week_four->pickup_two->push(['pickup_two_day' => 'Friday',
                            'pickup_two_date' => "05/23/2020", 
                            'pickup_two_time' => "11:00 – 13:00", 
                            'pickup_two_volume' => "30 Lbs", 
                            'pickup_two_nubmer_of_bags' => "2", 
                            'pickup_two_dry_clean_included' => "Yes", 
    ]);

    


    return view('user.home.edit', ['active' => 'home','order' => $order]);
})->name('order.edit');


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

Route::get('/packages/create', function () {
    $options = collect();
    $options->service= collect();
    $options->wash= collect();
    $options->pickup= collect();
    $options->load_size= collect();
    $options->date= collect();
    $options->return_duration= collect();
    $options->added_value= collect();
    $options->added_value_choices= collect();
    
    $options->service->push(['title' => 'Washing and Folding', 'value' => '1']);
    $options->service->push(['title' => 'Wash, Fold and Dry Clean', 'value' => '2']);
    $options->service->push(['title' => 'Dry Clean Service with Delivery', 'value' => '3']);
    $options->service->push(['title' => 'Dry Clean Delivery Service Only', 'value' => '4']);

    $options->wash->push(['title' => 'Washing and Folding', 'value' => '1']);
    $options->wash->push(['title' => 'Wash, Fold and Dry Clean', 'value' => '2']);
    $options->wash->push(['title' => 'Dry Clean Service with Delivery', 'value' => '3']);
    $options->wash->push(['title' => 'Dry Clean Delivery Service Only', 'value' => '4']);

    $options->pickup->push(['title' => '1 Pickup', 'value' => '1']);
    $options->pickup->push(['title' => '2 Pickups', 'value' => '2']);

    $options->load_size->push(['title' => '15 Lbs.', 'value' => '15']);
    $options->load_size->push(['title' => '30 Lbs.', 'value' => '30']);
    $options->load_size->push(['title' => '45 Lbs.', 'value' => '45']);
    $options->load_size->push(['title' => 'Bigger Load (More than 3 Bags)', 'value' => 'more']);

    $options->date->push(['title' => 'Week One', 'value' => '1']);
    $options->date->push(['title' => 'Week Two', 'value' => '2']);
    $options->date->push(['title' => 'Week Three', 'value' => '3']);
    $options->date->push(['title' => 'Week Four', 'value' => '4']);

    $options->return_duration->push(['title' => '24 hrs', 'value' => '24']);
    $options->return_duration->push(['title' => '48 hrs', 'value' => '48']);

    $options->added_value->push(['title' => 'Use hungers instead of Folding', 'value' => '1']);
    $options->added_value->push(['title' => 'Individual Garment Wrapping', 'value' => '2']);
    
    $options->added_value_choices->push(['title' => 'T‐Shirts', 'name' => 't-shirt']);
    $options->added_value_choices->push(['title' => 'Trousers', 'name' => 'trousers']);
    $options->added_value_choices->push(['title' => 'V‐Neck', 'name' => 'v_neck']);
    $options->added_value_choices->push(['title' => 'Blouses', 'name' => 'blouses']);
    $options->added_value_choices->push(['title' => 'Hoodies', 'name' => 'hoodies']);
    $options->added_value_choices->push(['title' => 'Sleep-Wear', 'name' => 'sleep_wear']);
    $options->added_value_choices->push(['title' => 'Shirts', 'name' => 'shirts']);
    $options->added_value_choices->push(['title' => 'Polo Shirts', 'name' => 'polo_shirts']);
    $options->added_value_choices->push(['title' => 'Skirts', 'name' => 'skirts']);
    $options->added_value_choices->push(['title' => 'Sweat Shirts', 'name' => 'sweat_shirts']);
    $options->added_value_choices->push(['title' => 'Dresses', 'name' => 'dresses']);
    $options->added_value_choices->push(['title' => 'Jeans', 'name' => 'jeans']);
    $options->added_value_choices->push(['title' => 'Bra ( Up to 4 )', 'name' => 'bra']);
    $options->added_value_choices->push(['title' => 'Shorts', 'name' => 'shorts']);
    $options->added_value_choices->push(['title' => 'Overalls', 'name' => 'overalls']);

    return view('user.packages.create',  ['active' => 'packages', 'options' => $options]);
})->name('package.create');


Route::get('/packages/payment', function () {
    return view('user.packages.payment',  ['active' => 'packages']);
})->name('package.payment');


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
    $user = collect();
    $user->push(['name'=>'MoSalah' , 'image'=> '/images/logo.png' , 'show_image'=> false ]);
    return view('user.chat.index', ['active' => 'chat', 'user'=>$user]);
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
                    'rate'=>3
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
})->name('user.login');


Route::post('/dummy', function (Request $request) {
    return dd($request);
})->name('dummy');



/**************************** 
 **** End of USER ROUTES ****
/****************************/




/******************************* 
 **** Start of ADMIN ROUTES ****
/*******************************/

/* Login */
Route::get('/admin/login', function () {
    return view('admin.login');
})->name('admin.login');



/******************************
 * Dashboard Start
 * ************************** */

/* Index */
 Route::get('/admin/dashboard', function () {
    $state_numbers = collect();
    $state_numbers->total_clients= 3000 ;
    $state_numbers->new_clients= 120 ;
    $state_numbers->sales_per_month= 200 ;
    $state_numbers->sales_per_package= 100 ;
    $state_numbers->users_per_city= 100 ;
    $state_numbers->cancelled_orders= 10 ;
    $state_numbers->orders_number_per_day= 4 ;

    return view('admin.dashboard.index', ['active' => 'dashboard','state_numbers' => $state_numbers ]);
})->name('admin.dashboard');

/* Total Clients */
Route::get('/admin/clients/total', function () {
    $clients = collect();

    $clients->push(['id'=> 1, 'name'=>'Mohamed Salah','email' => 'momosalah2020@test.com', 'phone' => '(xxx)-xxx-xxxx','birthday'=>'12/14/1995','numberoforders'=> 5]);
    $clients->push(['id'=> 2, 'name'=>'Ali Ahmed','email' => 'momosalah2020@test.com', 'phone' => '(xxx)-xxx-xxxx','birthday'=>'12/14/1995','numberoforders'=> 5]);
    $clients->push(['id'=> 3, 'name'=>'Dooooooby','email' => 'momosalah2020@test.com', 'phone' => '(xxx)-xxx-xxxx','birthday'=>'12/14/1995','numberoforders'=> 5]);

    return view('admin.dashboard.total_clients.index', ['active' => 'dashboard', 'clients'=>$clients]);
})->name('admin.dashboard.total_clients');

/* New Clients */
Route::get('/admin/clients/new', function () {
    $clients = collect();

    $clients->push(['id'=> 1, 'name'=>'Ali Ahmed','city' => 'Cairo','day_of_subscribe'=>'12/15/2020','package_name'=> 'Package 2']);
    $clients->push(['id'=> 2, 'name'=>'Dooooooby','city' => 'Giza','day_of_subscribe'=>'12/16/2020','package_name'=> 'Package 3']);
    $clients->push(['id'=> 3, 'name'=>'Mohamed Salah','city' => 'Alexandria','day_of_subscribe'=>'12/14/2020','package_name'=> 'Package 1']);

    return view('admin.dashboard.new_clients.index', ['active' => 'dashboard', 'clients'=>$clients]);
})->name('admin.dashboard.new_clients');


/* Sales Per Month */
Route::get('/admin/sales/month', function () {
    $orders_dates = collect();
 
    $orders_dates->push(['date'=>'2020/10/1','title'=>'order','orders'=>'5', 'customClass' => 'low']);
    $orders_dates->push(['date'=>'2020/10/5','title'=>'order','orders'=>'7', 'customClass' => 'high']);
    $orders_dates->push(['date'=>'2020/10/10','title'=>'order','orders'=>'10', 'customClass' => 'low']); 
    
    
    return view('admin.dashboard.sales_per_month.index', ['active' => 'dashboard', 'orders_dates'=>$orders_dates]);
})->name('admin.dashboard.sales_per_month');



/* Sales Per Package */
Route::get('/admin/sales/package', function () {

    $packages = collect();
    $packages->adhoc = collect();
    $packages->bi_weekly = collect();
    $packages->monthly = collect();
    $packages->tailored = collect();

    $packages->adhoc->push(['id' => 1 ,'name' => 'Package 1' ]);
    $packages->adhoc->push(['id' => 2 ,'name' => 'Package 2' ]);
    $packages->adhoc->push(['id' => 3 ,'name' => 'Package 3' ]);
    
    $packages->bi_weekly->push(['id' => 4 ,'name' => 'Package 4' ]);
    $packages->bi_weekly->push(['id' => 5 ,'name' => 'Package 5' ]);
    $packages->bi_weekly->push(['id' => 6 ,'name' => 'Package 6' ]);
    
    $packages->monthly->push(['id' => 7 ,'name' => 'Package 4' ]);
    $packages->monthly->push(['id' => 8 ,'name' => 'Package 5' ]);
    $packages->monthly->push(['id' => 9 ,'name' => 'Package 6' ]);
    
    $packages->tailored->push(['id' => 10 ,'name' => 'Package 4' ]);
    $packages->tailored->push(['id' => 11,'name' => 'Package 5' ]);
    $packages->tailored->push(['id' => 12 ,'name' => 'Package 6' ]);
    
    $users = collect();
    $users->push(['id'=> 1, 'name'=> 'Mohamed', 'package_id' => 1]);
    $users->push(['id'=> 2, 'name'=> 'Amr', 'package_id' => 2]);
    $users->push(['id'=> 3, 'name'=> 'Doby', 'package_id' => 3]);
    $users->push(['id'=> 3, 'name'=> 'Ahmed', 'package_id' => 4]);
    $users->push(['id'=> 3, 'name'=> 'Ali', 'package_id' => 5]);
    
    return view('admin.dashboard.sales_per_package.index', ['active' => 'dashboard','users' => $users , 'packages'=>$packages]);
})->name('admin.dashboard.sales_per_package');



/* Users Per City */
Route::get('/admin/users/city', function () {

    $cities = collect();
    $cities->push(['id' => 1 ,'name' => 'Alexandria' ]);
    $cities->push(['id' => 2 ,'name' => 'Cairo' ]);
    $cities->push(['id' => 3 ,'name' => 'Giza' ]);
    
    $users = collect();
    $users->push(['id'=> 1, 'name'=> 'Mohamed', 'city_id' => 1]);
    $users->push(['id'=> 2, 'name'=> 'Amr', 'city_id' => 2]);
    $users->push(['id'=> 3, 'name'=> 'Doby', 'city_id' => 3]);
    $users->push(['id'=> 3, 'name'=> 'Ahmed', 'city_id' => 3]);
    $users->push(['id'=> 3, 'name'=> 'Ali', 'city_id' => 3]);
   
    return view('admin.dashboard.users_per_city.index', ['active' => 'dashboard', 'cities'=>$cities, 'users'=>$users]);
})->name('admin.dashboard.users_per_city');


/* Cancelled Orders */

Route::get('/admin/orders/cancelled', function () {
    $clients = collect();

    $clients->push(['id'=> 1, 'name'=>'Mohamed Salah','email' => 'momosalah2020@test.com', 'phone' => '(xxx)-xxx-xxxx','birthday'=>'12/14/1995','numberoforders'=> 5]);
    $clients->push(['id'=> 2, 'name'=>'Ali Ahmed','email' => 'momosalah2020@test.com', 'phone' => '(xxx)-xxx-xxxx','birthday'=>'12/14/1995','numberoforders'=> 5]);
    $clients->push(['id'=> 3, 'name'=>'Dooooooby','email' => 'momosalah2020@test.com', 'phone' => '(xxx)-xxx-xxxx','birthday'=>'12/14/1995','numberoforders'=> 5]);

    return view('admin.dashboard.cancelled_orders.index', ['active' => 'dashboard', 'clients'=>$clients]);
})->name('admin.dashboard.cancelled_orders');


/******************************
 * Dashboard End
 * ************************** */




/******************************
 * Reports Start
 * ************************** */

Route::get('/admin/reports', function () {
    return view('admin.reports.index', ['active' => 'reports']);
})->name('admin.reports');

/******************************
 * Reports End
 * ************************** */


/******************************
 * Packages Start
 * ************************** */

Route::get('/admin/packages', function () {
    return view('admin.packages.index', ['active' => 'packages']);
})->name('admin.packages');

/******************************
 * Packages End
 * ************************** */


/******************************
 * Users Start
 * ************************** */

Route::get('/admin/users', function () {
    $users = collect();

    $users->push(['id'=> 1, 'name'=>'Mohamed Salah','email' => 'momosalah2020@test.com', 'phone' => '(xxx)-xxx-xxxx','birthday'=>'12/14/1995','numberoforders'=> 5]);
    $users->push(['id'=> 2, 'name'=>'Ali Ahmed','email' => 'momosalah2020@test.com', 'phone' => '(xxx)-xxx-xxxx','birthday'=>'12/14/1995','numberoforders'=> 5]);
    $users->push(['id'=> 3, 'name'=>'Dooooooby','email' => 'momosalah2020@test.com', 'phone' => '(xxx)-xxx-xxxx','birthday'=>'12/14/1995','numberoforders'=> 5]);

    return view('admin.users.index', ['active' => 'users', 'users'=>$users]);
})->name('admin.users');


Route::get('/admin/users/show/{id}', function () {
    $user =collect();
    $user->push(['id'=>1,
             'name'=>'Mohamed Salah',
             'email' => 'test@test.com',
             'birthday'=>'12/14/1995',
             'phone'=> '01286727987',
             'wallet'=> 50,
             'currency' => 'USD',
             'package'=>'']);

    return view('admin.users.show',['active' => 'users','user'=> $user]);
})->name('admin.users.show');

/******************************
 * Users End
 * ************************** */


/******************************
 * Planners Start
 * ************************** */

 /* Pickup */
Route::get('/admin/pickup_planner', function () {
    return view('admin.planners.pickup.index', ['active' => 'pickup_planner']);
})->name('admin.planner.pickup');

/* Delievery */
Route::get('/admin/delievery_planner', function () {
    return view('admin.planners.delievery.index', ['active' => 'delievery_planner']);
})->name('admin.planner.delievery');

/******************************
 * Planners End
 * ************************** */


/******************************
 * Employees Start
 * ************************** */
/* admins */
Route::get('/admin/employees/admins', function () {
    return view('admin.employees.admins.index', ['active' => 'admins']);
})->name('admin.employees.admins');


Route::get('/admin/employees/admins/create', function () {
    return view('admin.employees.admins.create', ['active' => 'admins']);
})->name('admin.employees.admins.create');

Route::post('/admin/employees/admins/create', function (Request $request) {
    //dd($request->email);
    return view('admin.employees.admins.create_password', ['active' => 'admins', 'email' => $request->email]);
})->name('admin.employees.admins.create');


Route::get('/admin/employees/admins/create_password', function () {
    return view('admin.employees.admins.create_password', ['active' => 'admins',]);
})->name('admin.employees.admins.create_password');

Route::post('/admin/employees/admins/create_password', function (Request $request) {
    dd($request);
    return redirect()->route('admin.login', ['email' => 'login']);
})->name('admin.employees.admins.create_password');


/* drivers */
Route::get('/admin/employees/drivers', function () {
    return view('admin.employees.drivers.index', ['active' => 'drivers']);
})->name('admin.employees.drivers');

/* laundery_stuff */
Route::get('/admin/employees/laundery_stuff', function () {
    return view('admin.employees.laundery_stuff.index', ['active' => 'laundery_stuff']);
})->name('admin.employees.laundery_stuff');

/******************************
 * Employees End
 * ************************** */

/******************************
 * Promocodes Start
 * ************************** */

Route::get('/admin/promocodes', function () {
    return view('admin.promocodes.index', ['active' => 'promocodes']);
})->name('admin.promocodes');

/******************************
 * Promocodes End
 * ************************** */

 
/******************************
 * Zones Start
 * ************************** */
Route::get('/admin/zones', function () {
    return view('admin.zones.index', ['active' => 'zones']);
})->name('admin.zones');

/******************************
 * Zones End
 * ************************** */

 

/******************************
 * Navbar API Start
 * ************************** */
/* Chat */
Route::get('/chat_notifications', function () {
    $chat_notifications = collect();
    $chat_notifications->push(['id' => 1 ,'userimage' => "/images/icons/profile.svg", 'username' => 'Mohamed Salah', 'message' =>  'Testiing new message testjbjkgkjkjvkjvkjvjkvjkvjkvjkvjkv', 'time' => '12m', 'isread' => false]);
    $chat_notifications->push(['id' => 2 ,'userimage' => "/images/icons/profile.svg", 'username' => 'Ahmed', 'message' =>  'Testiing new message', 'time' => '12m', 'isread' => true]);
    $chat_notifications->push(['id' => 3 ,'userimage' => "/images/icons/profile.svg", 'username' => 'Ali', 'message' =>  'Testiing new message', 'time' => '12m', 'isread' => true]);

    return json_encode($chat_notifications);
    
})->name('admin.chat_notifications');


Route::get('/notifications', function () {
    $notifications = collect();
    $notifications->push(['id' => 1 ,'userimage' => "/images/icons/profile.svg", 'username' => 'Mohamed Salah', 'type' =>  'new', 'time' => '12 minutes ago', 'isopened' => false]);
    $notifications->push(['id' => 2 ,'userimage' => "/images/icons/profile.svg", 'username' => 'Ahmed', 'type' =>  'modify', 'time' => '12 minutes ago', 'isopened' => true]);
    $notifications->push(['id' => 3 ,'userimage' => "/images/icons/profile.svg", 'username' => 'Ali', 'type' =>  'cancel', 'time' => '12 minutes ago', 'isopened' => true]);

    return json_encode($notifications);
    
})->name('admin.notifications');

/******************************
 * Navbar API End
 * ************************** */


/***************************** 
 **** End of ADMIN ROUTES ****
/*****************************/