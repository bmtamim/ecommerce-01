<?php

use App\Http\Controllers\Frontend\AjaxController;
use App\Http\Controllers\Frontend\CartController;
use App\Http\Controllers\Frontend\CheckoutController;
use App\Http\Controllers\Frontend\DashboardController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\NewsletterController;
use App\Http\Controllers\Frontend\OrderController;
use App\Http\Controllers\Frontend\ProductController;
use App\Http\Controllers\Frontend\UserProfileController;
use App\Http\Controllers\Frontend\UserRegisterController;
use App\Http\Controllers\Frontend\WishlistController;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\View;

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

Route::get('/', HomeController::class)->name('home');

//Register Route
Route::post('/register', [UserRegisterController::class, 'create'])->name('register');

//User Dashboard Routes
Route::prefix('my-account')->name('dashboard.')->middleware(['auth:sanctum,web', 'verified'])->group(function () {

    Route::get('/', DashboardController::class)->name('index');

    Route::get('/orders', [OrderController::class, 'index'])->name('orders.index');

    Route::get('/order/{id}/view',[OrderController::class,'orderView'])->name('orders.view');
    Route::resource('account-details', UserProfileController::class)->only(['index', 'update']);

});

//Authenticated user only
Route::middleware(['auth:sanctum,web', 'verified'])->group(function () {

    //Wishlist View
    Route::get('wishlists', [WishlistController::class, 'index'])->name('wishlists');
    //Ajax Wishlist
    Route::post('/ajax/wishlists/view', [WishlistController::class, 'ajaxWishlistShow'])->name('ajax.ajaxWishlistShow');

    Route::post('/ajax/add-to-wishlist/', [WishlistController::class, 'ajaxAddToWishlist'])->name('ajax.addToWishlist');

    Route::post('/ajax/remove-wishlist-item', [WishlistController::class, 'removeWishlistItem'])->name('ajax.removeWishlistItem');

    //CheckOut
    Route::get('/checkout', [CheckoutController::class, 'index'])->middleware(['checkout'])->name('checkout.index');

    Route::post('/checkout', [CheckoutController::class, 'store'])->middleware(['checkout'])->name('checkout.store');

    Route::get('/checkout/order/{id}/success', [CheckoutController::class, 'orderSuccess'])->name('order.success');

});

Route::resource('newsletters', NewsletterController::class)->only('store');

//Product Route
Route::get('/product/{slug}', [ProductController::class, 'productDetails'])->name('product.details');

//All cart Route
Route::get('cart', [CartController::class, 'index'])->name('cart.index');
Route::post('add-to-cart', [CartController::class, 'addToCart'])->name('addToCart');


//View Composer
View::composer('frontend.layouts.partials.header', function ($view) {
    $cartValue = Cart::content();
    $view->with('cartValue', $cartValue);
});

//Ajax Route

//Load Product by category in home
Route::post('/category/new-product', [AjaxController::class, 'newProductByCategory'])->name('newProduct.byCategory');
Route::get('/ajax/product/quickview', [AjaxController::class, 'productQuickView'])->name('ajax.product.quickview');

// Cart Ajax
Route::post('ajax/add-to-cart', [CartController::class, 'ajaxAddToCart'])->name('ajax.addToCart');

Route::post('ajax/cart/item/remove', [CartController::class, 'ajaxCartItemRemove'])->name('ajaxCartItemRemove');

Route::post('ajax/cart/item/refresh', [CartController::class, 'ajaxCartItemsRefresh'])->name('ajaxCartItemsRefresh');

Route::post('ajax/cart-qty/update', [CartController::class, 'ajaxCartQtyUpdate'])->name('ajax.cartQtyUpdate');

Route::post('/ajax/coupon/apply', [CartController::class, 'ajaxCouponApply'])->name('ajax.couponApply');

Route::post('/ajax/coupon/remove', [CartController::class, 'ajaxCouponRemove'])->name('ajax.couponRemove');

Route::post('ajax/checkout/state/billing', [CheckoutController::class, 'ajaxCheckoutBillingState'])->name('ajax.checkoutBillingState');

//Check card Details Via Ajax
Route::post('/ajax/checkout/stripe/check', [CheckoutController::class, 'ajaxStripeCheck'])->middleware(['auth:sanctum,web', 'checkout'])->name('ajax.ajaxStripeCheck');
