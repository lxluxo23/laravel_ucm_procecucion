@extends('layouts.landing')

<div class="contenedordeinicio">
    <div class="fondoblancotransp"></div>
        <div class="FondoContenedorDetalleEspacio">

            <div class="container-fluid">
                <div class="row">
                   
                    <div class="col-md-12 order-md-1">
                
                        @if(session('mensaje'))
                    
                            <div class="alert alert-success" onclick="window.close()"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                <strong>!</strong>
                                {{ session('mensaje') }}
                            </div>
                    
                        @endif
                        <h4 class="mb-3">Características del espacio</h4>
                        <!--<form action ="{{ route('crear_espacio') }}" method="POST" accept-charset="UTF-8" enctype="multipart/form-data"> -->
                            @csrf
                            <div class="row">         
                                <div class="col-md-6 mb-6">
                                    <label for="Capacidad">Capacidad</label>
                                    <input type="number" class="form-control" id="capacidad" name="capacidad" placeholder="" required>

                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="precio">Precio</label>
                                    <input type="number" class="form-control" id="precio" name="precio" placeholder="" value="" required>
                                    <div class="invalid-feedback">
                                        Ingrese precio
                                    </div>
                                </div>
                        
                                <div class="col-md-6 mb-4">
                                    <label for="descripcion">Descripcion<span class="text-muted"></span></label>
                                    <textarea class="form-control" id="descripcion" name="descripcion" rows="5"></textarea>
                                </div>
                        
                                
                                <div class="col-md-6 mb-4">
                                    <label class="col-md-4 control-label">Nuevo Archivo</label>
                                    <div class="col-md-6">
                                        <input type="file" class="form-control" name="file" >
                                    </div>
                                
                                <hr class="mb-4">
                                <button class="btn btn-primary btn-lg btn-block" type="submit">Guardar</button>
                                </div>
                            </div>
                        <!-- </form> -->
                    </div>
                    
                </div>
            </div>



        </div>   
</div>