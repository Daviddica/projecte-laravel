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
                        
                        <label>Etiquetas</label><br>
                        <input type="text" id="tags" name="tags" style="width: 350px" ><br><br>

                        <input class="btn btn-primary" type="submit" value="Post">  
                    </form>
                    <br>

                </div>
            </div>
        </div>
    </div>
    <br><br>
    <div class="p-2">
        
        @foreach ($posts as $post)   

        {{-- Creador del post --}}
        <?php
        $users = $post->user()->get();
        ?>
        @foreach($users as $usuario)
                    <p>Post creado por <b>{{$usuario->username}}</b></p>
        @endforeach    
        <hr>
        <div>
            <h3>Title: {{$post->title}}</h3>
            {{$post->contents}}  
        </div>
        <br>

        {{-- mostrar tags --}}
        @foreach($post->tags()->get() as $tag)
        
        <input class="btn btn-primary" style="margin-bottom:10px; background-color:" type="button" value="{{$tag->tag}}">  

        @endforeach

        <br>

        {{-- crear posts html --}}
        <form method="POST" action="{{route('comments.store', $post->id)}}">
        @csrf
        <input type="text" name="comment" id="comment" required minlength="1" size="50"> <input class="btn btn-primary" type="submit" style="margin:0px 0px 0px 15px" value="Comentar">
        </form>

        {{-- mostrar comentarios --}}
        <br>
        <b><h4>Comentarios</h4></b>
        
        @foreach ($post->comments()->get() as $comment)
        
        
        @foreach($users as $usuario)
        <b>{{$usuario->username}}:</b>
        @endforeach

        {{$comment->comment}}<br>
        @endforeach


        {{-- usuario solo puede editar/borrar su contenido --}}
        @if (Auth::user()->id==$post->user_id) 

        <br>
        <div style="display: flex; flex-direction: row; padding: 0px 0px 0px 900px ">
        <form method="GET" action="{{route('posts.edit', $post)}}">
            @csrf
            <input class="btn btn-primary" type="submit" style="margin:0px 2px 5px 2px" value="Edit">
        </form>
        
        <form method="POST" action="{{route('posts.destroy', $post)}}">
            @csrf
            @method('DELETE')
            <input class="btn btn-danger" type="submit" style="margin:0px 2px 5px 2px" value="Delete">
        </form>
        </div>
        {{-- admin puede eliminar posts --}}
        <hr>
        {{-- boton editar --}}
        @elseif (Auth::user()->id==$post->user_id && Auth::user()->role_id!=1)

        {{-- boton eliminar --}}
        <br>
        <div style="display: flex; flex-direction: row; padding: 0px 0px 0px 900px ">
        <form method="POST" action="{{route('posts.destroy', $post)}}">
            @csrf
            @method('DELETE')
            <input class="btn btn-danger" type="submit" style="margin:0px 2px 5px 2px" value="Delete">
        </form>
        </div>
        @elseif (Auth::user()->role_id==1)

        {{-- boton eliminar --}}
        <br>
        <div style="display: flex; flex-direction: row; padding: 0px 0px 0px 950px ">
        <form method="POST" action="{{route('posts.destroy', $post)}}">
            @csrf
            @method('DELETE')
            <input class="btn btn-danger" type="submit" style="margin:0px 2px 5px 2px" value="Delete">
        </form>
        </div>
        <hr>
                

        {{-- <br>
       <form method="GET" action="{{route('posts.edit', $post)}}">
        @csrf
        <input class="btn btn-primary" type="submit" style="margin:0px 2px 5px 2px" value="Edit">
       </form>

       <form method="POST" action="{{route('posts.destroy', $post)}}">
        @csrf
        @method('DELETE')
        <input class="btn btn-danger" type="submit" style="margin:0px 2px 5px 2px" value="Delete">
        </form> --}}
        
        @endif
        <br><h2><a>
             
        </a><br></h2>
        @endforeach
    
    </div>
</div>
@endsection
