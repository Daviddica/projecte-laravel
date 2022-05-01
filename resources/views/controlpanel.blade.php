@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        
    </div>
    <br><br>
    <div class="p-2">

        <div class="row justify-content-center">
            <div class="col-md-8">
               <div class="card">
                    <div class="card-header">{{ __('Panel de control admin') }}</div>
                
                    <div class="card-body">

                        {{-- Mostrar todos los usuarios --}}
                        @foreach ($users as $user)

                        <br>
                        <form method="POST" action="{{route('controlpanel.update', $user->id)}}">
                            @csrf
                            @method('PUT')

                            <label>Usuario</label><br>
                            <input type="text" id="title" name="title" style="width: 350px" value="{{$user->username}}" disabled><br><br>
                            <label>E-mail</label><br>
                            <input type="text" id="contents" name="contents" style="width: 350px" value="{{$user->email}}" disabled><br><br>
                            
                            {{-- <form method="GET" action="{{route('users.edit', $users)}}"></form>--}}
                                <input class="btn btn-primary" type="submit" style="margin:0px 2px 2px 0px" value="Editar">

                            {{-- <form method="POST" action="{{route('users.destroy', $users)}}"></form> --}}
                                <input class="btn btn-danger" type="submit" style="margin:0px 2px 2px 0px" value="Delete">

                            {{-- <a href="{{ route('home',$user->id)}}" class="btn btn-danger" type="submit" style="margin:0px 2px 2px 0px">Cancel</a> --}}
                        </form>

                        @endforeach

                    </div>
                </div>
            </div>
        </div>

        <br><h2><a>
             
        </a><br></h2>
    
    </div>
</div>
@endsection