@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-3">
            <div class="card">
                <div class="card-header">
                    skill page setting
                </div>
                <div class="card-body">
                    <ul>
                        <li><a href="{{ route('home') }}">dashboard</a></li>
                        <li>
                            <a href="{{ route('home-page.index') }}">home section setting</a>
                        </li>
                    
                        <li>
                            <a href="{{ route('skill.index') }}">skill section setting</a>
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
                <div class="card-header">skill setting constracture </div>

                <div class="card-body">
                    <form action="{{ route('skill.update' , $skill->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        <div class="form-group mt-3">
                            <label for="">skill precentage</label>
                            <input type="text" value="{{ $skill->precentage }}"  name="precentage" class="form-control">
                            @error('precentage')

                                <div class="alert alert-danger">{{ $message }}</div>
                                
                            @enderror
                        </div>
                        
                       
                        <div class="form-group mt-3">
                            <label for="">skill title</label>
                            <input type="text" value="{{ $skill->title }}"  name="title" class="form-control">
                            @error('title')

                            <div class="alert alert-danger">{{ $message }}</div>
                            
                           @enderror
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
