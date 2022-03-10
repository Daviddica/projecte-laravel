@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        
    </div>
    <br><br>
    <div class="p-2">
        
        <form method="POST" action="{{route('posts.update', $post->id)}}">
            @csrf
            @method('PUT')

            Titulo <input name="title" type="text" class="form-control"><br>
            Contenido <input name="contents" type="text" class="form-control"><br>

            <input class="btn btn-primary" type="submit" style="margin:0px 2px 2px 0px" value="Save">
            <a href="{{ route('home') }}" class="btn btn-danger" type="submit" style="margin:0px 2px 2px 0px">Cancel</a>
       </form>



        <br><h2><a>
             
        </a><br></h2>
    
    </div>
</div>
@endsection
