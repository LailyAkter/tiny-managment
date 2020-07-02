@extends('layouts.app')
@section('title','Video')

@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- DataTales Example -->
    <div class="card shadow mb-4 mt-5">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Video</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Video Title</th>
                            <th>Video LInk</th>
                            <th>Body</th>
                            <th>Publish</th>
                        </tr>
                    </thead>
                    <tbody>
                            <tr>
                                <td>{{$video->video_title}}</td>
                                <td>{{$video->video_link}}</td>
                                <td>{{$video->body}}</td>
                                <td>
                                    @if($video->publish == true)
                                        <span class='text-success'>Published</span>
                                    @else
                                        <span class='text-success'>Pending</span>
                                    @endif
                                </td>
                            </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>
@endsection