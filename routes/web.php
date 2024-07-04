<?php

use Illuminate\Support\Facades\Route;

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

/**
 * Unsecure Displays
 */
Route::get('/', function () {
    return view('welcome');
});

/**
 * Login Pages
 */
Route::get('/login', 'Auth\LoginController@redirectToProvider')->name('login');
Route::get('/callback', 'Auth\LoginController@handleProviderCallback')->name('callback');
Route::get('/logout', 'Auth\LoginController@logout')->name('logout');

/**
 * Secure Pages
 */
Route::group(['middleware' => ['auth']], function() {
    /**
     * Dashboard
     */
    Route::get('/dashboard', 'Dashboard\DashboardController@index')->name('/dashboard');
    Route::get('/profile', 'Dashboard\DashboardController@profile')->name('/profile');

    /**
     * Buyback pages
     */
    Route::get('/buyback', 'Dashboard\BuybackController@getBuyback')->name('/buyback');
    Route::post('/buyback', 'Dashboard\BuybackController@postBuyback');

    /**
     * Scopes Pages
     */
    Route::get('/scopes/select', 'Auth\EsiScopeController@displayScopes');
    Route::post('redirectToProvider', 'Auth\EsiScopeController@redirectToProvider');

    /**
     * Reactions Pages
     */
    Route::get('/reactions/entry', 'Reactions\ReactionsController@displayReactions');
    Route::get('/reactions/iterations', 'Reactions\ReactionsController@displayIterations');
    Route::get('/reactions/calculate', 'Reactions\ReactionsController@displayCalculate');
    Route::post('/reactions/calculate', 'Reactions\ReactionsController@postCalculate');
});
