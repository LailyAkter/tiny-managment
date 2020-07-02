@extends('layouts.backend.master')
@section('title','Dashboard')

@section('content')

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
    </div>

    <!-- Content Row -->
    <div class="row">

        <!-- Post Card Example -->
        <div class="col-xl-6 col-md-6 mb-6">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                Post
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{$post->count()}}</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Video Card  -->
        <div class="col-xl-6 col-md-6 mb-6">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                Video
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{$video->count()}}</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div>

</div>

@endsection

