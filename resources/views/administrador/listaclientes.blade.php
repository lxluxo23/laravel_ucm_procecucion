@extends('layouts.plantillaadmin')

@section('contenidoadmin')

<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">CLIENTES</h1>
    <p class="mb-4">podra selleccionar el cliente que desaea modificar o eliminar.</p>

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
                <th>Telefono</th>
                <th>LOS BOTONES</th>
              </tr>
            </thead>
            <tbody>
              @foreach($hr as $item)
              <tr>
                <td>{{$item->Rut}}</td>
                <td>{{$item->Nombre}}</td>
                <td>{{$item->Email}}</td>
                <td>{{$item->Telefono_1}}</td>
                <td>LOS BOTONES</td>
              </tr>
              @endforeach


          

            </tbody>
          </table>
        </div>
      </div>
    </div>

  </div>

@endsection