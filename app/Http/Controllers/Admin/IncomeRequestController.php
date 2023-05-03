<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\Post;
use App\Models\Request as ModelsRequest;
use App\Models\Source;
use App\Traits\MyTrait;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IncomeRequestController extends Controller
{
    use MyTrait;

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
        return view('admin.income_requests.index', compact('data'));
    }

    public function filter(Request $request)
    {

        $status = $request->status;
        $dateFrom = $request->dateFrom;
        $dateTo = $request->dateTo;


        if($dateFrom and $dateTo){

            if( $status == 4){  //all
                $requests = ModelsRequest::whereBetween('requests.created_at', [$dateFrom, $dateTo])
                ->join('users', 'users.id', '=', 'requests.user')
                ->select('requests.*', 'users.name as username', 'users.image as user_image')
                ->orderBy('id', 'DESC')
                ->paginate(5);
                return view('admin.income_requests.index', compact('requests'));
            }else{
                $requests = ModelsRequest::where('status', $status)
                ->whereBetween('requests.created_at', [$dateFrom, $dateTo])
                ->join('users', 'users.id', '=', 'requests.user')
                ->select('requests.*', 'users.name as username', 'users.image as user_image')
                ->orderBy('id', 'DESC')
                ->paginate(5);
                return view('admin.income_requests.index', compact('requests'));

            }

        }else{
            $requests = ModelsRequest::where('status', $status)
            ->join('users', 'users.id', '=', 'requests.user')
            ->select('requests.*', 'users.name as username', 'users.image as user_image')
            ->orderBy('id', 'DESC')
            ->paginate(5);
            return view('admin.income_requests.index', compact('requests'));
        }
    }





    public function show($id)
    {

        ModelsRequest::where('requests.id', $id)->update([
            'seen' => 1
        ]);

        $request = ModelsRequest::where('requests.id', $id)
            ->join('users', 'users.id', '=', 'requests.user')
            ->select('requests.*', 'users.id as user_id','users.name as username', 'users.image as user_image')->first();


        return view('admin.income_requests.show', compact('request',));
    }


    public function showAjax($id)
    {



        $request = ModelsRequest::where('requests.id', $id)
            ->join('users', 'users.id', '=', 'requests.user')
            ->select('requests.*', 'users.id as user_id','users.name as username', 'users.image as user_image')->first();


        return $request;
    }

    public function acceptRequest($id)
    {
        ModelsRequest::where('requests.id', $id)->update([
            'seen' => 1,
            'status' => 1
        ]);

        $request = ModelsRequest::where('requests.id', $id)
            ->join('users', 'users.id', '=', 'requests.user')
            ->select('requests.*', 'users.id as user_id','users.name as username', 'users.image as user_image')->first();


        return view('admin.income_requests.show', compact('request',));
    }
    public function rejectRequest($id)
    {
        ModelsRequest::where('requests.id', $id)->update([
            'seen' => 1,
            'status' => 2
        ]);

        $request = ModelsRequest::where('requests.id', $id)
            ->join('users', 'users.id', '=', 'requests.user')
            ->select('requests.*', 'users.id as user_id','users.name as username', 'users.image as user_image')->first();


        return view('admin.income_requests.show', compact('request',));
    }

    public function getRequestsByStatus($status)
    {

        $requests = ModelsRequest::where('status', $status)
        ->join('users', 'users.id', '=', 'requests.user')
            ->select('requests.*', 'users.name as username', 'users.image as user_image')
            ->orderBy('id', 'DESC')
            ->paginate(5);
        return view('admin.income_requests.index', compact('requests'));
    }

}
