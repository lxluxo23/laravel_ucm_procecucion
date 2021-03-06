@extends('layouts.plantillaadmin')

@section('contenidoadmin')

<div class="container-fluid">
    <br><br>
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">CLIENTES</h1>
    <p class="mb-4">Modifique o elimine seleccionando los botones a la derecha en la fila correspondiente al usuario.</p>

    @if(session('mensaje'))

      <div class="alert alert-success" onclick="window.close()"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <strong>!</strong>
        {{ session('mensaje') }}
      </div>
    @csrf

    @endif
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
      <div class="card-header py-3">
        
        <h6 class="m-0 font-weight-bold text-primary">Listado de clientes</h6>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
              <tr>
                <th>Rut</th>
                <th>Nombre</th>
                <th>Email</th>
                <th>Estado</th>
                <th>Telefono</th>
                <th></th>
              </tr>
            </thead>
            <tbody>
              @foreach($hr as $item)
              <tr>
                <td>{{$item->rut}}</td>
                <td>{{$item->nombre}}</td> 
                <td>{{$item->email}}</td>
                <td>{{$item->estado}}</td>
                <td>{{$item->telefono}}</td>
                <td><a href='{{('modificar_usuario/')}}{{$item->rut}}'><img id='img_tab_edit' src='images/edit.jpg' width="50"/></a> 
                    <a href='{{('eliminar_usuario/')}}{{$item->rut}}' class="bot" onclick="if(!confirm('¿Deseas realmente borrar este USUARIO ?'))return false"><img id='img_tab_delete' src='images/elim.jpg' width="50"/></a>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>

  </div>

@endsection