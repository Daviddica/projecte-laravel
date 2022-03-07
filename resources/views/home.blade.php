@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            {{ __('You are logged in!') }}
            <br><br>
           <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>
            
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
        <br><h2><a>
             
        </a><br></h2>
        @endforeach
    
    </div>
</div>
@endsection
