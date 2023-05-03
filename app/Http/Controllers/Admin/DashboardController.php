<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Request as ModelsRequest;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function adminDashboard()
    {


        $users = User::select('users.name as name', 'users.id as id', 'users.image as image', 'users.job as job')
            ->selectRaw('(SELECT COUNT(*)  FROM `requests` WHERE requests.created_at >= current_date - 7 AND requests.user = users.id ) AS `request_count` ')
            ->orderBy('request_count', 'DESC')
            ->latest()->take(4)->get();


        return view('admin.dashboard.index', compact('users'));
    }

}
