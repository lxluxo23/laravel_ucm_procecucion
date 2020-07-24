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
                        <!-- agregar llave <form action ="{ route('ListarDetEspacio') }}" method="POST" accept-charset="UTF-8" enctype="multipart/form-data"> -->
                            @csrf
                            <div class="row">    
                                
                                <div class="col-md-6">
                                    <img src="images/espacio1.jpg" alt="" class="imagenDeTVenta">
                                </div>
                                
                                <div class="col-md-6">
                                    <label for="descripcion">Descripcion</label>
                                    <textarea class="form-control" id="descripcion" name="descripcion" rows="5">Ideal para trabajar junto a un grupo decente de personas, el cual trae una cocina y un baño en una misma habitacion, uno al lado de otro.
                                    </textarea>
                                </div>


                                <div class="col-md-6">
                                    <label for="Capacidad">Capacidad</label>
                                    <label class="form-control" id="capacidad" name="capacidad">Este espacio tiene una capacidad hasta para 100 personas</label>
                                </div>

                                <div class="col-md-6">
                                    <label for="precio">Precio</label>
                                    <label class="form-control" id="precio" name="precio">200 pesitos x dia</label>
                                </div>
                
                                <div class="col-md-6"></div>

                                <div class="col-md-6">
                                    <button class="btn btn-success btn-lg btn-block" type="submit">Arrendar espacio</button>
                                </div>

                                
                            </div>
                        <!-- </form> -->
                    </div>
                    
                </div>
            </div>



        </div>   
</div>