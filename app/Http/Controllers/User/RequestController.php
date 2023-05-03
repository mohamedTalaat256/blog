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

class RequestController extends Controller
{

    public function index()
    {
        $requests = ModelsRequest::join('users', 'users.id', '=', 'requests.user')
        ->select('requests.*', 'users.name as username', 'users.image as user_image')
        ->orderBy('id', 'DESC')
        ->get();


        $data = array();
        for ($i = 0; $i < count($requests); $i++) {
            $comment = Comment::where('post_id', $requests[$i]->id)->get();

            array_push($data, (object) [
                'id'=>  $requests[$i]->id,
                'content' => $requests[$i]->content,
                'title' => $requests[$i]->title,
                'image' => $requests[$i]->image,
                'user' =>  $requests[$i]->user,
                'seen'=>  $requests[$i]->seen,
                'created_at' => $requests[$i]->created_at,
                'updated_at' =>  $requests[$i]->updated_at,
                'username' => $requests[$i]->username,
                'user_image'=> $requests[$i]->user_image,
                'comment_count' => $comment->count()
            ]);


        }





       return view('user.requests.index', compact('data'));
    }


    public function create()
    {
        return view('user.requests.create');
    }
    public function store(Request $request)
    {


        $request->validate(
            [
                'title' => ['required','string', 'max:255'],
                'content' => ['required', 'string', 'min:20'],
             'image' => 'required|image|mimes:jpeg,png,jpg|max:1024',
            ]
        );


        $data = array();
        $data['user'] = Auth::user()->id;
        $data['content'] = $request->content;
        $data['title'] = $request->title;


        $file = $request->file('image');
        $image_name = $file->getClientOriginalName();
        $file->move('assets/images', $image_name);
        $image = $image_name;
        $data['image'] = $image;


        $request_id = ModelsRequest::insertGetId($data);


        return redirect()->route('user_requests')->with('success', 'post Added Successfully!');
    }

    public function show($id)
    {
        $request = ModelsRequest::where('requests.id', $id)
            ->join('users', 'users.id', '=', 'requests.user')
            ->select('requests.*', 'users.id as user_id','users.name as username', 'users.image as user_image')->first();

        if($request->user != Auth::user()->id){
            return redirect()->route('user_requests')->with('danger', 'can not display the request');

        }

        return view('user.requests.show', compact('request',));
    }


    public function update(Request $request)
    {
        $request->validate(
            [
                'title' => ['required','string', 'max:255'],
                'content' => ['required', 'string', 'min:20'],
             //'image' => 'required|image|mimes:jpeg,png,jpg|max:1024',
            ]
        );


        $data = array();
        $data['content'] = $request->content;
        $data['title'] = $request->title;


        if($request->file('image')){
            $file = $request->file('image');
            $image_name = $file->getClientOriginalName();
            $file->move('assets/images', $image_name);
            $image = $image_name;
            $data['image'] = $image;
        }





        ModelsRequest::where('id', $request->id)->update($data);


        return redirect()->route('user_show_request', ['id'=> $request->id])->with('success', 'post updated Successfully!');

    }

    public function delete(Request $request)
    {
        ModelsRequest::where('id', $request->id)->delete();

        return redirect()->route('user_requests')->with('success', 'post deleted Successfully!');
    }

}
