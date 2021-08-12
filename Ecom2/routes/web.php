<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\LoginController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ProfileController;


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


Route::view('mapview','mapview');

Route::get('/',[PageController::class,'showHomepage']);
Route::get('products/{c_id}', [PageController::class,'showAllProductsPage']);
Route::get('Product/{id}/{name}', [PageController::class,'showProductpage']);

Route::post('registerUser',[LoginController::class,'registerfunc']);
Route::post('loginUser',[LoginController::class,'loginfunc']);

Route::get('Ulogin/google',[LoginController::class,'redirectToGoogle']);
Route::get('Ulogin/google/callback',[LoginController::class,'handleGoogleCallback']);

Route::get('Ulogin/facebook',[LoginController::class,'redirectToFacebook']);
Route::get('Ulogin/facebook/callback',[LoginController::class,'handleFacebookCallback']);


Route::view('forgotPasswordPage','profile.forgotpasswordpage');
Route::post('forgotPassword',[ProfileController::class,'forgotPassword']);
Route::post('forgotPassOTP',[ProfileController::class,'forgotPasswordotp']);
Route::view('changeforgotpassword','profile.changeforgotpassword');
Route::post('changeForgotPass',[ProfileController::class,'changeForgotPass']);




Route::Group(['middleware' => ['userNotLoggedIn']],function(){

    Route::get('addtocart/{p_id}', [PageController::class,'addToCart']);
    Route::get('mycart', [PageController::class,'showCartPage']);
    
    Route::get('/increaseCartQuantity/{cart_id}', [PageController::class,'increaseCartQuantity']);
    Route::get('/decreaseCartQuantity/{cart_id}', [PageController::class,'decreaseCartQuantity']);
    Route::get('/removeCartProduct/{cart_id}', [PageController::class,'removeCartProduct']);

    Route::view('profile', 'profile/profilePage');
    Route::view('changePasswordPage', 'profile/changepassword');
    Route::view('changeNamePage', 'profile/changename');

    Route::get('profileLoginDetails',[ProfileController::class,'showProfileDetails']);

    Route::post('changePassword',[ProfileController::class,'changePassword']);
    Route::post('changeName',[ProfileController::class,'changeName']);

    Route::get('/UlogOut',function(){
        if(session()->has('user')){
            session()->pull('user');
            session()->pull('userid');
        }
        return redirect('/');
    });

});


/* AIzaSyBVvBQxhKHj9YuQH4F_NyWGtQTGBmXRddU */