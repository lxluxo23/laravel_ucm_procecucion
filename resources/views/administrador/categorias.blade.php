@extends('layouts.plantillaadmin')

@section('contenidoadmin')



<div class="container-fluid">
    <br><br>
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Categorias</h1>
    <p class="mb-4">Modifique o elimine seleccionando los botones a la derecha en la fila correspondiente a la categoria</p>

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
        
        <h6 class="m-0 font-weight-bold text-primary">Listado de Categorias</h6>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
              <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th></th>
              </tr>
            </thead>
            <tbody>
              @foreach($categorias as $item)
              <tr>
                <td>{{$item->id_categoria}}</td>
                <td>{{$item->nombre_cat}}</td> 
                <td><a href='{{('modificar_usuario/')}}{{$item->id_categoria}}'><img id='img_tab_edit' src='images/edit.jpg' width="50"/></a> 
                    <a href='{{('eliminar_usuario/')}}{{$item->id_categoria}}' class="bot" onclick="if(!confirm('¿Deseas realmente borrar este USUARIO ?'))return false"><img id='img_tab_delete' src='images/elim.jpg' width="50"/></a>
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