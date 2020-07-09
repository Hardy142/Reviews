<?php

use App\Review;
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

// Welcome Page
Route::get('/', function () {

    $reviews = Review::orderBy('id', 'desc')->take(4)->get();

    return view('welcome', ['reviews' => $reviews]);

});

Auth::routes();

// Dashboard (Logged In)
Route::get('/dashboard', 'HomeController@index')
    ->name('home')
    ->middleware('auth');

// Reviews
Route::get('/reviews', 'ReviewController@index')
    ->name('reviews-filter');
Route::post('/reviews', 'ReviewController@store')
    ->name('reviews.create')
    ->middleware('auth');

// Restaurants
Route::get('/restaurants', 'RestaurantController@index')
    ->name('restaurants-filter');
Route::get('/restaurants/create', 'RestaurantController@create');
Route::post('/restaurants', 'RestaurantController@store');
Route::get('/restaurants/{restaurant}', 'RestaurantController@show');

// Profile
Route::get('/profile', 'UserController@edit');
Route::put('/profile/{user}', 'UserController@update');
