@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-3">
            <div class="card">
                <div class="card-header">
                    org page setting
                </div>
                <div class="card-body">
                    <ul>
                        <li><a href="{{ route('home') }}">dashboard</a></li>

                        <li><a href="{{ route('home-page.index') }}">home section setting</a></li>
                    
                        <li>
                            <a href="{{ route('about.index') }}">about section setting</a>
                        </li>
                        <li>
                            <a href="{{ route('skill.index') }}">skill section setting</a>
                        </li>
                    
                        <li>
                            <a href="{{ route('blog.index') }}">blogs section setting</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-md-9">
            <div class="card">
                <div class="card-header">hi guys </div>

                <div class="card-body">
                    <<--to change setting go to right
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
