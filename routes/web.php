<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminBackend\AdminController;
use App\Http\Controllers\AdminBackend\DashboardController;
use App\Http\Controllers\UserBackend\UserController;
use Illuminate\Support\Facades\Route;



//************ ** Admin Dashboard part************************

Route::middleware(['auth', 'verified','role:admin'])->group(function () {
// middleware group  start

   Route::controller(AdminController::class)->group(function () {
       Route::get('admin/logout', 'logout')->name('admin.logout');
       
   }); 
   Route::controller(DashboardController::class)->group(function () {
         Route::get('admin/dashboard', 'index')->name('admin.dashboard');
       
   }); 


// middleware group  end
});
Route::get('/admin', [AdminController::class, 'loginPage'])->name('admin.login.page')->middleware('guest');
Route::post('/admin/login', [AdminController::class, 'login'])->name('admin.login')->middleware('guest');



//************user dashboard part*************************

Route::middleware(['auth', 'verified','role:user'])->group(function () {
   Route::controller(UserController::class)->group(function () {
       Route::get('dashboard', 'index')->name('dashboard');
       
   }); 

});


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
include('frontend.php');