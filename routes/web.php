<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
| Route::get = for normal navigation
| Route::post = submitting a page
|
*/

Route::get('/', function () {
    return view('home');
});

Route::get('/portfolio', function () {
    return view('portfolio');
});

Route::get('/blog', 'blogController@blog');

Route::get('/blog/{id}', 'blogController@getBlogPost');

Route::get('/contact','contactController@contact');

Route::post('/contact','contactController@submitContact');

// Admin
Route::get('/admin', function () {
    return view('admin_dashboard');
});