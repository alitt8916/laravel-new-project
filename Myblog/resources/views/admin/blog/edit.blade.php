@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-3">
            <div class="card">
                <div class="card-header">
                    home page setting
                </div>
                <div class="card-body">
                    <ul>
                        <li><a href="{{ route('home') }}">dashboard</a></li>
                        <li>
                            <a href="{{ route('home-page.index') }}">home section setting</a>
                        </li>
                    
                        <li>
                            <a href="">skill section setting</a>
                        </li>
                    
                        <li>
                            <a href="">blogs section setting</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-md-9">
            <div class="card">
                <div class="card-header">BLOG setting constracture </div>

                <div class="card-body">
                    <form action="{{ route('blog.update' , $blog->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        <div class="form-group mt-3">
                            <label for="">title</label>
                            <input type="text" value="{{ $blog->title }}"  name="title" class="form-control">
                            @error('title')

                                <div class="alert alert-danger">{{ $message }}</div>
                                
                            @enderror
                        </div>
                     
                        <div class="form-group mt-3">
                            <label for="">text</label>
                            <textarea type="text" value="{{ $blog->description }}"  name="description" class="form-control">"{{ $blog->description }}"</textarea>
                        </div>
                      
                        <div class="form-group mt-3">
                            <label for="">image</label>
                            <input type="file"  name="image" class="form-control">
                            <p><img src="{{ asset('admin/images/blog/'.$blog->image) }}" width="120" alt=""></p>
                            
                        </div>
                        <div class="form-group mt-3">
                            <button type="submit" class="btn btn-success px-5">submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
