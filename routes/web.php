<?php

use App\Http\Controllers\Admin\Auth\AdminAuthController;
use App\Http\Controllers\User\Auth\LoginController;
use App\Http\Controllers\BackupController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\User\CommentController;
use App\Http\Controllers\User\RequestController;
use Illuminate\Support\Facades\Broadcast;
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

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('userLogin');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');


Route::get('/', [HomeController::class, 'index'])->name('home');

Route::group(['middleware' => [ 'auth' ]], function () {
    Route::get('/requests/create', [RequestController::class, 'create'])->name('user_create_request');
    Route::post('/requests/store', [RequestController::class, 'store'])->name('user_store_request');
	Route::get('/requests/index', [ RequestController::class, 'index'])->name('user_requests');
	Route::get('/requests/show/{id}', [ RequestController::class, 'show'])->name('user_show_request');
	Route::post('/requests/delete', [ RequestController::class, 'delete'])->name('user_delete_request');
	Route::get('/requests/edit/{id}', [ RequestController::class, 'edit'])->name('user_edit_request');
	Route::post('/requests/update', [ RequestController::class, 'update'])->name('user_update_request');


    Route::get('/comments/{id}', [CommentController::class, 'index'])->name('user_get_post_comment');
    Route::post('/comments/store', [CommentController::class, 'store'])->name('user_comment_store');
    Route::post('/comments/delete', [CommentController::class, 'delete'])->name('user_comment_delete');



});


/*---------------------------------------to auth admin----------------------------------------------*/
Route::get('admin/login', [AdminAuthController::class, 'getLogin'])->name('admin_login');
Route::post('admin/login', [AdminAuthController::class, 'postLogin'])->name('adminLoginPost');
Route::get('admin/logout', [AdminAuthController::class, 'logout'])->name('adminLogout');


Route::get('delete_all_backups', [ BackupController::class, 'delete_all_backups'])->name('delete_all_backups');
