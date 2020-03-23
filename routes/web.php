<?php

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

Route::get('/', function () {
    return view('users.login');
});

Route::post('user/do-login', 'Auth\AuthController@doLogin');

Route::get('user/logout', function(){
    Auth::logout();
    return redirect('/');
});

Route::get('gallery/list','GalleryController@viewGalleryList');
Route::post('gallery/save','GalleryController@saveGallery');
Route::get('gallery/view/{id}','GalleryController@viewGalleryPics');
Route::post('image/do-upload','GalleryController@doImageUpload');

