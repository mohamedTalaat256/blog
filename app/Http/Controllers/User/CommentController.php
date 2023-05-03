<?php

namespace App\Http\Controllers\User;

use App\Events\Message;
use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\Request as ModelsRequest;
use App\Traits\MyTrait;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{

    public function index($id)
    {
        $comments = Comment::where('post_id',$id )
        ->join('users', 'users.id', '=', 'comments.user_id')
        ->select('comments.*', 'users.name as username', 'users.image as user_image')
        ->orderBy('id', 'DESC')
        ->get();
        return view('user.requests.comments', compact('comments',));

    }


    public function store(Request $request)
    {

        $data = array();
        $data['user_id'] = Auth::user()->id;
        $data['post_id'] = $request->post_id;
        $data['comment'] = $request->comment;


        Comment::create($data);

        return redirect()->route('user_requests')->with('success', 'comment Added Successfully!');
    }


    public function delete(Request $request)
    {


        Comment::where('id', $request->id)->delete();

        return redirect()->route('user_requests')->with('success', 'comment deleted Successfully!');
    }



    public function getToAdmin($id)
    {
        $comments = Comment::where('post_id',$id )
        ->join('users', 'users.id', '=', 'comments.user_id')
        ->select('comments.*', 'users.name as username', 'users.image as user_image')
        ->orderBy('id', 'DESC')
        ->get();
        return view('admin.income_requests.comments', compact('comments',));

    }



}
