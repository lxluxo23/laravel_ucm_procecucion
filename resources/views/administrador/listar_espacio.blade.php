@extends('layouts.plantillaadmin')

@section('contenidoadmin')

<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Espacios</h1>
    <p class="mb-4">En esta lista prodra seleccionar modificar y eliminar espacios de trabajo</p>

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
                <th></th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>1</td>
                <td>10</td>
                <td>Piso muy bonito</td>
                <td>activo</td>

              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>

  </div>

@endsection