@extends('layouts.plantillaadmin')

@section('contenidoadmin')
<div class="container-fluid">
<div class="row">
   
    <div class="col-md-12 order-md-1">

      @if(session('mensaje'))

      <div class="alert alert-success" onclick="window.close()"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <strong>!</strong>
          {{ session('mensaje') }}
      </div>
      @csrf
    @endif
    @foreach($id_espacio_m as $item)
    <h1>hola {{$item->id_modificar}}</h1>
    @endforeach
      
    
  </div>
</div>
@endsection