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
                    <div class="card-header">{{ __('Perfil') }}</div>
                
                    <div class="card-body">

                            <label>Usuario</label><br>
                            <input type="text" id="title" name="title" style="width: 350px" value="{{Auth::user()->username}}" disabled><br><br>
                            <label>E-mail</label><br>
                            <input type="text" id="contents" name="contents" style="width: 350px" value="{{Auth::user()->email}}" disabled><br><br>
                            
                            <a class="btn btn-primary"  style="margin:0px 2px 2px 0px" href="{{route('profile.edit', Auth::user()->id)}}">Editar</a>
                            <a class="btn btn-danger"  style="margin:0px 2px 2px 0px" href="{{route('home')}}">Cancelar</a>
                            {{-- <a href="{{ route('home',$user->id)}}" class="btn btn-danger" type="submit" style="margin:0px 2px 2px 0px">Cancel</a> --}}

                    </div>
                </div>
            </div>
        </div>

        </div>
</div>
@endsection