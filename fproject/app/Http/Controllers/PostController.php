<?php

namespace App\Http\Controllers;
use App\Http\Requests\StorePostRequest;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
class PostController extends Controller
{
    public function view($id)
    {
         $post=Post::find($id);
        return view('view', ["post" => $post]);
    }

    public function index()
    {
        
        $posts=Post::paginate(5);
        $users=User::all();
        
        return view('posts', ["posts" => $posts]);
    }

    public function edit($id)
    {
        $post=Post::find($id);

        return view('edit', ["post" => $post]);
    }

    public function update(Request $request,$id)
    {
        $request->validate([
            "title"=>["required","max:255","unique:posts","min:2"],
            "body"=>"required"
        ]);

       
        $posts= Post::find($id);

        
        $posts->update([
            'title' => $request->input('title'),
            'body' => $request->input('body')
            
        ]);
        return redirect('/posts');
    }

    public function destroy($id)
    {
        Post::destroy($id);
        return redirect('/posts');
    }

    public function create()
    {
        return view('create');
    }

    public function store(StorePostRequest $request)
    {
        
        $data=$request->all();
        $post= new Post;
        $post->title=$data['title'];
        $post->body=$data['body'];
        $post->user_id=Auth::id();
        $post->save();
        return redirect('/posts');




    }
    public function hello()
    {
       echo"Hello This My First Laravel Project ";
    }
}