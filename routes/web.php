<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\contact;
use App\Http\Controllers\blog;
use App\Http\Controllers\Admin_controller;

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

Route::get('/', [blog::class , 'index']);
Route::post('/contact', [contact::class , 'index']);
Route::post('/blog_upload', [blog::class , 'blog_insert']);

Route::view('/admin' , 'admin/login');
Route::post('/login', [Admin_controller::class , 'index']);

Route::group(["middleware" => ["admin_auth"]] , function(){
    Route::get('/admin/dashboard' , [Admin_controller::class , 'dashboard_data']);
    Route::get('/admin/contact' , [Admin_controller::class , 'contact_data']);
    Route::post('admin/trend_blog' , [Admin_controller::class , 'set_trend_blog']);
    Route::post('admin/delete_blog' , [Admin_controller::class , 'delete_blog']);
    Route::post('admin/get' , [Admin_controller::class , 'get_blog']);
    Route::post('admin/edit_blog' , [Admin_controller::class , 'edit_blog']);
    Route::post('admin/sent-reply' , [contact::class , 'sent_reply']);
    
    
    
});
Route::get('/admin/logOut' , function(){
    session()->forget('email');
    session()->forget('admin_id');
    return redirect('/admin');
});
