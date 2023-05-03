<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\User;
use App\Traits\MyTrait;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{

    use MyTrait;

    public function users()
    {

        $users = User::select('users.name as name', 'users.id as id', 'users.image as image')
            ->selectRaw('(SELECT COUNT(*)  FROM `requests` WHERE requests.user = users.id ) AS `request_count` ')
            ->orderBy('request_count', 'DESC')
            ->get();

        $admins = Admin::get();

        return view('admin.users.all_users', compact('users','admins'));
    }

    public function searchUsersFromTo(Request $request)
    {
        $start_date = $request->start_date;
        $end_date = $request->end_date;
        $users = User::select('users.name as name', 'users.id as id', 'users.image as image')
        ->selectRaw('(SELECT COUNT(*)  FROM `posts` WHERE posts.date BETWEEN "' . $start_date . '" AND "' . $end_date . '" AND posts.user = users.id ) AS `post_count` ')
        ->orderBy('post_count', 'DESC')
        ->get();

        $admins = Admin::get();

        return view('admin.users.all_users', compact('users','admins'));
    }

    public function newUser()
    {
        return view('admin.users.add_user');
    }

    public function newAdmin()
    {
        return view('admin.users.add_admin');
    }

    public function add(Request $request)
    {

        $request->validate(
            [
                'name' => ['required', 'string', 'max:255'],
                'nikname' => ['required', 'string', 'max:15'],
                'code' => ['required', 'string', 'max:15'],
                'letter' => ['required', 'string', 'max:1'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
                'password' => ['required', 'string', 'min:8'],
            ]
        );

        $file = $request->file('image');
        $image_name = $file->getClientOriginalName();
        $file->move('assets/images', $image_name);
        $image = $image_name;

        User::create([
            'name' => $request->name,
            'nikname' => $request->nikname,
            'code' => $request->code,
            'email' => $request->email,
            'phone' => $request->phone,
            'letter' => $request->letter,

            'image' => $image,
            'password' => Hash::make($request->password),
            'job' => 'ok',
            'progress' => 0,
        ]);

        return redirect()->route('all_users')->with('success', 'user added successfully');
    }

    public function addAdmin(Request $request)
    {

        // return $request;

        $request->validate(
            [
                'name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
                'password' => ['required', 'string', 'min:8'],
            ]
        );

        $file = $request->file('image');
        $image_name = $file->getClientOriginalName();
        $file->move('assets/images', $image_name);
        $image = $image_name;

        Admin::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'image' => $image,
            'password' => Hash::make($request->password),
            'job' => $request->job,
            'is_super' => $request->is_super,
        ]);

        return redirect()->route('all_users')->with('success', 'admin added successfully');
    }

    public function viewUser($id)
    {
        $user = User::where('id', $id)->first();
        return view('admin.users.view_user', compact('user'));
    }

    public function update(Request $request)
    {
        $id = $request->id;

        $file = $request->file('image');
        $data = array();

        $data['name'] = $request->name;
        $data['nikname'] = $request->nikname;
        $data['code'] = $request->code;
        $data['letter'] = $request->letter;
        $data['email'] = $request->email;
        $data['phone'] = $request->phone;

        if ($file) {
            $image_name = $file->getClientOriginalName();
            $file->move('assets/images', Carbon::now()->timestamp . $image_name);
            $image = Carbon::now()->timestamp . $image_name;
            $data['image'] = $image;
        }

        if ($request->password) {
            $data['password'] = Hash::make($request->password);
        }

        User::where('id', $id)->update($data);

        return redirect()->route('all_users')->with('success', 'user updated successfully');
    }



    public function deleteAdmin($id)
    {
        if (Auth::guard('admin')->user()->is_super == 1) {
            Admin::where('id', $id)->delete();
            return redirect()->route('all_users')->with('success', 'admin deleted successfully');
        }

        return redirect()->route('all_users')->with('danger', 'you must be super admin to perform this action');
    }
}
