@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            {{ __('Te has logueado correctamente!') }}
            <br><br>
           <div class="card">
                <div class="card-header">{{ __('Crear post') }}</div>
            
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <form method="GET" action="{{ route('posts.store') }}">
                        @csrf
                        <label>Titulo</label><br>
                        <input type="text" id="titulo" name="titulo" style="width: 350px" required><br><br>
                        <textarea id="contents" name="contents" cols="40" rows="5"></textarea><br><br>
                        <input class="btn btn-primary" type="submit" value="Post">
                    </form>


                </div>
            </div>
        </div>
    </div>
    <br><br>
    <div class="p-2">
        
        @foreach ($posts as $post)    

        <div>
            <h3>Title: {{$post->title}}</h3>
            {{$post->contents}}  
        </div>
        <br>

        {{-- usuario solo puede editar/borrar su contenido --}}
        @if (Auth::user()->id==$post->user_id) 
            
        <form method="POST" action="{{route('posts.destroy', $post)}}">
            @csrf
            @method('DELETE')
            <input class="btn btn-danger" type="submit" style="margin:0px 2px 2px 0px" value="Delete">
       </form>

       <form method="POST" action="{{route('posts.edit', $post)}}">
        @csrf
        <input class="btn btn-primary" type="submit" style="margin:0px 2px 2px 0px" value="Edit">
   </form>
        @endif
        <br><h2><a>
             
        </a><br></h2>
        @endforeach
    
    </div>
</div>
@endsection
