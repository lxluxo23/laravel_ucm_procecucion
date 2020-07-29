@extends('layouts.landing')
<link rel="stylesheet" href="../assets/landing/css/estilo.css">
<div class="contenedordeinicio">
    <div class="fondoblancotransp">
    </div>
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
                        @csrf
                        @foreach ($dato_espacio as $item)
                        <br>
                        <h4 class="mb-3">Características de {{$item->nombre_cat}}</h4>
                        <br>
                            
                            <div class="row">    
                                
                                        
                                    <div class="col-md-6">
                                        <img src="../images/{{$item->url_img}}" alt="" class="imagenDeTVenta">
                                    </div>
                                    
                                    <div class="col-md-6">
                                        <label for="descripcion"><b>Descripcion</b></label>
                                        <label class="form-control" style="border: 1px solid  #2ba7e044; height: 6.5em" id="descripcion" name="descripcion" rows="5">{{$item->descripcion}}
                                        </label>
                                        <br>
                                        <label for="Capacidad"><b>Capacidad</b></label>
                                        <label class="form-control" style="border: 1px solid  #2ba7e044" id="capacidad" name="capacidad">Para {{$item->capacidad}} personas</label>
                                        <br>
                                        <label for="precio"><b>Precio</b></label>
                                        <label class="form-control" style="border: 1px solid  #2ba7e044" id="precio" name="precio">${{$item->precio}} x día</label>

                                    </div>
          
                                    <div class="col-md-6"></div>

                                    <div class="col-md-6">
                                  
                                        <button class="btn btn-success btn-lg btn-block" type="submit">Arrendar espacio</button>
                                    </div>
                                
                                
                            </div>
                        @endforeach
                        <!-- </form> -->
                    </div>
                    
                </div>
            </div>

  
</div>