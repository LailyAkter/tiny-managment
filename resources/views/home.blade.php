<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    </head>
    <body>
        <div class="container">
            <nav class="navbar navbar-dark bg-dark navbar navbar-expand-lg navbar-light bg-light mb-3">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarText">
                    <ul class="nav ml-auto">
                        @if (Route::has('login'))
                                @auth
                                    <li class="nav-item">
                                        <a href="{{ url('/dashboard') }}" class="nav-link">Dashboard</a>
                                    </li>
                                @else
                                    <li class="nav-item">
                                        <a href="{{ route('login') }}" class="nav-link">Login</a>
                                    </li>
                                    @if (Route::has('register'))
                                        <li class="nav-item">
                                            <a href="{{ route('register') }}" class="nav-link">Register</a>
                                        </li>
                                    @endif
                                @endauth
                        @endif
                    </ul>
                </div>
            </nav>
            
        </div>

        <div class="content">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <div class="row">
                            <div class="col-md-6">
                                @foreach($videos as $video)
                                    <div class="video">
                                        <iframe width="200" height="200" src="https://www.youtube.com" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen>
                                        </iframe>
                                        </div>
                                    <div class="video_heading">
                                        <h2>{{$video->video_title}}</h2>
                                    </div>
                                @endforeach
                            </div>
                            @foreach($videos as $video)
                                @if($video->publish == 'true')
                                    <div class="col-md-3">
                                        <div class="video">
                                            <iframe width="100" height="100" src="https://www.youtube.com" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen>
                                            </iframe>
                                        </div>
                                        <div class="video_heading">
                                            <h2>{{$video->video_title}}</h2>
                                            <a class="btn btn-info btn-sm" href="{{url('video/details/'.$video->id)}}">
                                                <span style='margin-left:5px'>View Details</span>
                                            </a>
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="row">
                            <div class="col-md-12">
                                <!-- @foreach($posts as $post)
                                <div class="post">
                                    <iframe width="560" height="315" src="https://www.youtube.com/embed/W6V_8WfWsVU" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen>
                                    </iframe>
                                </div>
                                <div class="post_heading">
                                    <h2>{{$post->tile}}</h2>
                                    <a href="#" class='btn btn-primary'>View Details</a>
                                </div>
                                @endforeach -->
                            </div>
                        </div>
                        <div class="row">
                            @foreach($posts as $post)
                                @if($post->publish == 'true')
                                    <div class="col-md-6">
                                        <div class="post">
                                            <img src="{{$post->image}}" alt="">
                                        </div>
                                        <div class="post_heading">
                                            <h2>{{$post->title}}</h2>
                                            <a class="btn btn-info btn-sm" href="{{url('post/details/'.$post->id)}}">
                                                <span style='margin-left:5px'>View Details</span>
                                            </a>
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
