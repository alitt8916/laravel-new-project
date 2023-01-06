@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-3">
            <div class="card">
                <div class="card-header">
                    home sec edit
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
                <div class="card-header">sec seting editable </div>

                <div class="card-body">
                    <form action="{{ route('home-page.update' , $home->id) }}" method="POST" enctype="multipart/form-data">
                     
                        @method('PUT')

                        @csrf
                        <div class="form-group mt-3">
                            <label for="">title</label>
                            <input type="text" value="{{ $home->title }}" name="title" class="form-control">
                            @error('title')

                            <div class="alert alert-danger">{{ $message }}</div>
                            
                        @enderror
                        </div>
                        <div class="form-group mt-3">
                            <label for="">subject</label>
                            <input type="text" value="{{ $home->subject }}" name="subject" class="form-control">
                            @error('subject')

                            <div class="alert alert-danger">{{ $message }}</div>
                            
                        @enderror
                        </div>
                        <div class="form-group mt-3">
                            <label for="">job</label>
                            <input type="text" value="{{ $home->job }}" name="job" class="form-control">
                            @error('job')

                            <div class="alert alert-danger">{{ $message }}</div>
                            
                        @enderror
                        </div>
                        <div class="form-group mt-3">
                            <label for="">text</label>
                            <textarea type="text" name="description" class="form-control">{{ $home->description }}</textarea>
                        </div>
                        <div class="form-group mt-3">
                            <label for="">link</label>
                            <input type="text" value="{{ $home->link }}" name="link" class="form-control">
                            @error('link')

                            <div class="alert alert-danger">{{ $message }}</div>
                            
                        @enderror
                        </div>
                        <div class="form-group mt-3">
                            <label for="">image</label>
                            <input type="file" name="image" class="form-control">
                            <p><img src="{{ asset('admin/images/home/'.$home->image) }}" alt=""></p>
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
