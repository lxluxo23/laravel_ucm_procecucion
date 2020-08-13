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
                        @endforeach
                        <br>
                        <h4 class="mb-3" style="font-size: 1.5rem">Características de {{$item->nombre_cat}}</h4>
                        <br>
                            
                            <div class="row">    
                                
                                        
                                    <div class="col-md-6">
                                        <img src="../images/{{$item->url_img}}" alt="" class="imagenDeTVenta">
                                        <label id="capsulatemp" style="text-align: center; font-size: 1.5rem"></label>
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
                                        <button class="btn btn-success btn-lg btn-block" disabled="true" type="submit" data-toggle="modal" data-target="#exampleModal" id="boton_arriendo">Arrendar espacio</button>
                                       
                                        
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
                                                    <h4 style="margin-bottom: 2em">Verifique los datos de la compra de arriendo</h4>
                                                
                                                    <!-- Formulario Modal -->
                                                    <form >
                                                        <div class="container-fluid">
                                                            <div class="col-md-12 order-md-1">
                                                                <div class="row">

                                                                    <div class="col-md-6">
                                                                        <img style="width: 90%" src="../images/{{$item->url_img}}" alt="" class="imagenDeTVenta">
                                                                        <h6>{{$item->descripcion}}.</h6>
                                                                    </div>                                                             
                                                                    <div class="col-md-6">
                                                                        
                                                                        <h2>{{$item->nombre_cat}}</h2><h6>Capacidad: {{$item->capacidad}} personas.</h6>
                                                                        <br>
                                                                        <h4>Numero de Sala: {{$item->id_espacio_trabajo}}.</h4>
                                                                        <br>
                                                                        <h5 style="color:red">El número de sala es importante guardarlo ya que será el número con el que
                                                                        se identifique la sala que arrendará a continuación. </h5>

                                                                        <h6 id="rango_f"></h6>
                                                                        
                                                                        <br>
                                                                        <div style="margin-top:60px; margin-left:140px; border-radius: 10px; border: 1px solid #2a2a2a">
                                                                        <h6 style="margin-top:20px; margin-left:20px; text-aling:right;">Precio x dia: ${{$item->precio}}</h6>
                                                                        <br>
                                                                        <h6 style="margin-left:20px;" id="DiasSolici"></h6>
                                                                        <br>
                                                                        <h5 style="margin-left:20px; margin-bottom:20px;" id="TotalPago"></h5>

                                                                        </div>
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
                    </div>
                    
                </div>
            </div>
        </div>
</div>

                
<script>
 
    var cant_dias;

    function validar_horario(){
        document.getElementById('boton_arriendo').disabled = false;
        document.getElementById("capsulatemp").innerHTML = ""
        fetch(`../white?texto0=+{{$item->id_espacio_trabajo}}+&texto1=${document.getElementById("fini").value}&texto2=${document.getElementById("ffin").value}`,{method:'get'})
        
        .then(response => response.text() )
        .then(html => {
        document.getElementById("capsulatemp").innerHTML += html

        fecha_ini_res = document.getElementById("capsulatemp").textContent;

        var fecha_ini_resfini = new Date (document.getElementById("fini").value);
        var fecha_ini_resffin = new Date (document.getElementById("ffin").value);

        var milisegDia = 24*60*60*1000;
        var milisegTrans= Math.abs(fecha_ini_resfini.getTime()- fecha_ini_resffin.getTime());
        var diasTrans = Math.round(milisegTrans/milisegDia);
        diasTrans = diasTrans+1;
        cant_dias=diasTrans;
                    
        var TuFecha = new Date(fecha_ini_res);
        TuFecha.setDate(TuFecha.getDate() + diasTrans);
                    
        var dd = TuFecha.getDate();
        var mm = (TuFecha.getMonth() + 1);
        var yyyy = TuFecha.getFullYear();

        if(dd>31){
            dd='1'
            mm=mm+1
        }

        if(mm>12){
            yyyy=yyyy+1
        }

        if(dd<10) {
            dd='0'+dd;
        } 

        if(mm<10){
            mm='0'+mm;
        } 

        var fecha_fin_res = yyyy + '-' + mm + '-' + dd;
                  
        if(fecha_ini_res == document.getElementById("fini").value){
            document.getElementById('boton_arriendo').disabled = false;  
            document.getElementById('fini').style="background: default"
            document.getElementById('ffin').style="background: default"  
            document.getElementById("capsulatemp").innerHTML = ""           
        }else{
            $("#ffin").val("");
            $("#fini").val("");
            
            document.getElementById('fini').style="background: #fbb9afcc"
            document.getElementById('ffin').style="background: #fbb9afcc"
            document.getElementById("capsulatemp").textContent = "Fecha no disponible, la más próxima a la consultada seria desde "+fecha_ini_res+" hasta el "+fecha_fin_res+" ";
            document.getElementById('boton_arriendo').disabled = true;
        }                           
        })  

    }


    window.addEventListener("load",function(){
        var fecha_ini_res;
        var now = new Date();
        var day = ("0" + now.getDate()).slice(-2);
        var month = ("0" + (now.getMonth() + 1)).slice(-2);
        var today = now.getFullYear()+"-"+(month)+"-"+(day) ;
        $("#fini").val(today);
  
        document.getElementById("fini").addEventListener("change",function(){
            if (today>(document.getElementById('fini').value) || (document.getElementById('ffin').value) && (document.getElementById('fini').value)>(document.getElementById('ffin').value)){
                $("#fini").val("");
                
                alert("La fecha no puede ser menor a la de hoy o mayor a la fecha final, vuelva a ingresar")
                document.getElementById('boton_arriendo').disabled = true;
            };

            if((document.getElementById('ffin').value) && (document.getElementById('fini').value)){
                validar_horario();
            };

        })

        document.getElementById("ffin").addEventListener("change",function(){
                
            if ((document.getElementById('fini').value)>(document.getElementById('ffin').value)){
                $("#ffin").val("");
                alert("La fecha no puede ser menor a la inicial, vuelva a ingresar")
                document.getElementById('boton_arriendo').disabled = true;          
            };

            if((document.getElementById('ffin').value) && (document.getElementById('fini').value)){
                validar_horario()  
            }
            })

        document.getElementById("boton_arriendo").addEventListener("click",function(){
            document.getElementById("rango_f").textContent= 'Desde '+document.getElementById("fini").value+ ' Hasta ' +document.getElementById("ffin").value;
            document.getElementById("DiasSolici").textContent = 'Días solicitados: '+ cant_dias;
            document.getElementById("TotalPago").textContent = 'Total: $'+ (cant_dias)*({{$item->precio}});
            
            
        })
        

    })


</script>