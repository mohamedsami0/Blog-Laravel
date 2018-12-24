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

Route::get('/', function () {
    
    return view('welcome');
    
});


// Admin Middleware

Route::group(['middleware' => 'roles', 'roles' => ['admin']], function(){

    Route::get('/admin', 'roles_controller@showAdmin');

    // Add Role
    Route::post('/add-Role', 'roles_controller@addRole');
     // Write Post
     Route::get('/write-post', 'posts_controller@writePost');
     // Store POSTS
    // Store POSTS
    Route::post('/posts/store', 'posts_controller@storePost');
    // Edit Post
    Route::get('/posts/{post}/edit', 'posts_controller@showEdit');
    Route::put('/posts/{post}/edit/updated', 'posts_controller@editPost');
    // Delete Post
    Route::delete('/posts/{post}/delete', 'posts_controller@deletePost');

});

// Author Middleware

Route::group(['middleware' => 'roles', 'roles' => ['author']], function(){

    // Write Post
    Route::get('/write-post', 'posts_controller@writePost');
    // Store POSTS
    Route::post('/posts/store', 'posts_controller@storePost');

});



// Global Route

// Register
Route::get('/register', 'register_controller@showRegisterPage');
Route::post('/register', 'register_controller@storeUsers');
 // Login
 Route::get('/login', 'sissons_controller@showLoginPage');
 Route::post('/login', 'sissons_controller@login_store');
// Logout
Route::get('/logout','sissons_controller@logout');
 
// Posts
 // Get posts
Route::get('/posts', 'posts_controller@homePage');

// Single Page
Route::get('/posts/{post}', 'posts_controller@singlePost');

// Comments
// Store comments
Route::post('/posts/{post}/storeComment', 'comments_controller@storeComment');
// Contact
Route::get('/contact', 'contact@showContact');
Route::post('/contact/send_mail', 'contact@sendMail');
// Tags
Route::resource('tags', 'TagsController')->only(['show']);
Route::get('access-denied', 'roles_controller@showAccessDenied');
 

 // Search Route

 Route::post('/search', 'search_controller@searchQueary');

 Route::post('/store-tag', 'TagsController@storeTag');


