<?php

use App\Http\Controllers\GeneralController;
use App\Http\Livewire\Admin\Categories\Categories;
use App\Http\Livewire\Admin\Home\Home as AdminHome;
use App\Http\Livewire\Admin\Offers\Offers as AdminOffers;
use App\Http\Livewire\Admin\Orders\Orders as AdminOrders;
use App\Http\Livewire\Admin\Reports\Reports as AdminReports;
use App\Http\Livewire\Admin\ResturantRequest\ResturantRequest;
use App\Http\Livewire\Admin\Resturants\Resturants as ResturantsResturants;
use App\Http\Livewire\Admin\Users\Users;
use App\Http\Livewire\Profile;
use App\Http\Livewire\Resturant\Home\Home;
use App\Http\Livewire\Resturant\Meals\Meals;
use App\Http\Livewire\Resturant\Notifications\Notifications as ResturantNotifications;
use App\Http\Livewire\Resturant\Offers\Offers as ResturantOffers;
use App\Http\Livewire\Resturant\Orders\Orders as ResturantOrders;
use App\Http\Livewire\Resturant\Reports\Reports;
use App\Http\Livewire\User\Cart\Cart;
use App\Http\Livewire\User\Cart\Checkout;
use App\Http\Livewire\User\Meals\Meal;
use App\Http\Livewire\User\Notifications\Notifications;
use App\Http\Livewire\User\Offers\Offers;
use App\Http\Livewire\User\Orders\Orders;
use App\Http\Livewire\User\Paypal\CancelPaypal;
use App\Http\Livewire\User\Paypal\ReturnPaypal;
use App\Http\Livewire\User\Resturants\Resturants;
use App\Http\Livewire\User\Resturants\Show;
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
/* ********************************************************************** Users Route **************************************/

Route::get('/', [GeneralController::class,'home'])->name('landPage');
Route::get('/resturants', Resturants::class)->name('users.resturants');
Route::get('resturants/{resturant}',Show::class)->name('users.show.resturant');
Route::get('/offers', Offers::class)->name('users.offers');
Route::get('meals/{meal}', Meal::class)->name('users.meal');
Route::get('search', [GeneralController::class, 'search'])->name('search');

/* ********************** USER.Profile *****************/
Route::middleware('auth:web')->group(function () {
    Route::get('cart', Cart::class)->name('cart');
    Route::get('notifications', Notifications::class)->name('notifications');
    Route::get('paypal/return', ReturnPaypal::class)->name('return.paypal');
    Route::get('paypal/cancel', CancelPaypal::class)->name('cancel.paypal');
    Route::get('checkout', Checkout::class)->name('checkout');
    Route::get('my-orders', Orders::class)->name('my_orders');
});


/* ********************************************************************** Resturants Route**************************************/
Route::prefix('resturant')->group(function () {
    Route::middleware('auth:resturant')->group(function () {
        Route::get('dashboard',Home::class)->name('resturant.dashboard');
        Route::get('notifications', ResturantNotifications::class)->name('resturant.notifications');
        Route::get('meals', Meals::class)->name('resturant.meals');
        Route::get('orders', ResturantOrders::class)->name('resturant.orders');
        Route::get('offers', ResturantOffers::class)->name('resturant.offers');
        Route::get('reports', Reports::class)->name('resturant.reports');
    });
});
/* ********************************************************************** Admins Route **************************************/
Route::prefix('admin')->group(function () {
    Route::middleware('auth:admin')->group(function () {

        Route::get('dashboard',AdminHome::class)->name('admin.dashboard');
        Route::get('categories', Categories::class)->name('admin.categories');
        Route::get('resturants', ResturantsResturants::class)->name('admin.resturants');
        Route::get('users', Users::class)->name('admin.users');
        Route::get('resturant-request', ResturantRequest::class)->name('admin.resturant_request');
        Route::get('orders', AdminOrders::class)->name('admin.orders');
        Route::get('reports', AdminReports::class)->name('admin.reports');
        Route::get('offers', AdminOffers::class)->name('admin.offers');
    });
});

/* ********************************************************************** All guard Route ************************************/

Route::middleware('auth:web,resturant,admin')->group(function () {
    Route::get('profile', Profile::class)->name('user.profile');
});
require_once __DIR__ . '/fortify.php';
