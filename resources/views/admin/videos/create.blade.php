@extends('layouts.backend.master')
@section('title','Create Video')

@section('content')
    <section class="content">
        <div class="row justify-content-center">
            <div class="col-md-8 mt-3">
                <div class="card border-left-success">
                    <div class="card-header">
                        <h3 class="card-title">Add New Video</h3>
                    </div>
                    <div class="card-body">
            
                        <form action="{{route('video.store')}}" method='post'>
                        @csrf
                            <div class="form-group">
                                <label for="inputName">Video Title</label>
                                <input 
                                    type="text" 
                                    class="form-control @error('video_title') is-invalid @enderror" 
                                    name='video_title'
                                    placeholder='Enter Your Video Title'
                                    value="{{old('video_title')}}"
                                />
                                @if($errors->has('video_title'))
                                    <span class='invalid-feedback'>Video Title is Required</span>
                                @endif
                            </div>

                        
                            <div class="form-group">
                                <label for="inputName">Video Link</label>
                                <input 
                                    type="text" 
                                    id="inputName" 
                                    class="form-control" 
                                    name='video_link'
                                    placeholder='Enter Video Link'
                                    value="{{old('video_link')}}"
                                />
                                @if($errors->has('video_link'))
                                    <span class='invalid-feedback'>Video Link is Required</span>
                                @endif
                            </div>

                            <div class="form-group">
                                <label for="inputName">Body</label>
                                <textarea class="form-control" name='body' placeholder='Enter Your Video Description'>{{old('body')}}</textarea>
                                @if($errors->has('body'))
                                    <span class='invalid-feedback'>Body is Required</span>
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