<?php

use App\Http\Controllers\Admin\Auth\AdminAuthController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\BackupController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\IncomeRequestController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\User\CommentController;
use Illuminate\Support\Facades\Route;
/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
*/


Route::group(['middleware' => 'adminauth'], function () {



    Route::get('admin/logout', [AdminAuthController::class, 'logout'])->name('adminLogout');

    Route::get('admin/admin_dashboard', [DashboardController::class, 'adminDashboard'])->name('admin_dashboard');
    Route::get('admin/admin_dashboard/filter_status', [DashboardController::class, 'filter'])->name('admin_requests_filter');


    Route::get('admin/profile', [AdminController::class, 'profile'])->name('admin_profile');
    Route::post('admin/update_admin_profile', [AdminController::class, 'updateProfile'])->name('update_admin_profile');
    Route::get('admin/search_dasboard_status_date', [DashboardController::class, 'adminDashboardDate'])->name('search_dasboard_status_date');


    Route::get('admin/charts_data', [DashboardController::class, 'chartsData'])->name('charts_data');


    Route::get('admin/view_user/{id}', [UserController::class, 'viewUser'])->name('view_user');
    Route::get('admin/new_user/', [UserController::class, 'newUser'])->name('new_user');
    Route::post('admin/add_user/', [UserController::class, 'add'])->name('add_user');
    Route::get('admin/all_users/', [UserController::class, 'users'])->name('all_users');
    Route::post('admin/update_user', [UserController::class, 'update'])->name('update_user');
    Route::get('admin/search_users_from_to/', [UserController::class, 'searchUsersFromTo'])->name('search_users_from_to');




    Route::get('admin/new_admin/', [UserController::class, 'newAdmin'])->name('new_admin');
    Route::post('admin/add_admin/', [UserController::class, 'addAdmin'])->name('add_admin');
    Route::get('admin/delete_admin/{id}', [UserController::class, 'deleteAdmin'])->name('delete_admin');


    /* rrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrr */
    /*                                users reports                                       */
    /* rrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrr */
    Route::get('admin/user_reports', [UserController::class, 'index'])->name('user_reports');
    Route::get('admin/user_posts_report/{user_id}', [UserController::class, 'getPostsOfUser'])->name('user_posts_report');
    Route::get('admin/user_posts_report_search_from_to', [UserController::class, 'searchPostsOfUserFromToDate'])->name('user_posts_report_search_from_to');
    Route::get('admin/search_posts_date_of_user', [UserController::class, 'filtterPostsDateRelatedToUser'])->name('search_posts_date_of_user');
    Route::get('admin/get_user_postes_in_select_date/{user_id}/{date_value}/{source_id}', [UserController::class, 'getUserPostesInSelectDate'])->name('get_user_postes_in_select_date');
    Route::get('admin/get_user_postes_from_to/{user_id}/{start_date}/{end_date}/{source_id}', [UserController::class, 'getUserPostesInFromTo'])->name('get_user_postes_from_to');




    /* ppppppppppppppppppppppppppppppppp    requests       pppppppppppppppppppppppppppppppp */

    Route::get('admin/income_requests/index', [IncomeRequestController::class, 'index'])->name('income_requests');
    Route::get('admin/income_requests/filter', [IncomeRequestController::class, 'filter'])->name('income_requests_filter');


    Route::get('admin/comments/{id}', [CommentController::class, 'getToAdmin'])->name('admin_get_post_comment');

    Route::get('admin/income_requests/show/{id}', [IncomeRequestController::class, 'show'])->name('admin_view_request');
    Route::get('admin/get_request_ajax/{id}', [IncomeRequestController::class, 'showAjax'])->name('admin_get_request_ajax');
    Route::get('admin/edit_post/{id}', [IncomeRequestController::class, 'editPostAdmin'])->name('admin_edit_post');
    Route::post('admin/update_post/', [IncomeRequestController::class, 'UpdateAdmin'])->name('admin_update_post');
    Route::get('admin/accept_request/{id}', [IncomeRequestController::class, 'acceptRequest'])->name('admin_accept_request');
    Route::get('admin/reject_request/{id}', [IncomeRequestController::class, 'rejectRequest'])->name('admin_reject_request');
    Route::get('admin/get_income_requests_by_status/{status}', [IncomeRequestController::class, 'getRequestsByStatus'])->name('get_income_requests_by_status');


    Route::get('admin/backups', [BackupController::class, 'index'])->name('backups');
    Route::get('admin/download_backup', [BackupController::class, 'download'])->name('download_backup');
    Route::get('admin/delete_backup', [BackupController::class, 'delete'])->name('delete_backup');
    Route::get('admin/make_backup', [BackupController::class, 'makeBackup'])->name('make_backup');


    Route::get('admin/terminate_the_system', [BackupController::class, 'terminate_the_system'])->name('terminate_the_system');
});



