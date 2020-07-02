<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Video;
use App\Post;

class HomeController extends Controller
{
    public function index(){
        $posts= Post::latest()->get();
        $videos = Video::latest()->get();
        return view('home',compact('videos','posts'));
    }

    public function video_show($id){
        $video = Video::find($id);
        return view('videoShow',compact('video'));
    }

    public function post_show($id){
        $post = Post::find($id);
        return view('postShow',compact('post'));
    }
}
