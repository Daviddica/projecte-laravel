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

                        <form method="POST" action="{{route('profile.update', Auth::user()->id)}}">
                                @csrf
                                @method('PUT')
            
                            <label for="username">Usuario</label><br>
                            <input type="text" id="username" name="username" style="width: 350px" value="{{Auth::user()->username}}"><br><br>
                            <label for="email">E-mail</label><br>
                            <input type="text" id="email" name="email" style="width: 350px" value="{{Auth::user()->email}}"><br><br>
                            
                            <button type="submit" class="btn btn-primary"  style="margin:0px 2px 2px 0px">Guardar</button>
                            <a class="btn btn-danger"  style="margin:0px 2px 2px 0px" href="{{route('profile')}}">Cancelar</a>
            
                        </form>
            
                    </div>
            
                </div>
            </div>
        </div>

        </div>
</div>
@endsection