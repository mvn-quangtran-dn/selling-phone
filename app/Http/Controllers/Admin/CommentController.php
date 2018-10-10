<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Comment;

class CommentController extends Controller
{
    public function index()
    {
    	$comments = Comment::paginate(3);
    	return view('admin.comments.index', compact('comments'));
    }

    public function approve($id)
    {
    	DB::table('comments')
			->where("comments.id", '=',  $id)
			// dd(DB::table('comments')
			// ->where("comments.id", '=',  $id)->first());
			->update(['comments.active'=> 1]);
		return redirect()->route('comments.index');
    }	

    public function remove($id)
    {
    	DB::table('comments')
			->where("comments.id", '=',  $id)
			// dd(DB::table('comments')
			// ->where("comments.id", '=',  $id)->first());
			->update(['comments.active'=> 2]);
		return redirect()->route('comments.index');
    }	

    public function show($id)
    {
    	$comment = Comment::find($id);
    	return view('admin.comments.detail', compact('comment'));
    }	

    public function search(Request $request)
    {
        if ($request->ajax()) {

            $output = "";

            $comments = DB::table('comments')->where('name', 'LIKE', '%'.$request->search."%")->get();
            echo json_encode($comments);
        }
    }
}
