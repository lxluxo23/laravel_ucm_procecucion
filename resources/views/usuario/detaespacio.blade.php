@extends('layouts.landing')
<link rel="stylesheet" href="../assets/landing/css/estilo.css">
@inject('validacion_fecha', 'app\Http\Controllers\Espacio_trabajoController')

<div class="contenedordeinicio" id="pr1">
    <div class="fondoblancotransp" id="pr2"> 
    </div>
        <div class="FondoContenedorDetalleEspacio" id="pr3">
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
                        <h4 class="mb-3" style="font-size: 1.5rem">Características de {{$item->nombre_cat}}</h4>
                        <br>
                            
                            <div class="row">    
                                
                                        
                                    <div class="col-md-6">
                                        <img src="../images/{{$item->url_img}}" alt="" class="imagenDeTVenta">
                                    </div>
                                    
                                    <div class="col-md-6">
                                        <label for="descripcion" style="font-size: 1.1rem"><b>Descripcion</b></label>
                                                  
                                        <label class="form-control" style="border: 1px solid  #2ba7e044; height: 6.5em; font-size: 1.1rem; overflow: auto" id="descripcion" name="descripcion" rows="5">
                                           
                                            
                                            {{$item->descripcion}}
                                        </label>
                                        <br>
                                        <label for="Capacidad" style="font-size: 1.1rem"><b>Capacidad</b></label>
                                        <label class="form-control" style="border: 1px solid  #2ba7e044; font-size: 1.1rem" id="capacidad" name="capacidad">Para {{$item->capacidad}} personas</label>
                                        <br>
                                        <label for="precio" style="font-size: 1.1rem"><b>Precio</b></label>
                                        <label class="form-control" style="border: 1px solid  #2ba7e044; font-size: 1.1rem" id="precio" name="precio">${{$item->precio}} x día</label>
                                        <br>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label for="fini" style="font-size: 0.9em">Elija el día que desea usar el servicio</label>                                                               
                                                <input type="date" class="form-control" id="fini" name="fini" placeholder="" required>
                            
                                            </div>

                                            <div class="col-md-6">
                                                <label for="ffin" style="font-size: 0.9em">Hasta el día (incluyéndose)</label>
                                                <input type="date" class="form-control" id="ffin" name="ffin" placeholder="" required>
                                            </div>   
                                        </div>  
                                        <br><br>
                                        <button class="btn btn-success btn-lg btn-block" type="submit" data-toggle="modal" data-target="#exampleModal">Arrendar espacio</button>
                                        
                                        <!-- Modal -->
                                        
                                        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-xl">
                                              <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Desea arrendar {{$item->nombre_cat}}?</h5>
                                                    
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <label style="margin-bottom: 2em">Porfavor complete los datos a continuación</label>
                                                
                                                    <!-- Formulario Modal -->
                                                    <form >
                                                        <div class="container-fluid">
                                                            <div class="col-md-12 order-md-1">
                                                                <div class="row">

                                                                    <div class="col-md-6">
                                                                        <img style="background-size: 1rem" src="../images/{{$item->url_img}}" alt="" class="imagenDeTVenta">
                                                                        <label>{{$item->descripcion}}</label>
                                                                    </div>                                                             
                                                                    <div class="col-md-6">
                                                                       
                                                                        <label></label>
                                                                    </div>                                                                                                                                     
                      
                                                                </div>
                                                           
                                                            </div>
                                                        </div>
                                                    </form>


                                                </div>
                                                <div class="modal-footer">
                                                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                                  <button type="button" class="btn btn-primary">Hacer compra</button>
                                                </div>
                                              </div>
                                            </div>
                                        </div>

                                    </div>
                                
                                
                            </div>
                        @endforeach
                        
                    </div>
                    
                </div>
            </div>
        </div>
</div>


<script>


    window.addEventListener("load",function(){
        var asd;
        var now = new Date();
        var day = ("0" + now.getDate()).slice(-2);
        var month = ("0" + (now.getMonth() + 1)).slice(-2);
        var today = now.getFullYear()+"-"+(month)+"-"+(day) ;
        $("#fini").val(today);
  
        document.getElementById("fini").addEventListener("change",function(){
            if (today>(document.getElementById('fini').value) || (document.getElementById('ffin').value) && (document.getElementById('fini').value)>(document.getElementById('ffin').value)){
                $("#fini").val("");
                alert("La fecha no puede ser menor a la de hoy o mayor a la fecha final, vuelva a ingresar")
            };

            if((document.getElementById('ffin').value) && (document.getElementById('fini').value)){
                alert("consultando...");
            };
        })

        document.getElementById("ffin").addEventListener("change",function(){
            
            if ((document.getElementById('fini').value)>(document.getElementById('ffin').value)){
                $("#ffin").val("");
                alert("La fecha no puede ser menor a la inicial, vuelva a ingresar")
            };


            

            if((document.getElementById('ffin').value) && (document.getElementById('fini').value)){
               
      
                asd="{{$validacion_fecha::valorprueba()}}";
                alert("La fecha libre es : "+asd);
              



            }

        })

    })
</script>