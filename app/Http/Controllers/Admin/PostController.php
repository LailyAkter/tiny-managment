<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Post;
use Intervention\Image\Facades\Image;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Str;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::orderBy('title','asc')->get();
        return view('admin.posts.index',compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'title'=>'required|unique:posts',
            'image'=>'required',
        ]);

        // get form images
        $image = $request->file('image');
        $slug = Str::slug($request->title);

        if(isset($image)){
        // make uniqe name for image
        $currentDate = Carbon::now()->toDateString();
        $imageName = $slug.'-'.$currentDate.'-'.uniqid().'.'.$image->getClientOriginalExtension();

        // check category directory is exists
        if(!Storage::disk('public')->exists('posts')){
            Storage::disk('public')->makeDirectory('posts');
        }
        // resize image for posts and is_uploaded_file
        $posts = Image::make($image)->resize(1600,479)->stream();
        Storage::disk('public')->put('posts/'.$imageName,$posts);

        }else{
            $imageName='default.png';
        }

        $post = new Post();
        $post->title = $request->title;
        $post->slug = $slug;
        $post->image = $imageName;

        if(isset($request->publish)){
            $post->publish = true;
        }else{
            $post->publish = false;      
        }
        $post->save();

        Toastr::success('Post Saved Successfully','Success');
        return redirect()->route('post.index');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);
        $post->delete();
        Toastr::error('Post Deleted Successfully','Success');
        return redirect()->route('post.index');
    }
}
