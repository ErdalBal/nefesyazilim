<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\BlogController;
use App\Http\Controllers\Backend\AboutController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\SettingsController;
use App\Http\Controllers\Backend\Auth\AuthController;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\PortfolioController;
use App\Http\Controllers\Backend\CommentpostController;
use App\Http\Controllers\Backend\ServiceAboutController;



Route::prefix('/admin')->group(function(){

    Route::get('/',[AuthController::class,'login'])->name('Login');
    Route::post('/signin',[AuthController::class,'signin'])->name('Signin');
    
    Route::middleware(['Admin'])->group(function () {
        
        Route::get('/logout',[AuthController::class,'logout'])->name('Logout');
        
        Route::get('/dashboard',[DashboardController::class,'index'])->name('Dashboard');
       
    // Category Start
        Route::resource('category',CategoryController::class);
        Route::delete('/category/{id}', [CategoryController::class, 'destroy'])->name('category.delete');
// Category Finish

 // Blog Start
 Route::resource('posts',BlogController::class);
 Route::delete('/posts/{id}', [BlogController::class, 'destroy'])->name('posts.delete');
// Blog Finish

 // Author Start
 Route::resource('author',AuthorController::class);
 Route::delete('/author/{id}', [AuthorController::class, 'destroy'])->name('author.delete');
// Author Finish

// Settings Start
Route::resource('settings',SettingsController::class);
Route::delete('/settings/{id}', [SettingsController::class, 'destroy'])->name('settings.delete');
// Settings Finish

// About Start
Route::resource('about',AboutController::class);

// About Finish

// About Service Start
Route::resource('aboutservice',ServiceAboutController::class);
Route::delete('/aboutservice/{id}', [ServiceAboutController::class, 'destroy'])->name('aboutservice.delete');
// About Service Finish

// Poprtfolio Start
Route::resource('portfolio',PortfolioController::class);
Route::delete('/portfolio/{id}', [PortfolioController::class, 'destroy'])->name('portfolio.delete');
// Poprtfolio Finish



// Comment Start
Route::resource('commentpost',CommentpostController::class);
Route::delete('/commentpost/{id}', [CommentpostController::class, 'destroy'])->name('commentpost.delete');
// Comment Finish

    });


    // ->middleware(['Dashboard'])

});


Route::get('{any}', function () {
    return view('welcome');
})->where('any', '.*');



