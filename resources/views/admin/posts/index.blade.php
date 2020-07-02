@extends('layouts.backend.master')
@section('title','Post')

@section('css')
<!-- Custom styles for this page -->
<link href="{{asset('backend/vendor/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">
@endsection

@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">
        <a href="{{route('post.create')}}" class="btn btn-primary">
            <i class="fas fa-plus">
                <span style='margin-left:5px'>Add Post</span>
            </i>
        </a>
    </h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">All Post</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>SL</th>
                            <th>Title</th>
                            <th>Share Options</th>
                            <th>Publish</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>SL</th>
                            <th>Title</th>
                            <th>Image</th>
                            <th>Publish</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach($posts as $key=>$post)
                            <tr>
                                <td>{{$key+1}}</td>
                                <td>{{$post->title}}</td>
                                <td>{{$post->image}}</td>
                                <td>
                                    @if($post->publish == true)
                                        <span class='text-success'>Published</span>
                                    @else
                                        <span class='text-success'>Pending</span>
                                    @endif
                                </td>
            
                                <td style='float:left'>
                                    <form action="{{route('post.destroy',$post->id)}}" method='POST'>
                                        @csrf
                                        @method('DELETE')
                                        <button type='submit' class="btn btn-danger btn-sm">
                                            <i class="fas fa-trash"></i>
                                            <span style='margin-left:5px'>DELETE</span>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
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

@section('js')
<!-- Page level plugins -->
<script src="{{asset('backend/vendor/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('backend/vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>

<!-- Page level custom scripts -->
<script>
    // Call the dataTables jQuery plugin
$(document).ready(function () {
    $('#dataTable').DataTable({
        lengthMenu: [[5, 10, 25, 50, -1], [5, 10, 25, 50, "All"]],
        columnDefs: [{
        targets: [0],
        orderData: [0, 1]
        }, {
        targets: [1],
        orderData: [1, 0]
        }, {
        targets: [4],
        orderData: [4, 0]
        }]
    });
});
</script>

@endsection