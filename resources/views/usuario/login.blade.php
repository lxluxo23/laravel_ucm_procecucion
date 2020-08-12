@extends('layouts.plantillalogin')

@section('content')
<div class="row">
    <div class="col-md-4 col-md-offset-4">
        <div class="panel panel-default">
            <div class="panel-heading">
                <div class="h1 panel-title">Acceso</div>
            </div>
            <div class="panel-body">
            <form method="POST" action="{{route('logueame')}}" >

                {{ csrf_field() }}
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input class="form-control" type="email" name="email" placeholder="Ingresa Email">
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input class="form-control" type="password" name="password" placeholder="Ingresa tu contraseña">
                    </div>
                    <button class="btn btn-primary">Acceder</button>
                </form>
            </div>
        </div>
    </div>   
</div>
    
@endsection
       