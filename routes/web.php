<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryDetergentController;
use App\Http\Controllers\CategoryDryerController;
use App\Http\Controllers\CategoryFabricController;
use App\Http\Controllers\CategoryScentController;
use App\Http\Controllers\DetergentController;
use App\Http\Controllers\DryCleanController;
use App\Http\Controllers\DryerController;
use App\Http\Controllers\FabricController;
use App\Http\Controllers\HouseholdController;
use App\Http\Controllers\ScentController;
use Illuminate\Http\Request;
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
// Route::get('test/repo', [DryCleanController::class, 'index']);

Route::group(['prefix' => 'admin', 'as' => 'admin.'], function () {

    Route::group(['prefix' => 'dry/clean', 'as' => 'dry.clean.'], function () {
        Route::get('all', [DryCleanController::class, 'index'])->name('index');
        Route::post('store', [DryCleanController::class, 'store'])->name('store');
        Route::put('update/{dryClean}', [DryCleanController::class, 'update'])->name('update');
        Route::delete('delete/{dryClean}', [DryCleanController::class, 'delete'])->name('delete');

    });
    Route::group(['prefix' => 'household', 'as' => 'household.'], function () {
        Route::get('all', [HouseholdController::class, 'index'])->name('index');
        Route::post('store', [HouseholdController::class, 'store'])->name('store');
        Route::put('update/{household}', [HouseholdController::class, 'update'])->name('update');
        Route::delete('delete/{household}', [HouseholdController::class, 'delete'])->name('delete');

    });
    Route::group(['prefix' => 'category/detergent', 'as' => 'category.detergent.'], function () {
        Route::get('all', [CategoryDetergentController::class, 'index'])->name('index');
        Route::post('store', [CategoryDetergentController::class, 'store'])->name('store');
        Route::put('update/{categoryDetergent}', [CategoryDetergentController::class, 'update'])->name('update');
        Route::delete('delete/{categoryDetergent}', [CategoryDetergentController::class, 'delete'])->name('delete');

    });
    Route::group(['prefix' => 'category/fabric', 'as' => 'category.fabric.'], function () {
        Route::get('all', [CategoryFabricController::class, 'index'])->name('index');
        Route::post('store', [CategoryFabricController::class, 'store'])->name('store');
        Route::put('update/{categoryFabric}', [CategoryFabricController::class, 'update'])->name('update');
        Route::delete('delete/{categoryFabric}', [CategoryFabricController::class, 'delete'])->name('delete');

    });
    Route::group(['prefix' => 'category/dryer', 'as' => 'category.dryer.'], function () {
        Route::get('all', [CategoryDryerController::class, 'index'])->name('index');
        Route::post('store', [CategoryDryerController::class, 'store'])->name('store');
        Route::put('update/{categoryDryer}', [CategoryDryerController::class, 'update'])->name('update');
        Route::delete('delete/{categoryDryer}', [CategoryDryerController::class, 'delete'])->name('delete');

    });
    Route::group(['prefix' => 'category/scent', 'as' => 'category.scent.'], function () {
        Route::get('all', [CategoryScentController::class, 'index'])->name('index');
        Route::post('store', [CategoryScentController::class, 'store'])->name('store');
        Route::put('update/{categoryScent}', [CategoryScentController::class, 'update'])->name('update');
        Route::delete('delete/{categoryScent}', [CategoryScentController::class, 'delete'])->name('delete');

    });
    Route::group(['prefix' => 'detergent', 'as' => 'detergent.'], function () {
        Route::get('all', [DetergentController::class, 'index'])->name('index');
        Route::post('store', [DetergentController::class, 'store'])->name('store');
        Route::put('update/{detergent}', [DetergentController::class, 'update'])->name('update');
        Route::delete('delete/{detergent}', [DetergentController::class, 'delete'])->name('delete');

    });
    Route::group(['prefix' => 'fabric', 'as' => 'fabric.'], function () {
        Route::get('all', [FabricController::class, 'index'])->name('index');
        Route::post('store', [FabricController::class, 'store'])->name('store');
        Route::put('update/{fabric}', [FabricController::class, 'update'])->name('update');
        Route::delete('delete/{fabric}', [FabricController::class, 'delete'])->name('delete');

    });
    Route::group(['prefix' => 'dryer', 'as' => 'dryer.'], function () {
        Route::get('all', [DryerController::class, 'index'])->name('index');
        Route::post('store', [DryerController::class, 'store'])->name('store');
        Route::put('update/{dryer}', [DryerController::class, 'update'])->name('update');
        Route::delete('delete/{dryer}', [DryerController::class, 'delete'])->name('delete');

    });
    Route::group(['prefix' => 'scent', 'as' => 'scent.'], function () {
        Route::get('all', [ScentController::class, 'index'])->name('index');
        Route::post('store', [ScentController::class, 'store'])->name('store');
        Route::put('update/{scent}', [ScentController::class, 'update'])->name('update');
        Route::delete('delete/{scent}', [ScentController::class, 'delete'])->name('delete');

    });
});
Route::get('/', function () {
    // dd(App\Models\User::all());
    $packages = collect();
    $packages->adhoc = collect();
    $packages->bi_weekly = collect();
    $packages->monthly = collect();

    $packages->adhoc->push(['id' => 1, 'title' => 'Ad Hoc - Heavy', 'price' => '75 ', 'description' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry', 'button' => 'Subscribe']);
    $packages->adhoc->push(['id' => 2, 'title' => 'Ad Hoc - Heavy', 'price' => '75 ', 'description' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry', 'button' => 'Subscribe']);

    $packages->bi_weekly->push(['id' => 3, 'title' => 'Bi-Weekly', 'price' => '75 ', 'description' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry', 'button' => 'Subscribe']);
    $packages->bi_weekly->push(['id' => 4, 'title' => 'Bi-Weekly – Big Job', 'price' => '75 ', 'description' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry', 'button' => 'Subscribe']);

    $packages->monthly->push(['id' => 5, 'title' => 'Monthly', 'price' => '75 ', 'description' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry', 'button' => 'Subscribe']);
    $packages->monthly->push(['id' => 6, 'title' => 'Monthly - Busy', 'price' => '75 ', 'description' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry', 'button' => 'Subscribe']);
    $packages->monthly->push(['id' => 7, 'title' => 'Monthly - Heavy', 'price' => '75 ', 'description' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry', 'button' => 'Subscribe']);

    return view('welcome', ['active' => 'packages', 'packages' => $packages]);

})->name('index');

Route::post('/password/update/user/', [AuthController::class, 'updatePassword'])->name('user.update.password');
Route::post('register/post', [AuthController::class, 'create'])->name('register.post');
Route::post('verify/post', [AuthController::class, 'verify'])->name('verify.post');
Route::get('/verify/phone', [AuthController::class, 'verifyPhone'])->name('verify_phone');
Route::get('/resend/code', [AuthController::class, 'resend'])->name('resend.code');
Route::post('/forget/password', [AuthController::class, 'resend'])->name('send.code');
Route::post('/user/change_password', [AuthController::class, 'changePassword'])->name('forget.change.password');
// Route::post('/update/forget/password',[AuthController::class,''])
Auth::routes();
// Route::post('login', [
//     'as' => 'user.login',
//     'uses' => [LoginController::class, 'login'],
// ]);
// Route::get('login', [
//     'as' => 'user.login',
//     'uses' => [LoginController::class, 'login'],
// ]);

// Route::get('/password/new', function () {
//     return view('auth.reset_password', ['active' => 'logout']);
// })->name('reset_password');

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/test', function () {
    return view('auth.verify_phone', ['active' => 'logout']);
})->name('test');

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
        'service' => 'Washing clothes',
        'start_date' => '20/09/2020',
        'price' => '50 ',
        'finish_date' => "25/09/2020",
        'status' => "Test",
        'service_return_duration' => "Test",
        'added_value_service' => "Test",
        'package_duration' => "Test",
        'number_of_pickups_per_package' => "Test",
        'volume_per_package' => "Test",
        'number_of_bags_per_package' => "Test",
        'pickup_address' => "Test",
        'drop_off_address' => "Test",
        'added_notes' => "notes",
    ]);

    $orders->push(['id' => 2222222222,
        'service' => 'Washing clothes',
        'start_date' => '20/09/2020',
        'price' => '120 ',
        'finish_date' => "Test",
        'status' => "Test",
        'service_return_duration' => "Test",
        'added_value_service' => "Test",
        'package_duration' => "Test",
        'number_of_pickups_per_package' => "Test",
        'volume_per_package' => "Test",
        'number_of_bags_per_package' => "Test",
        'pickup_address' => "Test",
        'drop_off_address' => "Test",
        'added_notes' => "notes",
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

    return view('user.home.edit', ['active' => 'home', 'order' => $order]);
})->name('order.edit');

/*****************************
 *  Packages
/**************************** */

Route::get('/packages', function () {
    $packages = collect();
    $packages->adhoc = collect();
    $packages->bi_weekly = collect();
    $packages->monthly = collect();

    $packages->adhoc->push(['id' => 1, 'title' => 'Ad Hoc - Heavy', 'price' => '75 ', 'description' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry']);
    $packages->adhoc->push(['id' => 2, 'title' => 'Ad Hoc - Heavy', 'price' => '75 ', 'description' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry']);

    $packages->bi_weekly->push(['id' => 3, 'title' => 'Bi-Weekly', 'price' => '75 ', 'description' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry']);
    $packages->bi_weekly->push(['id' => 4, 'title' => 'Bi-Weekly – Big Job', 'price' => '75 ', 'description' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry']);

    $packages->monthly->push(['id' => 5, 'title' => 'Monthly', 'price' => '75 ', 'description' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry']);
    $packages->monthly->push(['id' => 6, 'title' => 'Monthly - Busy', 'price' => '75 ', 'description' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry']);
    $packages->monthly->push(['id' => 7, 'title' => 'Monthly - Heavy', 'price' => '75 ', 'description' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry']);

    return view('user.packages.index', ['active' => 'packages', 'packages' => $packages]);
})->name('packages');

Route::get('/packages/show/{id}', function () {
    $packages = collect();
    $packages->push(['id' => 1111111111,
        'package_duration' => '1 Day',
        'no_of_pickups' => '1 Pickup',
        'no_of_bags' => '2 Bags',
        'max_weight' => "30 Pounds",
        'return_duration' => "24 Hours",
        'dry_clean_credit' => "12 Points",
        'added_value_service_credit' => "10 Points",
        'reward_points' => "3.75 Points",
        'price_of_extra_pound' => "1.96/Lbs",
        'advance_notice' => "2 Days",
        'price' => '50',
        'currency' => '',
    ]);
    $dry_clean_items = collect();
    $dry_clean_items->push(['id' => 1, 'title' => 'Item 1', 'price' => 30, 'name' => 'item1']);
    $dry_clean_items->push(['id' => 2, 'title' => 'Item 2', 'price' => 40, 'name' => 'item2']);
    $dry_clean_items->push(['id' => 3, 'title' => 'Item 3', 'price' => 50, 'name' => 'item3']);
    $dry_clean_items->push(['id' => 4, 'title' => 'Item 4', 'price' => 60, 'name' => 'item4']);
    $dry_clean_items->push(['id' => 5, 'title' => 'Item 5', 'price' => 70, 'name' => 'item5']);
    $dry_clean_items->push(['id' => 6, 'title' => 'Item 6', 'price' => 70, 'name' => 'item6']);

    $household_items = collect();
    $household_items->push(['id' => 1, 'title' => 'Item 7', 'price' => 10, 'name' => 'item1']);
    $household_items->push(['id' => 2, 'title' => 'Item 8', 'price' => 20, 'name' => 'item2']);
    $household_items->push(['id' => 3, 'title' => 'Item 9', 'price' => 30, 'name' => 'item3']);
    $household_items->push(['id' => 4, 'title' => 'Item 10', 'price' => 40, 'name' => 'item4']);
    $household_items->push(['id' => 5, 'title' => 'Item 11', 'price' => 50, 'name' => 'item5']);
    $household_items->push(['id' => 6, 'title' => 'Item 12', 'price' => 60, 'name' => 'item6']);

    $options = collect();
    $options->added_value = collect();
    $options->added_value_choices = collect();

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

    $detergents_types = collect();
    $detergents_types->push(['id' => 1, 'title' => "Brand 1"]);
    $detergents_types->push(['id' => 2, 'title' => "Brand 2"]);
    $detergents_types->push(['id' => 3, 'title' => "Brand 3"]);

    $detergents_types_items = collect();
    $detergents_types_items->push(['id' => 1, 'src' => "", 'title' => "Item 1", 'price' => 120, 'type_id' => 1]);
    $detergents_types_items->push(['id' => 2, 'src' => "", 'title' => "Item 2", 'price' => 100, 'type_id' => 2]);
    $detergents_types_items->push(['id' => 3, 'src' => "", 'title' => "Item 3", 'price' => 200, 'type_id' => 3]);

    $dryer_sheet_types = collect();
    $dryer_sheet_types->push(['id' => 1, 'title' => "Dryer Brand 1"]);
    $dryer_sheet_types->push(['id' => 2, 'title' => "Dryer Brand 2"]);
    $dryer_sheet_types->push(['id' => 3, 'title' => "Dryer Brand 3"]);

    $dryer_sheet_types_items = collect();
    $dryer_sheet_types_items->push(['id' => 1, 'src' => "", 'title' => "Item 1", 'price' => 120, 'type_id' => 1]);
    $dryer_sheet_types_items->push(['id' => 2, 'src' => "", 'title' => "Item 2", 'price' => 100, 'type_id' => 2]);
    $dryer_sheet_types_items->push(['id' => 3, 'src' => "", 'title' => "Item 3", 'price' => 200, 'type_id' => 3]);

    $booster_types = collect();
    $booster_types->push(['id' => 1, 'title' => "Booster Brand 1"]);
    $booster_types->push(['id' => 2, 'title' => "Booster Brand 2"]);
    $booster_types->push(['id' => 3, 'title' => "Booster Brand 3"]);

    $booster_types_items = collect();
    $booster_types_items->push(['id' => 1, 'src' => "", 'title' => "Item 1", 'price' => 120, 'type_id' => 1]);
    $booster_types_items->push(['id' => 2, 'src' => "", 'title' => "Item 2", 'price' => 100, 'type_id' => 2]);
    $booster_types_items->push(['id' => 3, 'src' => "", 'title' => "Item 3", 'price' => 200, 'type_id' => 3]);

    $fabric_types = collect();
    $fabric_types->push(['id' => 1, 'title' => "Fabric Brand 1"]);
    $fabric_types->push(['id' => 2, 'title' => "Fabric Brand 2"]);
    $fabric_types->push(['id' => 3, 'title' => "Fabric Brand 3"]);

    $fabric_types_items = collect();
    $fabric_types_items->push(['id' => 1, 'src' => "", 'title' => "Item 1", 'price' => 120, 'type_id' => 1]);
    $fabric_types_items->push(['id' => 2, 'src' => "", 'title' => "Item 2", 'price' => 100, 'type_id' => 2]);
    $fabric_types_items->push(['id' => 3, 'src' => "", 'title' => "Item 3", 'price' => 200, 'type_id' => 3]);

    return view('user.packages.show', ['active' => 'packages', 'package' => $packages,
        'dry_clean_items' => $dry_clean_items,
        'household_items' => $household_items,
        'options' => $options,
        'detergents_types' => $detergents_types,
        'detergents_types_items' => $detergents_types_items,
        'dryer_sheet_types' => $dryer_sheet_types,
        'dryer_sheet_types_items' => $dryer_sheet_types_items,
        'booster_types' => $booster_types,
        'booster_types_items' => $booster_types_items,
        'fabric_types' => $fabric_types,
        'fabric_types_items' => $fabric_types_items,
    ]);
})->name('package.show');

Route::get('/packages/summary/{id?}', function () {
    $packages = collect();

    $dry_clean_items = collect();
    $dry_clean_items->push(['id' => 1, 'title' => 'Item 1', 'price' => 30, 'name' => 'item1']);
    $dry_clean_items->push(['id' => 2, 'title' => 'Item 2', 'price' => 40, 'name' => 'item2']);

    $added_value = collect();
    $added_value->push(['title' => 'Use hungers instead of Folding', 'value' => '1']);

    $added_value_choices = collect();
    $added_value_choices->push(['title' => 'T‐Shirts', 'name' => 't-shirt']);
    $added_value_choices->push(['title' => ' Trousers', 'name' => ' trousers']);

    $household_items = collect();
    $household_items->push(['id' => 1, 'title' => 'Item 7', 'price' => 10, 'name' => 'item1']);
    $household_items->push(['id' => 2, 'title' => 'Item 8', 'price' => 20, 'name' => 'item2']);
    $household_items->push(['id' => 3, 'title' => 'Item 9', 'price' => 30, 'name' => 'item3']);

    $detergents_type = collect();
    $detergents_type->push(['id' => 1, 'title' => "Brand 1"]);
    $detergents_item = collect();
    $detergents_item->push(['id' => 5, 'title' => 'Item 5', 'price' => 20]);

    $fabric_type = collect();
    $fabric_type->push(['id' => 1, 'title' => "Fabric Brand 1"]);
    $fabric_type_item = collect();
    $fabric_type_item->push(['id' => 1, 'src' => "", 'title' => "Item 1", 'price' => 120, 'type_id' => 1]);

    $dryer_sheet_type = collect();
    $dryer_sheet_type->push(['id' => 1, 'title' => "Dryer Brand 1"]);
    $dryer_sheet_item = collect();
    $dryer_sheet_item->push(['id' => 1, 'src' => "", 'title' => "Item 2", 'price' => 60, 'type_id' => 1]);

    $booster_type = collect();
    $booster_type->push(['id' => 1, 'title' => "Booster Brand 1"]);
    $booster_item = collect();
    $booster_item->push(['id' => 1, 'src' => "", 'title' => "Item 1", 'price' => 120, 'type_id' => 1]);

    $packages->push(['id' => 1111111111,
        'package_duration' => '1 Day',
        'no_of_pickups' => '1',
        'no_of_bags' => '2 Bags',
        'max_weight' => "30 Pounds",
        'return_duration' => "24 Hours",
        'dry_clean_credit' => "12 Points",
        'added_value_service_credit' => "10 Points",
        'reward_points' => "3.75 Points",
        'price_of_extra_pound' => "1.96/Lbs",
        'advance_notice' => "2 Days",
        'price' => '50',
        /* customizations */
        'week1_pickup_date' => '2021-01-30',
        'week2_pickup_date' => '2021-02-5',
        'week3_pickup_date' => '2021-02-12',
        'week4_pickup_date' => '2021-02-18',
        /* dry clean */
        'dry_clean_items' => $dry_clean_items,
        'added_value' => $added_value,
        'added_value_choices' => $added_value_choices,
        'household_items' => $household_items,
        'detergents_type' => $detergents_type,
        'detergents_item' => $detergents_item,
        'fabric_type' => $fabric_type,
        'fabric_type_item' => $fabric_type_item,
        'dryer_sheet_type' => $dryer_sheet_type,
        'dryer_sheet_item' => $dryer_sheet_item,
        'booster_type' => $booster_type,
        'booster_item' => $booster_item,
        'total' => '230',
    ]);

    return view('user.packages.summary', ['active' => 'packages', 'package' => $packages,
    ]);
})->name('package.summary');

Route::get('/packages/create', function () {
    $options = collect();
    $options->service = collect();
    $options->wash = collect();
    $options->pickup = collect();
    $options->load_size = collect();
    $options->date = collect();
    $options->return_duration = collect();
    $options->added_value = collect();
    $options->added_value_choices = collect();

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

    $options->return_duration->push(['title' => '12 hrs', 'value' => '12']);
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

    $detergents_types = collect();
    $detergents_types->push(['id' => 1, 'title' => "Brand 1"]);
    $detergents_types->push(['id' => 2, 'title' => "Brand 2"]);
    $detergents_types->push(['id' => 3, 'title' => "Brand 3"]);

    $detergents_types_items = collect();
    $detergents_types_items->push(['id' => 1, 'src' => "", 'title' => "Item 1", 'price' => 120, 'type_id' => 1]);
    $detergents_types_items->push(['id' => 2, 'src' => "", 'title' => "Item 2", 'price' => 100, 'type_id' => 2]);
    $detergents_types_items->push(['id' => 3, 'src' => "", 'title' => "Item 3", 'price' => 200, 'type_id' => 3]);

    $dryer_sheet_types = collect();
    $dryer_sheet_types->push(['id' => 1, 'title' => "Dryer Brand 1"]);
    $dryer_sheet_types->push(['id' => 2, 'title' => "Dryer Brand 2"]);
    $dryer_sheet_types->push(['id' => 3, 'title' => "Dryer Brand 3"]);

    $dryer_sheet_types_items = collect();
    $dryer_sheet_types_items->push(['id' => 1, 'src' => "", 'title' => "Item 1", 'price' => 120, 'type_id' => 1]);
    $dryer_sheet_types_items->push(['id' => 2, 'src' => "", 'title' => "Item 2", 'price' => 100, 'type_id' => 2]);
    $dryer_sheet_types_items->push(['id' => 3, 'src' => "", 'title' => "Item 3", 'price' => 200, 'type_id' => 3]);

    $booster_types = collect();
    $booster_types->push(['id' => 1, 'title' => "Booster Brand 1"]);
    $booster_types->push(['id' => 2, 'title' => "Booster Brand 2"]);
    $booster_types->push(['id' => 3, 'title' => "Booster Brand 3"]);

    $booster_types_items = collect();
    $booster_types_items->push(['id' => 1, 'src' => "", 'title' => "Item 1", 'price' => 120, 'type_id' => 1]);
    $booster_types_items->push(['id' => 2, 'src' => "", 'title' => "Item 2", 'price' => 100, 'type_id' => 2]);
    $booster_types_items->push(['id' => 3, 'src' => "", 'title' => "Item 3", 'price' => 200, 'type_id' => 3]);

    $fabric_types = collect();
    $fabric_types->push(['id' => 1, 'title' => "Fabric Brand 1"]);
    $fabric_types->push(['id' => 2, 'title' => "Fabric Brand 2"]);
    $fabric_types->push(['id' => 3, 'title' => "Fabric Brand 3"]);

    $fabric_types_items = collect();
    $fabric_types_items->push(['id' => 1, 'src' => "", 'title' => "Item 1", 'price' => 120, 'type_id' => 1]);
    $fabric_types_items->push(['id' => 2, 'src' => "", 'title' => "Item 2", 'price' => 100, 'type_id' => 2]);
    $fabric_types_items->push(['id' => 3, 'src' => "", 'title' => "Item 3", 'price' => 200, 'type_id' => 3]);

    $dry_clean_items = collect();
    $dry_clean_items->push(['id' => 1, 'title' => 'Item 1', 'price' => 30, 'name' => 'item1']);
    $dry_clean_items->push(['id' => 2, 'title' => 'Item 2', 'price' => 40, 'name' => 'item2']);
    $dry_clean_items->push(['id' => 3, 'title' => 'Item 3', 'price' => 50, 'name' => 'item3']);
    $dry_clean_items->push(['id' => 4, 'title' => 'Item 4', 'price' => 60, 'name' => 'item4']);
    $dry_clean_items->push(['id' => 5, 'title' => 'Item 5', 'price' => 70, 'name' => 'item5']);
    $dry_clean_items->push(['id' => 6, 'title' => 'Item 6', 'price' => 70, 'name' => 'item6']);

    $household_items = collect();
    $household_items->push(['id' => 1, 'title' => 'Item 7', 'price' => 10, 'name' => 'item1']);
    $household_items->push(['id' => 2, 'title' => 'Item 8', 'price' => 20, 'name' => 'item2']);
    $household_items->push(['id' => 3, 'title' => 'Item 9', 'price' => 30, 'name' => 'item3']);
    $household_items->push(['id' => 4, 'title' => 'Item 10', 'price' => 40, 'name' => 'item4']);
    $household_items->push(['id' => 5, 'title' => 'Item 11', 'price' => 50, 'name' => 'item5']);
    $household_items->push(['id' => 6, 'title' => 'Item 12', 'price' => 60, 'name' => 'item6']);

    return view('user.packages.create', ['active' => 'packages', 'options' => $options,
        'detergents_types' => $detergents_types,
        'detergents_types_items' => $detergents_types_items,
        'dryer_sheet_types' => $dryer_sheet_types,
        'dryer_sheet_types_items' => $dryer_sheet_types_items,
        'booster_types' => $booster_types,
        'booster_types_items' => $booster_types_items,
        'fabric_types' => $fabric_types,
        'fabric_types_items' => $fabric_types_items,
        'dry_clean_items' => $dry_clean_items,
        'household_items' => $household_items,
    ]);
})->name('package.create');

Route::get('/packages/payment', function () {
    return view('user.packages.payment', ['active' => 'packages']);
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
    $user->push(['name' => 'MoSalah', 'image' => '/images/logo.png', 'show_image' => false]);
    return view('user.chat.index', ['active' => 'chat', 'user' => $user]);
})->name('chat');

/*****************************
 *  Old Orders
/**************************** */

Route::get('/old_orders', function () {
    $orders = collect();
    $orders->push(['orderdate' => '18/08/2020', 'ordernumber' => '11111111111', 'startdate' => '20/08/2020', 'finishdate' => '20/08/2020', 'status' => 'Delievered']);
    $orders->push(['orderdate' => '21/08/2020', 'ordernumber' => '22222222222', 'startdate' => '20/08/2020', 'finishdate' => '20/08/2020', 'status' => 'Delievered']);
    $orders->push(['orderdate' => '22/08/2020', 'ordernumber' => '33333333333', 'startdate' => '20/08/2020', 'finishdate' => '20/08/2020', 'status' => 'Delievered']);
    $orders->push(['orderdate' => '23/08/2020', 'ordernumber' => '44444444444', 'startdate' => '20/08/2020', 'finishdate' => '20/08/2020', 'status' => 'Delievered']);
    $orders->push(['orderdate' => '24/08/2020', 'ordernumber' => '55555555555', 'startdate' => '20/08/2020', 'finishdate' => '20/08/2020', 'status' => 'Delievered']);

    return view('user.old_orders.index', ['active' => 'old_orders', 'orders' => $orders]);
})->name('old_orders');

Route::get('/old_orders/show/{id}', function () {
    $order = collect();
    $order->push(['id' => 1111111111,
        'service' => 'Wash and Fold',
        'start_date' => '20/09/2020',
        'price' => '80 ',
        'finish_date' => "25/09/2020",
        'status' => "Delivered",
        'service_return_duration' => "Standard : Within 48 Hours",
        'added_value_service' => "All nature garment freshener",
        'pickup_address' => "12 - Amr Ibn El Aass - Miami - Alexandria",
        'drop_off_address' => "12 - Amr Ibn El Aass - Miami - Alexandria",
        'added_notes' => "Lorem Ipsum is simply dummy text of the printing and typesetting industry",
        'rate' => 3,
    ]);
    return view('user.old_orders.show', ['active' => 'old_orders', 'order' => $order]);
})->name('old_orders.show');

/*****************************
 *  Verify Phone
/**************************** */

/*****************************
 *  Set new Password
/**************************** */

/*****************************
 *  Logout
/**************************** */

// Route::get('/login', function () {
//     return view('auth.login', ['active' => 'logout']);
// })->name('user.login');

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
    $state_numbers->total_clients = 3000;
    $state_numbers->new_clients = 120;
    $state_numbers->sales_per_month = 200;
    $state_numbers->sales_per_package = 100;
    $state_numbers->users_per_city = 100;
    $state_numbers->cancellation_requests = 10;
    $state_numbers->orders_number_per_day = 4;
    $state_numbers->pickups_range = 8;

    $pickups_number = collect();
    $pickups_number->push(['date' => '2020/12/1', 'title' => 'pickup', 'pickups' => '5']);
    $pickups_number->push(['date' => '2020/12/4', 'title' => 'pickup', 'pickups' => '7']);
    $pickups_number->push(['date' => '2020/12/8', 'title' => 'pickup', 'pickups' => '10']);
    $pickups_number->push(['date' => '2020/12/14', 'title' => 'pickup', 'pickups' => '15']);
    $pickups_number->push(['date' => '2020/12/18', 'title' => 'pickup', 'pickups' => '20']);
    $pickups_number->push(['date' => '2021/1/4', 'title' => 'pickup', 'pickups' => '6']);
    $pickups_number->push(['date' => '2021/1/8', 'title' => 'pickup', 'pickups' => '12']);
    $pickups_number->push(['date' => '2021/1/19', 'title' => 'pickup', 'pickups' => '15']);

    return view('admin.dashboard.index', ['active' => 'dashboard',
        'state_numbers' => $state_numbers, 'pickups_number' => $pickups_number]);
})->name('admin.dashboard');

/* Total Clients */
Route::get('/admin/clients/total', function () {
    $clients = collect();

    $clients->push(['id' => 1, 'name' => 'Mohamed Salah', 'email' => 'momosalah2020@test.com', 'phone' => '(xxx)-xxx-xxxx', 'birthday' => '1990-11-11', 'numberoforders' => 5]);
    $clients->push(['id' => 2, 'name' => 'Ali Ahmed', 'email' => 'momosalah2020@test.com', 'phone' => '(xxx)-xxx-xxxx', 'birthday' => '1990-11-11', 'numberoforders' => 5]);
    $clients->push(['id' => 3, 'name' => 'Dooooooby', 'email' => 'momosalah2020@test.com', 'phone' => '(xxx)-xxx-xxxx', 'birthday' => '1990-11-11', 'numberoforders' => 5]);

    return view('admin.dashboard.total_clients.index', ['active' => 'dashboard', 'clients' => $clients]);
})->name('admin.dashboard.total_clients');

/* New Clients */
Route::get('/admin/clients/new', function () {
    $clients = collect();

    $clients->push(['id' => 1, 'name' => 'Ali Ahmed', 'city' => 'Cairo', 'day_of_subscribe' => '12/15/2020', 'package_name' => 'Package 2',
        'phone' => '+1 111 111111', 'service_status' => 'Not Started', 'completion_date' => '-', 'first_delievery' => '11/30/2020', 'last_delievery' => '11/30/2020']);
    $clients->push(['id' => 2, 'name' => 'Dooooooby', 'city' => 'Giza', 'day_of_subscribe' => '12/16/2020', 'package_name' => 'Package 3',
        'phone' => '+1 111 111111', 'service_status' => 'Inprogress', 'completion_date' => '-', 'first_delievery' => '11/30/2020', 'last_delievery' => '11/30/2020']);
    $clients->push(['id' => 3, 'name' => 'Mohamed Salah', 'city' => 'Alexandria', 'day_of_subscribe' => '12/14/2020', 'package_name' => 'Package 1',
        'phone' => '+1 111 111111', 'service_status' => 'Completed', 'completion_date' => '10/4/2020', 'first_delievery' => '11/30/2020', 'last_delievery' => '11/30/2020']);

    return view('admin.dashboard.new_clients.index', ['active' => 'dashboard', 'clients' => $clients]);
})->name('admin.dashboard.new_clients');

/* Sales Per Month */
Route::get('/admin/sales/month', function () {
    $orders_dates = collect();

    $orders_dates->push(['date' => '2020/12/01', 'title' => 'order', 'orders' => '5', 'customClass' => 'color1']);
    $orders_dates->push(['date' => '2020/12/04', 'title' => 'order', 'orders' => '7', 'customClass' => 'color2']);
    $orders_dates->push(['date' => '2020/12/08', 'title' => 'order', 'orders' => '10', 'customClass' => 'color3']);
    $orders_dates->push(['date' => '2020/12/14', 'title' => 'order', 'orders' => '15', 'customClass' => 'color4']);
    $orders_dates->push(['date' => '2020/12/18', 'title' => 'order', 'orders' => '20', 'customClass' => 'color5']);
    $orders_dates->push(['date' => '2021/01/04', 'title' => 'order', 'orders' => '6', 'customClass' => 'color1']);
    $orders_dates->push(['date' => '2021/01/08', 'title' => 'order', 'orders' => '12', 'customClass' => 'color2']);
    $orders_dates->push(['date' => '2021/01/19', 'title' => 'order', 'orders' => '15', 'customClass' => 'color3']);

    $total_sales = collect();
    $total_sales->push(['month' => 12, 'total_sales' => 16]);
    $total_sales->push(['month' => 1, 'total_sales' => 33]);
    return view('admin.dashboard.sales_per_month.index', ['active' => 'dashboard', 'orders_dates' => $orders_dates, 'total_sales' => $total_sales]);
})->name('admin.dashboard.sales_per_month');

/* Sales Per Package */
Route::get('/admin/sales/package', function () {

    $packages = collect();
    $packages->adhoc = collect();
    $packages->bi_weekly = collect();
    $packages->monthly = collect();
    $packages->tailored = collect();

    $packages->adhoc->push(['id' => 1, 'name' => 'Package 1']);
    $packages->adhoc->push(['id' => 2, 'name' => 'Package 2']);
    $packages->adhoc->push(['id' => 3, 'name' => 'Package 3']);

    $packages->bi_weekly->push(['id' => 4, 'name' => 'Package 4']);
    $packages->bi_weekly->push(['id' => 5, 'name' => 'Package 5']);
    $packages->bi_weekly->push(['id' => 6, 'name' => 'Package 6']);

    $packages->monthly->push(['id' => 7, 'name' => 'Package 4']);
    $packages->monthly->push(['id' => 8, 'name' => 'Package 5']);
    $packages->monthly->push(['id' => 9, 'name' => 'Package 6']);

    $packages->tailored->push(['id' => 10, 'name' => 'Package 4']);
    $packages->tailored->push(['id' => 11, 'name' => 'Package 5']);
    $packages->tailored->push(['id' => 12, 'name' => 'Package 6']);

    $users = collect();

    $users->push(['id' => 1, 'name' => 'Mohamed', 'city' => 'Alexandria', 'package_id' => 1, 'phone' => '01286727987', 'service_status' => 'In Progress', 'completion_date' => '-']);
    $users->push(['id' => 2, 'name' => 'Amr', 'city' => 'Alexandria', 'package_id' => 2, 'phone' => '01286727987', 'service_status' => 'Not Started', 'completion_date' => '-']);
    $users->push(['id' => 3, 'name' => 'Doby', 'city' => 'Alexandria', 'package_id' => 3, 'phone' => '01286727987', 'service_status' => 'Completed', 'completion_date' => '10/4/2020']);
    $users->push(['id' => 3, 'name' => 'Ahmed', 'city' => 'Alexandria', 'package_id' => 4, 'phone' => '01286727987', 'service_status' => 'In Progress', 'completion_date' => '-']);
    $users->push(['id' => 3, 'name' => 'Ali', 'city' => 'Alexandria', 'package_id' => 5, 'phone' => '01286727987', 'service_status' => 'In Progress', 'completion_date' => '-']);

    return view('admin.dashboard.sales_per_package.index', ['active' => 'dashboard', 'users' => $users, 'packages' => $packages]);
})->name('admin.dashboard.sales_per_package');

/* Users Per City */
Route::get('/admin/sales/city', function () {

    $cities = collect();
    $cities->push(['id' => 1, 'name' => 'Irvine', 'sales' => 5]);
    $cities->push(['id' => 2, 'name' => 'Lake Forest', 'sales' => 6]);
    $cities->push(['id' => 3, 'name' => 'Mission Viejo', 'sales' => 7]);
    $cities->push(['id' => 4, 'name' => 'Tustin', 'sales' => 8]);
    $cities->push(['id' => 5, 'name' => 'Westminster', 'sales' => 9]);
    $cities->push(['id' => 6, 'name' => 'Anaheim', 'sales' => 10]);
    $cities->push(['id' => 7, 'name' => 'Santa Ana', 'sales' => 1]);
    $cities->push(['id' => 8, 'name' => 'Villa Park', 'sales' => 10]);
    $cities->push(['id' => 9, 'name' => 'Stanton', 'sales' => 4]);
    $cities->push(['id' => 10, 'name' => 'Placentia', 'sales' => 3]);
    $cities->push(['id' => 11, 'name' => 'Lake Forest', 'sales' => 2]);
    $cities->push(['id' => 12, 'name' => 'Garden Grove', 'sales' => 9]);

    $users = collect();

    $users->push(['id' => 1, 'name' => 'Mohamed', 'city_id' => 1, 'subscription_date' => '1/16/2019', 'zipcode' => 92620, 'phone' => '01286727987', 'service_status' => 'In Progress', 'completion_date' => '-']);
    $users->push(['id' => 2, 'name' => 'Amr', 'city_id' => 2, 'subscription_date' => '1/16/2019', 'zipcode' => 92623, 'phone' => '01286727987', 'service_status' => 'Not Started', 'completion_date' => '-']);
    $users->push(['id' => 3, 'name' => 'Doby', 'city_id' => 3, 'subscription_date' => '1/16/2019', 'zipcode' => 92627, 'phone' => '01286727987', 'service_status' => 'Completed', 'completion_date' => '10/4/2020']);
    $users->push(['id' => 4, 'name' => 'Ahmed', 'city_id' => 4, 'subscription_date' => '1/16/2019', 'zipcode' => 92629, 'phone' => '01286727987', 'service_status' => 'In Progress', 'completion_date' => '-']);
    $users->push(['id' => 5, 'name' => 'Ali', 'city_id' => 5, 'subscription_date' => '1/16/2019', 'zipcode' => 92616, 'phone' => '01286727987', 'service_status' => 'In Progress', 'completion_date' => '-']);
    $users->push(['id' => 6, 'name' => 'Mahmoud', 'city_id' => 6, 'subscription_date' => '1/16/2019', 'zipcode' => 92616, 'phone' => '01286727987', 'service_status' => 'In Progress', 'completion_date' => '-']);
    $users->push(['id' => 7, 'name' => 'Omar', 'city_id' => 7, 'subscription_date' => '1/16/2019', 'zipcode' => 92616, 'phone' => '01286727987', 'service_status' => 'In Progress', 'completion_date' => '-']);
    $users->push(['id' => 8, 'name' => 'Gaber', 'city_id' => 8, 'subscription_date' => '1/16/2019', 'zipcode' => 92616, 'phone' => '01286727987', 'service_status' => 'In Progress', 'completion_date' => '-']);
    $users->push(['id' => 9, 'name' => 'Karim', 'city_id' => 9, 'subscription_date' => '1/16/2019', 'zipcode' => 92616, 'phone' => '01286727987', 'service_status' => 'In Progress', 'completion_date' => '-']);
    $users->push(['id' => 10, 'name' => 'Osama', 'city_id' => 10, 'subscription_date' => '1/16/2019', 'zipcode' => 92616, 'phone' => '01286727987', 'service_status' => 'In Progress', 'completion_date' => '-']);
    $users->push(['id' => 11, 'name' => 'Yaser', 'city_id' => 11, 'subscription_date' => '1/16/2019', 'zipcode' => 92616, 'phone' => '01286727987', 'service_status' => 'In Progress', 'completion_date' => '-']);
    $users->push(['id' => 12, 'name' => 'Sayed', 'city_id' => 12, 'subscription_date' => '1/16/2019', 'zipcode' => 92616, 'phone' => '01286727987', 'service_status' => 'In Progress', 'completion_date' => '-']);

    return view('admin.dashboard.users_per_city.index', ['active' => 'dashboard', 'cities' => $cities, 'users' => $users]);
})->name('admin.dashboard.users_per_city');

/* Cancelled Orders */

Route::get('/admin/cancellation_requests', function () {
    $clients = collect();

    $clients->push(['id' => 1, 'name' => 'Mohamed Salah', 'phone' => '(xxx)-xxx-xxxx', 'request_date' => '2020-11-1', 'package_name' => 'Package 1', 'service_status' => 'In Progress', 'request_status' => 'Pending']);
    $clients->push(['id' => 2, 'name' => 'Ali Ahmed', 'phone' => '(xxx)-xxx-xxxx', 'request_date' => '2020-11-11', 'package_name' => 'Package 2', 'service_status' => 'Not Started', 'request_status' => 'Rejected']);
    $clients->push(['id' => 3, 'name' => 'Dooooooby', 'phone' => '(xxx)-xxx-xxxx', 'request_date' => '2020-12-11', 'package_name' => 'Package 3', 'service_status' => 'Completed', 'request_status' => 'Terminated']);

    return view('admin.dashboard.cancellation_requests.index', ['active' => 'dashboard', 'clients' => $clients]);
})->name('admin.dashboard.cancellation_requests');

/* Show Cancellation request */

Route::get('/admin/cancellation_requests/show/{id}', function () {
    $user = collect();
    $user->push(['id' => 1,
        'name' => 'Mohamed Salah',
        'email' => 'test@test.com',
        'birthday' => '1990-11-11',
        'phone' => '01286727987',
        'wallet' => 50,
        'currency' => 'USD',
        'package' => '']);

    return view('admin.dashboard.cancellation_requests.show', ['active' => 'dashboard', 'user' => $user]);
})->name('admin.cancellation_requests.show');

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

    $packages = collect();
    $packages->adhoc = collect();
    $packages->bi_weekly = collect();
    $packages->monthly = collect();
    $packages->tailored = collect();

    $packages->adhoc->push(['id' => 1, 'name' => 'Ad Hoc', 'users' => 3]);
    $packages->adhoc->push(['id' => 2, 'name' => 'Ad Hoc - Heavy', 'users' => 2]);

    $packages->bi_weekly->push(['id' => 4, 'name' => 'Bi-Weekly', 'users' => 5]);
    $packages->bi_weekly->push(['id' => 5, 'name' => 'Bi-Weekly – Big Job', 'users' => 2]);

    $packages->monthly->push(['id' => 7, 'name' => 'Monthly', 'users' => 1]);
    $packages->monthly->push(['id' => 8, 'name' => 'Monthly - Busy', 'users' => 3]);
    $packages->monthly->push(['id' => 9, 'name' => 'Monthly - Heavy', 'users' => 2]);

    $packages->tailored->push(['id' => 10, 'name' => 'Tailored Packages', 'users' => 4]);

    return view('admin.packages.index', ['active' => 'packages', 'packages' => $packages]);
})->name('admin.packages');


/* Packages Categories */
Route::get('/admin/packages/categories', function () {
    $categories = collect();
    $categories->push(['id' =>1,'name' => 'Category 1', 'type' => 'dryer_sheet']);
    $categories->push(['id' =>2,'name' => 'Category 2', 'type' => 'detergents']);
    return view('admin.packages.categories.index', ['active' => 'categories', 'categories' => $categories]);
})->name('admin.packages.categories');
/* Create Package */
Route::get('/admin/packages/create', function () {
    $added_values = collect();
    $added_values->push(['id' => 1, 'name' => 'added 1']);
    $added_values->push(['id' => 2, 'name' => 'added 2']);
    $added_values->push(['id' => 3, 'name' => 'added 3']);
    $added_values->push(['id' => 4, 'name' => 'added 4']);
    $added_values->push(['id' => 5, 'name' => 'added 5']);
    return view('admin.packages.create', ['active' => 'packages', 'added_values' => $added_values]);
})->name('admin.packages.add');

/* Show Package */

Route::get('/admin/packages/show/{id}', function () {
    $package = collect();
    $package->push(['id' => 1111111111,
        'package_duration' => '1 Day',
        'no_of_pickups' => '1 Pickup',
        'no_of_bags' => '2 Bags',
        'max_weight' => "30 Pounds",
        'return_duration' => "24 Hours",
        'dry_clean_credit' => "12 Points",
        'added_value_service_credit' => "10 Points",
        'reward_points' => "3.75 Points",
        'price_of_extra_pound' => "1.96/Lbs",
        'advance_notice' => "2 Days",
        'price' => '50',
        'currency' => '',
    ]);
    return view('admin.packages.show', ['active' => 'packages', 'package' => $package]);
})->name('admin.packages.show');

/* Create Package */
Route::get('/admin/packages/edit/{id}', function () {
    $added_values = collect();
    $added_values->push(['id' => 1, 'name' => 'added 1']);
    $added_values->push(['id' => 2, 'name' => 'added 2']);
    $added_values->push(['id' => 3, 'name' => 'added 3']);
    $added_values->push(['id' => 4, 'name' => 'added 4']);
    $added_values->push(['id' => 5, 'name' => 'added 5']);

    $package = collect();
    $features = collect();
    $features->push(['label' => 'Dry clean', 'data' => 'Included free in this package']);
    $features->push(['label' => 'Washing with modern washer', 'data' => 'Yes']);

    $package->push(['name' => 'Package 1', 'price' => '60', 'features' => $features]);
    return view('admin.packages.edit', ['active' => 'packages', 'package' => $package, 'added_values' => $added_values]);
})->name('admin.packages.edit');

/* Dry Clean */
Route::get('/admin/packages/dry_clean', function () {
    $dry_clean_items = collect();
    $dry_clean_items->push(['id' => 1, 'label' => 'Item 1', 'price' => '10']);
    $dry_clean_items->push(['id' => 2, 'label' => 'Item 2', 'price' => '20']);
    return view('admin.packages.dry_clean.index', ['active' => 'dry_clean', 'dry_clean_items' => $dry_clean_items]);
})->name('admin.packages.dry_clean');
/* XX Dry Clean XX */

/* Household items */
Route::get('/admin/packages/household_items', function () {
    $household_items = collect();
    $household_items->push(['id' => 1, 'label' => 'Item 1', 'price' => '10']);
    $household_items->push(['id' => 2, 'label' => 'Item 2', 'price' => '20']);

    return view('admin.packages.household_items.index', ['active' => 'household_items', 'household_items' => $household_items]);
})->name('admin.packages.household_items');
/* XX Household items XX */

/* Detergents */
Route::get('/admin/packages/detergents', function () {
    $detergents_items = collect();
    $types1 = collect();
    $types1->push(['id' => 1,"label" => "test1", "price" => "10", "img" => ""]);
    $types1->push(['id' => 2,"label" => "test1", "price" => "10", "img" => ""]);
    $types2 = collect();
    $types2->push(['id' => 3,"label" => "test2", "price" => "10", "img" => ""]);
    $detergents_items->push(['id' => 1, 'name' => 'Item 1', 'types' => $types1]);
    $detergents_items->push(['id' => 2, 'name' => 'Item 2', 'types' => $types2]);

    $categories = collect();
    $categories->push(['id' =>1,'name' => 'Category 1', 'type' => 'dryer_sheet']);
    $categories->push(['id' =>2,'name' => 'Category 2', 'type' => 'detergents']);

    return view('admin.packages.detergents.index', ['active' => 'detergents', 'detergents_items' => $detergents_items,'categories'=> $categories]);
})->name('admin.packages.detergents');
/* XX Detergents XX */

/* FABRIC */
Route::get('/admin/packages/fabric', function () {
    $fabric_items = collect();
    $types1 = collect();
    $types1->push(["label" => "test1", "price" => "10", "img" => ""]);
    $types1->push(["label" => "test1", "price" => "10", "img" => ""]);
    $types2 = collect();
    $types2->push(["label" => "test2", "price" => "10", "img" => ""]);
    $fabric_items->push(['id' => 1, 'name' => 'Item 1', 'types' => $types1]);
    $fabric_items->push(['id' => 2, 'name' => 'Item 2', 'types' => $types2]);

    $categories = collect();
    $categories->push(['id' =>1,'name' => 'Category 1', 'type' => 'dryer_sheet']);
    $categories->push(['id' =>2,'name' => 'Category 2', 'type' => 'detergents']);

    return view('admin.packages.fabric.index', ['active' => 'fabric', 'fabric_items' => $fabric_items, 'categories' => $categories]);
})->name('admin.packages.fabric');
/* XX FABRIC XX */

/* DRYER */
Route::get('/admin/packages/dryer', function () {
    $dryer_items = collect();
    $types1 = collect();
    $types1->push(["label" => "test1", "price" => "10", "img" => ""]);
    $types1->push(["label" => "test1", "price" => "10", "img" => ""]);
    $types2 = collect();
    $types2->push(["label" => "test2", "price" => "10", "img" => ""]);
    $dryer_items->push(['id' => 1, 'name' => 'Item 1', 'types' => $types1]);
    $dryer_items->push(['id' => 2, 'name' => 'Item 2', 'types' => $types2]);

    $categories = collect();
    $categories->push(['id' =>1,'name' => 'Category 1', 'type' => 'dryer_sheet']);
    $categories->push(['id' =>2,'name' => 'Category 2', 'type' => 'detergents']);


    return view('admin.packages.dryer.index', ['active' => 'dryer', 'dryer_items' => $dryer_items,'categories' => $categories]);
})->name('admin.packages.dryer');
/* XX DRYER XX */

/* Scent Booster */
Route::get('/admin/packages/scent', function () {
    $scent_items = collect();
    $types1 = collect();
    $types1->push(["label" => "test1", "price" => "10", "img" => ""]);
    $types1->push(["label" => "test1", "price" => "10", "img" => ""]);
    $types2 = collect();
    $types2->push(["label" => "test2", "price" => "10", "img" => ""]);
    $scent_items->push(['id' => 1, 'name' => 'Item 1', 'types' => $types1]);
    $scent_items->push(['id' => 2, 'name' => 'Item 2', 'types' => $types2]);

    $categories = collect();
    $categories->push(['id' =>1,'name' => 'Category 1', 'type' => 'dryer_sheet']);
    $categories->push(['id' =>2,'name' => 'Category 2', 'type' => 'detergents']);

    return view('admin.packages.scent.index', ['active' => 'scent', 'scent_items' => $scent_items,'categories' => $categories]);
})->name('admin.packages.scent');
/* XX Scent Booster XX */

/* Tailored Package */
/* Create */
Route::get('/admin/packages/tailored/create', function () {
    return view('admin.packages.tailored.create', ['active' => 'packages']);
})->name('admin.packages.tailored.create');
/* XX Create XX */
/* EDIT */
Route::get('/admin/packages/tailored/edit/{id}', function () {
    $questions = collect();
    $choices1 = collect();
    $choices1->push(["text" => "choice 1"]);
    $choices1->push(["text" => "choice 2"]);
    $choices2 = collect();
    $choices2->push(["text" => "choice 2"]);
    $questions->push(['id' => 1, 'question' => 'Question 1 ?', 'choices' => $choices1]);
    $questions->push(['id' => 2, 'question' => 'Question 2 ?', 'choices' => $choices2]);

    return view('admin.packages.tailored.edit', ['active' => 'packages', 'questions' => $questions]);
})->name('admin.packages.tailored.edit');
/* XX EDIT XX */

/* XX Tailored Package XX */

/******************************
 * Packages End
 * ************************** */

/******************************
 * Users Start
 * ************************** */

Route::get('/admin/users', function () {

    $users = collect();

    $users->push(['id' => 1, 'name' => 'Ali Ahmed', 'city' => 'Cairo', 'day_of_subscribe' => '12/15/2020', 'package_name' => 'Package 2',
        'phone' => '+1 111 111111', 'service_status' => 'Not Started', 'completion_date' => '-', 'first_delievery' => '11/30/2020', 'last_delievery' => '11/30/2020']);
    $users->push(['id' => 2, 'name' => 'Dooooooby', 'city' => 'Giza', 'day_of_subscribe' => '12/16/2020', 'package_name' => 'Package 3',
        'phone' => '+1 111 111111', 'service_status' => 'Inprogress', 'completion_date' => '-', 'first_delievery' => '11/30/2020', 'last_delievery' => '11/30/2020']);
    $users->push(['id' => 3, 'name' => 'Mohamed Salah', 'city' => 'Alexandria', 'day_of_subscribe' => '12/14/2020', 'package_name' => 'Package 1',
        'phone' => '+1 111 111111', 'service_status' => 'Completed', 'completion_date' => '10/4/2020', 'first_delievery' => '11/30/2020', 'last_delievery' => '11/30/2020']);

    return view('admin.users.index', ['active' => 'users', 'users' => $users]);
})->name('admin.users');

Route::get('/admin/users/show/{id}', function () {
    $user = collect();
    $user->push(['id' => 1,
        'name' => 'Mohamed Salah',
        'email' => 'test@test.com',
        'birthday' => '1990-11-11',
        'phone' => '01286727987',
        'wallet' => 50,
        'currency' => 'USD',
        'package' => '']);

    return view('admin.users.show', ['active' => 'users', 'user' => $user]);
})->name('admin.users.show');

/******************************
 * Users End
 * ************************** */

/******************************
 * Planners Start
 * ************************** */

/* Pickup */
Route::get('/admin/pickup_planner', function () {
    $orders = collect();
    $orders->push(['id' => 123456, 'city' => 'Alexandria', 'client' => 'Mohamed',
        'drop_off_address' => 'adress adress adress adress adress adress',
        'no_of_bags' => 2, 'package_name' => 'Package 1',
        'zone' => 'A', 'zip_code' => '92620',
        'dry_clean' => 'Yes',
        'avs' => 'No',
        'order_date' => '2021-01-08',
        'assigned_to' => 1]);
    $orders->push(['id' => 234567, 'city' => 'Cairo', 'client' => 'Mohamed',
        'drop_off_address' => 'adress adress adress adress adress adress',
        'no_of_bags' => 1, 'package_name' => 'Package 2',
        'zone' => 'A', 'zip_code' => '92620',
        'dry_clean' => 'Yes',
        'avs' => 'No',
        'order_date' => '2021-01-08',
        'assigned_to' => 2]);
    $orders->push(['id' => 345678, 'city' => 'Giza', 'client' => 'Mohamed',
        'drop_off_address' => 'adress adress adress adress adress adress',
        'no_of_bags' => 3, 'package_name' => 'Package 3',
        'zone' => 'A', 'zip_code' => '92620',
        'dry_clean' => 'Yes',
        'avs' => 'No',
        'order_date' => '2021-01-08',
        'assigned_to' => 'Unassigned']);

    $orders_dates = collect();

    $orders_dates->push(['date' => '2020/12/1', 'title' => 'order', 'orders' => '5', 'customClass' => 'color1']);
    $orders_dates->push(['date' => '2020/12/4', 'title' => 'order', 'orders' => '7', 'customClass' => 'color2']);
    $orders_dates->push(['date' => '2020/12/8', 'title' => 'order', 'orders' => '10', 'customClass' => 'color3']);
    $orders_dates->push(['date' => '2020/12/14', 'title' => 'order', 'orders' => '15', 'customClass' => 'color4']);
    $orders_dates->push(['date' => '2020/12/18', 'title' => 'order', 'orders' => '20', 'customClass' => 'color5']);
    $orders_dates->push(['date' => '2021/1/4', 'title' => 'order', 'orders' => '6', 'customClass' => 'color1']);
    $orders_dates->push(['date' => '2021/1/8', 'title' => 'order', 'orders' => '12', 'customClass' => 'color2']);
    $orders_dates->push(['date' => '2021/1/19', 'title' => 'order', 'orders' => '15', 'customClass' => 'color3']);

    $total_sales = collect();
    $total_sales->push(['month' => 12, 'total_sales' => 16]);
    $total_sales->push(['month' => 1, 'total_sales' => 6]);

    $drivers = collect();
    $drivers->push(['id' => 1, 'name' => 'Mohamed', 'image' => '/images/profile.svg']);
    $drivers->push(['id' => 2, 'name' => 'Ahmed', 'image' => '/images/profile.svg']);
    $drivers->push(['id' => 3, 'name' => 'Amr', 'image' => '/images/profile.svg']);
    return view('admin.planners.pickup.index', ['active' => 'pickup_planner',
        'orders' => $orders, 'drivers' => $drivers, 'orders_dates' => $orders_dates, 'total_sales' => $total_sales]);
})->name('admin.planner.pickup');

/* Delievery */
Route::get('/admin/delievery_planner', function () {
    $orders = collect();
    $orders->push(['id' => 123456, 'city' => 'Alexandria', 'client' => 'Mohamed',
        'drop_off_address' => 'adress adress adress adress adress adress',
        'no_of_bags' => 2, 'package_name' => 'Package 1',
        'zone' => 'A', 'zip_code' => '92620',
        'dry_clean' => 'Yes',
        'avs' => 'No',
        'order_date' => '2021-01-08',
        'assigned_to' => 1]);
    $orders->push(['id' => 234567, 'city' => 'Cairo', 'client' => 'Mohamed',
        'drop_off_address' => 'adress adress adress adress adress adress',
        'no_of_bags' => 1, 'package_name' => 'Package 2',
        'zone' => 'A', 'zip_code' => '92620',
        'dry_clean' => 'Yes',
        'avs' => 'No',
        'order_date' => '2021-01-08',
        'assigned_to' => 2]);
    $orders->push(['id' => 345678, 'city' => 'Giza', 'client' => 'Mohamed',
        'drop_off_address' => 'adress adress adress adress adress adress',
        'no_of_bags' => 3, 'package_name' => 'Package 3',
        'zone' => 'A', 'zip_code' => '92620',
        'dry_clean' => 'Yes',
        'avs' => 'No',
        'order_date' => '2021-01-08',
        'assigned_to' => 'Unassigned']);

    $orders_dates = collect();

    $orders_dates->push(['date' => '2020/12/1', 'title' => 'order', 'orders' => '5', 'customClass' => 'color1']);
    $orders_dates->push(['date' => '2020/12/4', 'title' => 'order', 'orders' => '7', 'customClass' => 'color2']);
    $orders_dates->push(['date' => '2020/12/8', 'title' => 'order', 'orders' => '10', 'customClass' => 'color3']);
    $orders_dates->push(['date' => '2020/12/14', 'title' => 'order', 'orders' => '15', 'customClass' => 'color4']);
    $orders_dates->push(['date' => '2020/12/18', 'title' => 'order', 'orders' => '20', 'customClass' => 'color5']);
    $orders_dates->push(['date' => '2021/1/4', 'title' => 'order', 'orders' => '6', 'customClass' => 'color1']);
    $orders_dates->push(['date' => '2021/1/8', 'title' => 'order', 'orders' => '12', 'customClass' => 'color2']);
    $orders_dates->push(['date' => '2021/1/19', 'title' => 'order', 'orders' => '15', 'customClass' => 'color3']);

    $total_sales = collect();
    $total_sales->push(['month' => 12, 'total_sales' => 16]);
    $total_sales->push(['month' => 1, 'total_sales' => 6]);

    $drivers = collect();
    $drivers->push(['id' => 1, 'name' => 'Mohamed', 'image' => '/images/profile.svg']);
    $drivers->push(['id' => 2, 'name' => 'Ahmed', 'image' => '/images/profile.svg']);
    $drivers->push(['id' => 3, 'name' => 'Amr', 'image' => '/images/profile.svg']);
    return view('admin.planners.delievery.index', ['active' => 'delievery_planner', 'orders' => $orders,
        'drivers' => $drivers, 'orders_dates' => $orders_dates, 'total_sales' => $total_sales]);
})->name('admin.planner.delievery');

/******************************
 * Planners End
 * ************************** */

/******************************
 * Employees Start
 * ************************** */
/* admins */
Route::get('/admin/employees/admins', function () {
    $admins = collect();
    $admins->push(['id' => 1, 'name' => 'Mohamed', 'email' => 'momosalah2020@test.com', 'phone' => '(xxx)-xxx-xxxx', 'date_of_join' => '2020-11-11', 'location' => 'location', 'status' => 'Active']);
    $admins->push(['id' => 2, 'name' => 'Ahmed', 'email' => 'momosalah2020@test.com', 'phone' => '(xxx)-xxx-xxxx', 'date_of_join' => '2020-11-11', 'location' => 'location', 'status' => 'Pending Activation']);
    $admins->push(['id' => 3, 'name' => 'Amr', 'email' => 'momosalah2020@test.com', 'phone' => '(xxx)-xxx-xxxx', 'date_of_join' => '2020-11-11', 'location' => 'location', 'status' => 'Active']);

    $superadmin = collect();
    $superadmin->push(['id' => 1, 'name' => 'Mohamed', 'email' => 'momosalah2020@test.com', 'phone' => '(xxx)-xxx-xxxx', 'date_of_join' => '2020-11-11', 'location' => 'location']);

    return view('admin.employees.admins.index', ['active' => 'admins', 'admins' => $admins, 'superadmin' => $superadmin]);
})->name('admin.employees.admins');

Route::get('/admin/employees/admins/show/{id}', function () {
    $admin = collect();
    $admin->push(['id' => 1, 'name' => 'Mohamed', 'email' => 'momosalah2020@test.com', 'phone' => '(xxx)-xxx-xxxx', 'date_of_join' => '2020-11-11', 'location' => 'location']);
    $is_superadmin = true;
    return view('admin.employees.admins.show', ['active' => 'admins', 'admin' => $admin, 'is_superadmin' => $is_superadmin]);
})->name('admin.employees.admins.show');

Route::get('/admin/employees/admins/edit/{id}', function () {
    $admin = collect();
    $admin->push(['id' => 1, 'name' => 'Mohamed', 'email' => 'momosalah2020@test.com', 'phone' => '(xxx)-xxx-xxxx', 'date_of_join' => '2020-11-11', 'location' => 'location']);

    return view('admin.employees.admins.edit', ['active' => 'admins', 'admin' => $admin]);
})->name('admin.employees.admins.edit');

Route::get('/admin/employees/admins/create', function () {
    return view('admin.employees.admins.create', ['active' => 'admins']);
})->name('admin.employees.admins.create');
Route::post('/admin/employees/admins/create', function (Request $request) {
    return view('admin.employees.admins.create_password', ['active' => 'admins', 'email' => $request->email]);
})->name('admin.employees.admins.create.post');

Route::get('/admin/employees/admins/create_password', function () {
    return view('admin.employees.admins.create_password', ['active' => 'admins']);
})->name('admin.employees.admins.create_password');

Route::post('/admin/employees/admins/create_password', function (Request $request) {
    dd($request);
    return redirect()->route('admin.login', ['email' => 'login']);
})->name('admin.employees.admins.create_password.post');

/* XX admins XX */

/* laundery_staff */
Route::get('/admin/employees/laundery_staff', function () {
    $staff = collect();
    $staff->push(['id' => 1, 'name' => 'Mohamed', 'phone' => '(xxx)-xxx-xxxx',
        'assigned_jobs' => 'Sorting,Folding',
        'location' => 'Costa Mesa', 'status' => 'Assigned', 'shift' => 'Night', 'admin' => 'Yes']);
    $staff->push(['id' => 2, 'name' => 'Ahmed', 'phone' => '(xxx)-xxx-xxxx', 'assigned_jobs' => 'Washing',
        'location' => 'Irvine', 'status' => 'Assigned', 'shift' => 'Night', 'admin' => 'No']);
    return view('admin.employees.laundery_staff.index', ['active' => 'laundery_staff', 'staff' => $staff]);
})->name('admin.employees.laundery_staff');

Route::get('/admin/employees/laundery_staff/show/{id}', function () {
    $staff = collect();
    $staff->push(['id' => 1, 'name' => 'Mohamed', 'email' => 'momosalah2020@test.com',
        'address' => 'Address', 'id_type' => 'driver', 'id_number' => 'Y962456',
        'phone' => '(xxx)-xxx-xxxx', 'birthday' => '1990-11-11', 'date_of_join' => '12/14/2018', 'location' => 'location',
        'job' => 'Sorting, Washing', 'shift' => 'Morning', 'assignment_date' => '2020-10-15', 'admin' => 'yes']);
    return view('admin.employees.laundery_staff.show', ['active' => 'laundery_staff', 'staff' => $staff]);
})->name('admin.employees.laundery_staff.show');

Route::get('/admin/employees/laundery_staff/edit/{id}', function () {
    $staff = collect();
    $staff->push(['id' => 1, 'name' => 'Mohamed', 'email' => 'momosalah2020@test.com',
        'address' => 'Address', 'phone' => '(xxx)-xxx-xxxx',
        'city' => 'Alexandria',
        'state' => 'Alex',
        'zip_code' => '123AB',
        'id_type' => 'driver',
        'id_number' => 'Y962456',
        'birthday' => '1990-11-11', 'date_of_join' => '12/14/2018', 'location' => 'location']);
    return view('admin.employees.laundery_staff.edit', ['active' => 'laundery_staff', 'staff' => $staff]);
})->name('admin.employees.laundery_staff.edit');

Route::get('/admin/employees/laundery_staff/create', function () {
    return view('admin.employees.laundery_staff.create', ['active' => 'laundery_staff']);
})->name('admin.employees.laundery_staff.create');
/*XX laundery_staff XX*/

/* drivers */
Route::get('/admin/employees/drivers', function () {
    $drivers = collect();

    $drivers->push(['id' => 2, 'name' => 'Ahmed', 'phone' => '(xxx)-xxx-xxxx', 'city' => '-', 'zones' => 'Zone A, Zone B', 'status' => 'Assigned', 'shift' => 'Morning']);
    $drivers->push(['id' => 1, 'name' => 'Mohamed', 'phone' => '(xxx)-xxx-xxxx', 'city' => 'Tustin,Irvine', 'zones' => '-', 'status' => 'Pending Activation', 'shift' => 'Noon']);
    return view('admin.employees.drivers.index', ['active' => 'drivers', 'drivers' => $drivers]);
})->name('admin.employees.drivers');

Route::get('/admin/employees/drivers/show/{id}', function () {
    $driver = collect();
    $driver->push(['id' => 1, 'name' => 'Mohamed',
        'phone' => '(xxx)-xxx-xxxx', 'address' => 'Address',
        'birthday' => '1990-11-11',
        'license' => 'license', 'car_type' => 'car type', 'car_model' => 'car model', 'car_production_date' => '2020-10-15', 'car_plate_number' => 'ABC123',
        'zones' => 'Zone A, Zone B',
        'cities' => 'Irvine,Tustin',
        'assignment_date' => '2020-1-11',
        'shift' => 'Night',
    ]);
    return view('admin.employees.drivers.show', ['active' => 'drivers', 'driver' => $driver]);
})->name('admin.employees.drivers.show');

Route::get('/admin/employees/drivers/edit/{id}', function () {
    $driver = collect();
    $driver->push(['id' => 1, 'name' => 'Mohamed',
        'phone' => '(xxx)-xxx-xxxx', 'address' => 'Address',
        'birthday' => '1990-11-11',
        'license' => 'license', 'car_type' => 'car type', 'car_model' => 'car model', 'car_production_date' => '2020-10-15', 'car_plate_number' => 'ABC123',
        'zones' => 'Zone A, Zone B',
        'cities' => 'Irvine,Tustin',
        'assignment_date' => '2020-01-11',
        'shift' => 'Night',
        'notes' => 'Notes',
    ]);
    return view('admin.employees.drivers.edit', ['active' => 'drivers', 'driver' => $driver]);
})->name('admin.employees.drivers.edit');

Route::get('/admin/employees/drivers/create', function () {
    return view('admin.employees.drivers.create', ['active' => 'drivers']);
})->name('admin.employees.drivers.create');
/*XX drivers XX*/

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
 * Promocodes Start
 * ************************** */
Route::get('/admin/promocodes', function () {
    $promocodes = collect();
    $promocodes->push(['id' => 1, 'name' => 'Promocode NO 1', 'start_date' => '2020-12-31', 'end_date' => '2020-12-31', 'status' => 'Status']);
    $promocodes->push(['id' => 2, 'name' => 'Promocode NO 2', 'start_date' => '2020-12-31', 'end_date' => '2020-12-31', 'status' => 'Status']);
    return view('admin.promocodes.index', ['active' => 'promocodes', 'promocodes' => $promocodes]);
})->name('admin.promocodes');

Route::get('/admin/promocodes/add', function () {
    return view('admin.promocodes.create', ['active' => 'promocodes']);
})->name('admin.promocodes.add');

Route::get('/admin/promocodes/edit/{id}', function () {
    $promocode = collect();
    $promocode->push(['id' => 1, 'name' => 'Promocode NO 1', 'start_date' => '2020-12-31', 'end_date' => '2020-12-31', 'status' => 'Status']);
    return view('admin.promocodes.edit', ['active' => 'promocodes', 'promocode' => $promocode]);
})->name('admin.promocodes.edit');

Route::delete('/admin/promocodes/delete/{id}', function () {
    return view('admin.promocodes.index', ['active' => 'promocodes']);
})->name('admin.promocodes.delete');

/******************************
 * Promocodes End
 * ************************** */

/******************************
 * Zones Start
 * ************************** */
Route::get('/admin/zones', function () {
    $zones = collect();
    $zones->push(['id' => 1, 'name' => 'Zone NO 1', 'cities' => 'Alexandria, Cairo, Giza']);
    $zones->push(['id' => 2, 'name' => 'Zone NO 2', 'cities' => 'Qena, Aswan, Sohag']);
    return view('admin.zones.index', ['active' => 'zones', 'zones' => $zones]);
})->name('admin.zones');

Route::get('/admin/zones/add', function () {
    return view('admin.zones.create', ['active' => 'zones']);
})->name('admin.zones.add');

Route::get('/admin/zones/edit/{id}', function () {
    return view('admin.zones.edit', ['active' => 'zones']);
})->name('admin.zones.edit');

Route::delete('/admin/zones/delete/{id}', function () {
    return view('admin.zones.index', ['active' => 'zones']);
})->name('admin.zones.delete');

/******************************
 * Zones End
 * ************************** */

/******************************
 * Zones Start
 * ************************** */
Route::get('/admin/cities', function () {
    $cities = collect();
    $cities->push(['id' => 1, 'name' => 'Alexandria']);
    $cities->push(['id' => 2, 'name' => 'Cairo']);
    return view('admin.cities.index', ['active' => 'cities', 'cities' => $cities]);
})->name('admin.cities');

/******************************
 * Zones End
 * ************************** */

/******************************
 * Navbar API Start
 * ************************** */
/* Chat */
Route::get('/chat_notifications', function () {
    $chat_notifications = collect();
    $chat_notifications->push(['id' => 1, 'user_id' => 1, 'userimage' => "/images/icons/profile.svg", 'username' => 'Mohamed Salah', 'message' => 'Testiing new message testjbjkgkjkjvkjvkjvjkvjkvjkvjkvjkv', 'time' => '12m', 'isread' => false]);
    $chat_notifications->push(['id' => 2, 'user_id' => 2, 'userimage' => "/images/icons/profile.svg", 'username' => 'Ahmed', 'message' => 'Testiing new message', 'time' => '12m', 'isread' => true]);
    $chat_notifications->push(['id' => 3, 'user_id' => 3, 'userimage' => "/images/icons/profile.svg", 'username' => 'Ali', 'message' => 'Testiing new message', 'time' => '12m', 'isread' => true]);

    return json_encode($chat_notifications);

})->name('admin.chat_notifications');

Route::get('/notifications', function () {
    $notifications = collect();
    $notifications->push(['id' => 1, 'user_id' => 1, 'userimage' => "/images/icons/profile.svg", 'username' => 'Mohamed Salah', 'type' => 'new', 'time' => '12 minutes ago', 'isopened' => false]);
    $notifications->push(['id' => 2, 'user_id' => 2, 'userimage' => "/images/icons/profile.svg", 'username' => 'Ahmed', 'type' => 'modify', 'time' => '12 minutes ago', 'isopened' => true]);
    $notifications->push(['id' => 3, 'user_id' => 3, 'userimage' => "/images/icons/profile.svg", 'username' => 'Ali', 'type' => 'cancel', 'time' => '12 minutes ago', 'isopened' => true]);

    return json_encode($notifications);

})->name('admin.notifications');

/******************************
 * Navbar API End
 * ************************** */

/*****************************
 **** End of ADMIN ROUTES ****
/*****************************/
