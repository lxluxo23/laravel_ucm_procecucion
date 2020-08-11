@extends('layouts.plantillalogin')

@section('content')
<div class="row">
    <div class="col-md-6 mb-3 ml-4">
        <div class="panel panel-default">
            <div class="panel-heading">
                <div class="h1 panel-title">Acceso</div>
            </div>
            <div class="panel-body">
                <form action="">
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input class="form-control" type="email" name="email" placeholder="Ingresa Email">
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input class="form-control" type="password" name="password" placeholder="Ingresa tu contraseña">
                    </div>
                </form>
            </div>
        </div>
    </div>   
</div>
    
@endsection
       