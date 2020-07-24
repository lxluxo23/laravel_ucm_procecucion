@extends('layouts.plantillaadmin')

@section('contenidoadmin')

<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Espacios de trabajo</h1>
    <p class="mb-4">Modifique o elimine seleccionando los botones a la derecha en la fila correspondiente al espacio de trabajo.</p>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
      <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Listado de Espacios</h6>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
              <tr>
                <th>ID</th>
                <th>Capacidad</th>
                <th>Descripcion</th>
                <th>Estado</th>
                <th>precio</th>
                <th>Imagen</th>
                <th></th>
              </tr>
            </thead>
            <tbody>
              @foreach($espacios as $item)
              <tr>
                <td>{{$item->ID_espacio_trabajo}}</td>
                <td>{{$item->Capacidad}}</td>
                <td>{{$item->Descripcion}}</td>
                <td>{{$item->Estado}}</td>
                <td>{{$item->precio}}</td>
                <td><IMG SRC="images/{{$item->url_img}}" width="80" height="80"></td>
                <td><a href='{{('modificarespacio/')}}{{$item->ID_espacio_trabajo}}'><img id='img_tab_edit' src='images/edit.jpg' width="50"/></a> 
                    <a href='delete.php?id=".$row["0"]."'><img id='img_tab_delete' src='images/elim.jpg' width="50"/></a>
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