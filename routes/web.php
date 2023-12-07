<?php

use App\Http\Controllers\AuctionController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SellerController;
use App\Http\Controllers\RegisteredUserController;
use App\Http\Controllers\paypal;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\LoginAdmin;
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\VehicleController;
use App\Http\Livewire\BiddingComponent;
use App\Http\Controllers\Controller;
use App\Http\Controllers\LiveAuction;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
// Route::get('/', function () {
//     return view('pages/index');
// });
Route::get('/', [Controller::class, 'home']);

Route::get('/bidding', function () {
    return view('Pages/bidding');
})->name('bidding');
Route::resource('bidding', BiddingComponent::class);


// home page with watch list
Route::get('index', [Controller::class, 'home'])->name('home');

Route::post('watch', [Controller::class, 'watch'])->middleware('auth', 'verified')->name('watch');


// /////////////////pages in the web site
Route::get('contact', function () {
    return view('pages/contactus');
})->name('contact');

Route::get('about', function () {
    return view('pages/aboutus');
})->name('about');

Route::get('services', function () {
    return view('pages/services');
})->name('services');


// Route::get('categery', function () {
//     return view('pages/categery');
// })->name('categery');


// //////////////////display the vehicles///////////////


Route::get('categery', [SearchController::class, 'index'])->name('categery');
Route::get('subcategery/{id}', [SearchController::class, 'single'])->name('subcategery');
Route::post('subcategery/bid', [Controller::class, 'bid'])->name('bid');

Route::post('/winner', [LiveAuction::class, 'winner'])->name('winner');
Route::post('/livebid', [LiveAuction::class, 'livebidding'])->name('livebid');
Route::get('/livebid/{vehicleId}', [LiveAuction::class, 'getlastbidder'])->name('getlivebid');

Route::get('auction/{id}', [LiveAuction::class, 'auction'])->name('auction');
Route::get('auctiondata', [LiveAuction::class, 'auctiondata'])->name('auctiondata');
Route::get('VehiclesParticipants', [LiveAuction::class, 'VehiclesParticipants'])->name('VehiclesParticipants');





// Route::get('register', function () {
//     return view('pages/register');
// });












/// ////////////////for paypal payment gateway//////////////////////////
Route::post('paypal', [paypal::class, 'payment'])->name('paypal');
Route::get('success/{user_id}', [paypal::class, 'success'])->name('payment.success');
Route::get('cancel', [paypal::class, 'cancel'])->name('payment.cancel');

Route::get('conformation', function () {
    return view('pages/conformation');
})->name('conformation');

//////////////// // // ////////////////////////////////////////////////



///////////////////////// search route ///////////////////////////////////
// 
Route::get('search', [SearchController::class, 'index'])->name('search');

//////////////////////////update account//////////////////////////

Route::get('updateAccount', [Controller::class, 'update_seller'])->name('update_seller');
Route::post('account_updated', [Controller::class, 'account_updated'])->name('account_updated');

////////////////////////////////////////////////////////////////////////////


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');


    Route::post('registertow', [\App\Http\Controllers\Auth\RegisteredUserController::class, 'storeregistertow']);
    Route::get('registertow', function () {
        return view('pages/registertow');
    })->name('registertow');
});


Route::post('registertow', [\App\Http\Controllers\Auth\RegisteredUserController::class, 'storeregistertow'])->name('registertow');

// //////////////////////////////////////////////////////////////////////
/////////////////// //  // admin dashboard routes////////////////////////
// //////////////////////////////////////////////////////////////////////
Route::get('/loginadmin', [LoginAdmin::class, 'index'])->name('loginadmin');
Route::post('/loginadmin', [LoginAdmin::class, 'store'])->name('adminlogin');



Route::get('/logoutadmin', [LoginAdmin::class, 'logout_admin'])->name('logoutadmin');

Route::prefix('admin')->middleware('IsAdmin')->group(function () {
    Route::get('adminhome', [Controller::class, 'dashboard'])->name('adminhome');

    Route::resource('admins', AdminController::class);

    Route::get('adduser', function () {
        return view('admindashboard/pages/adduser');
    })->name('adduser');

    Route::get('addvehicles', function () {
        return view('admindashboard/pages/addvehicles');
    })->name('add.create');
    // Add users by use admin dashboard
    Route::resource('vehicle', VehicleController::class);
    Route::get('currentvehicles', [VehicleController::class, 'show'])->name('currentvehicles');
    Route::get('winner', [Controller::class, 'winners'])->name('winners');

    // /////////((ADMIN))////(users, update users,delete users, ) //////////
    Route::resource('user', UsersController::class);

    // /////////////////////////////////
///////////(auction)//////////////
    Route::resource('auction', AuctionController::class);

    Route::get('addauction', function () {
        return view('admindashboard/pages/addauction');
    })->name('addauction');

});
// //////////////////////////////////////////////////////////////////////
/////////////////// // End the admin dashboard routes////////////////////////
// //////////////////////////////////////////////////////////////////////





// ///////////// ((SELLER)) ////////(update vehicles, Add vehicles,delete vehicles, ) //////////

Route::resource('seller', SellerController::class);
Route::get('sellervehicles', [SellerController::class, 'show'])->name('sellervehicles');

Route::get('buyervehicles', [Controller::class, 'buyer'])->name('buyervehicles');
Route::get('vehicles', [Controller::class, 'vehicle'])->name('vehicles');
Route::post('join', [Controller::class, 'join'])->name('join');


require __DIR__ . '/auth.php';