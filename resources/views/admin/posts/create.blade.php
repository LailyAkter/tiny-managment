@extends('layouts.backend.master')
@section('title','Create Post')

@section('content')
    <section class="content">
        <div class="row justify-content-center">
            <div class="col-md-8 mt-3">
                <div class="card border-left-success">
                    <div class="card-header">
                        <h3 class="card-title">Add New Post</h3>
                    </div>
                    <div class="card-body">
            
                        <form action="{{route('post.store')}}" method='post'>
                        @csrf
                            <div class="form-group">
                                <label for="inputName">Title</label>
                                <input 
                                    type="text" 
                                    class="form-control @error('title') is-invalid @enderror" 
                                    name='title'
                                    placeholder='Enter Your Title'
                                    value="{{old('title')}}"
                                />
                                @if($errors->has('title'))
                                    <span class='invalid-feedback'>Title is Required</span>
                                @endif
                            </div>

                        
                            <div class="form-group">
                                <label for="inputName">Feature Image</label>
                                <input 
                                    type="file" 
                                    id="inputName" 
                                    class="form-control @error('image') is-invalid @enderror" 
                                    name='image'
                                    placeholder='Feature Image'
                                />
                                @if($errors->has('image'))
                                    <span class='invalid-feedback'>Image is Required</span>
                                @endif
                            </div>

                            <div class="form-group">
                                <input 
                                    type="checkbox" 
                                    name='publish'
                                    value='1'
                                />
                                <label>Publish</label>
                            </div>


                            <button type='submit' class='btn btn-success'>Create</button>
                            <a href="{{route('post.index')}}" class='btn btn-danger'>Back</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection