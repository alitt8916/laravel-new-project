@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-3">
            <div class="card">
                <div class="card-header">
                    ABOUT page setting
                </div>
                <div class="card-body">
                    <ul>
                        <li><a href="{{ route('home') }}">dashboard</a></li>
                        <li>
                            <a href="{{ route('home-page.index') }}">home section setting</a>
                        </li>
                    
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
                <div class="card-header">hi guys about </div>

                <div class="card-body">
                    <h1>A Fancy Table</h1>

                    <table id="customers">
                      <tr>
                        <th>title</th>
                        <th>description</th>
                        <th>link</th>
                        <th>edit</th>
                        <th>remove</th>
                      </tr>
                      @foreach($about as $item)
                      <tr>
                        <td>{{ $item->title }}</td>
                        <td>{{ $item->description }}</td>
                        <td>{{ $item->link }}</td>
                        <td><a href="{{ route('skill.destroy' , ['id'=>$item->id]) }}">edit</a></td>
                        <td>
                            <a href="" onclick="destroyUser(event , {{ $item->id }})" >delete</a>
                            <form action="{{ route('about.destroy' , $item->id) }}" id="userdelete-{{ $item->id }}" method="POST">
                                @csrf
                                @method('delete')

                            </form>
                        </td>
                      </tr>
                        
                      @endforeach
                    </table>

                    <a href="{{ route('about.create') }}" class="btn btn-success px-4 mt-3">about sec setting</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


@section('js')


    <script>
        function destroyUser(event,$id) {
        event.preventDefault();
        document.querySelector('#userdelete-'+$id).submit();
        
    }
    </script>





@endsection