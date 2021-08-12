<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;

Route::Group(['middleware' => ['adminLoggedIn']],function(){
    Route::view('/login','admin/adminLoginPage');
    Route::post('adminlogin',[AdminController::class,'adminLogin']);
});

Route::Group(['middleware' => ['adminNotLoggedIn']],function(){
    Route::view('/','admin/adminDashboard');
    Route::view('/dashboard','admin/adminDashboard');
    Route::view('/registerAdmin','admin/registerAdminPage');
    Route::view('/insertProductCategory','admin/insertProductCategoryPage');

    Route::post('/adminRegistration',[AdminController::class,'adminRegistration']);

    
    Route::get('/insertProductsPage',[AdminController::class,'goToProductInsert']);
    Route::post('productinsert',[AdminController::class,'productInsert']);
    Route::post('categoryinsert',[AdminController::class,'categoryInsert']);

    Route::get('/managecategories',[AdminController::class,'showCategories']);
    Route::get('/manageproducts',[AdminController::class,'showProducts']);
    Route::get('/manageadmins',[AdminController::class,'showAdmins']);

    Route::get('/aLogOut',function(){
        if(session()->has('adminuser')){
            session()->pull('adminuser');
        }
        return redirect('tsadmin/login');
    });
});
