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
*/

Schema::defaultStringLength(191);

Route::get('/', 'WelcomeController@index');
Route::get('/portfolio', 'WelcomeController@portfolio');
Route::get('/dashboard', 'SuperAdminController@index');
Route::get('/admin', 'AdminController@index');
Route::get('/add-category', 'SuperAdminController@addCategory');
Route::post('/save-category', 'SuperAdminController@saveCategory');
Route::post('/admin-login-check', 'AdminController@adminLoginCheck');
Route::get('/logout','SuperAdminController@AdminLogout');
Route::get('/manage-category','SuperAdminController@ManageCategory');
Route::get('/unpublish-category/{id}', 'SuperAdminController@unpublishCategory');
Route::get('/publish-category/{id}', 'SuperAdminController@publishCategory');
Route::get('/delete-category/{id}', 'SuperAdminController@deleteCategory');
Route::get('/delete-blog/{id}', 'SuperAdminController@deleteBlog');
Route::get('/edit-category/{id}', 'SuperAdminController@editCategory');
Route::get('/edit-blog/{id}', 'SuperAdminController@editBlog');
Route::post('/update-category', 'SuperAdminController@updateCategory');
Route::post('/update-blog', 'SuperAdminController@updateBlog');
Route::get('/add-blog', 'SuperAdminController@addBlog');
Route::post('/save-blog', 'SuperAdminController@saveBlog');
Route::get('/blog-details/{id}', 'WelcomeController@blogDetails');
Route::get('/manage-blog','SuperAdminController@ManageBlog');