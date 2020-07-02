@extends('layouts.app')
@section('title','Post')

@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- DataTales Example -->
    <div class="card shadow mb-4 mt-5">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Post</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Title</th>
                            <th>Image</th>
                            <th>Publish</th>
                        </tr>
                    </thead>
                    <tbody>
                            <tr>
                                <td>{{$post->title}}</td>
                                <td>{{$post->image}}</td>
                                <td>
                                    @if($post->publish == true)
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