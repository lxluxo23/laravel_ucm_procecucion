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

                        @if(session('error'))
                    
                            <div class="alert alert-danger" onclick="window.close()"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                <strong>!</strong>
                                {{ session('error') }}
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
                                        <img src="../images/{{$item->url_img}}" alt="" class="imagenDeTVenta" style="margin-top:10px;margin-left:20px;border-radius: 10px; width: 93%">
                                        <label id="capsulatemp" style="text-align: center; font-size: 1.5rem"></label>
                                    </div>
                                    
                                    
                                    <div class="col-md-6">
                                        <label for="descripcion" style="font-size: 1.1rem"><b>Descripción</b></label>
                                                  
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
                                                <label for="fini" style="font-size: 0.9em">Desde las 00:00 del día</label>                                                               
                                                <input type="date" class="form-control" id="fini" name="fini" placeholder="" required>
                                            </div>

                                            <div class="col-md-6">
                                                <label for="ffin" style="font-size: 0.9em">Hasta las 23:40 del día</label>
                                                <input type="date" class="form-control" id="ffin" name="ffin" placeholder="" required>
                                            </div>   
                                        </div>  
                                        <br><br>
                                        <button class="btn btn-success btn-lg btn-block" disabled="true" type="submit" data-toggle="modal" data-target="#exampleModal" id="boton_arriendo">Arrendar espacio</button>
                                       
                                        
                                        <!-- Modal -->
                                        
                                        <div class="modal fade" id="exampleModal" tabindex="-1" style="margin-top:20px ;background: rgba(9, 20, 36, 0.5)" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            
                                            <div class="modal-dialog modal-xl">
                                                
                                              <div class="modal-content">
                                                
                                                <div class="modal-header" style="z-index:90;background: #30acb8">
                                                    <h5 class="modal-title" id="exampleModalLabel" style="color: whitesmoke">Desea arrendar {{$item->nombre_cat}}?</h5>
                                                    
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div style="background: rgba(203, 227, 255, 0.295); width:48%; height:100%; position:absolute;"></div>
                                                <form method="POST" action="{{route('agregararriendo')}}" accept-charset="UTF-8" enctype="multipart/form-data">
                                                    
                                                    @csrf
                                                <div class="modal-body">
                                                    
                                                    <h4 style="margin-bottom: 2em">Verifique los datos de la compra de arriendo</h4>
                                                
                                                    <!-- Formulario Modal -->
                                                    
                                                    
                                                        <div class="container-fluid">
                                                            
                                                            <div class="col-md-12 order-md-1">
                                                                
                                                                <div class="row" >

                                                                    <div class="col-md-6">
                                                                        <img style="border-radius: 10px; width: 90%" src="../images/{{$item->url_img}}" alt="" class="imagenDeTVenta">
                                                                        <h5 style="text-align: justify; width: 90%">{{$item->descripcion}}.</h5>
                                                                    </div>                                                             
                                                                    <div class="col-md-6">
                                                                                         
                                                                        <h2 id="nombrecat" name="nombrecat">{{$item->nombre_cat}}</h2>
                                                                        <h6>Capacidad: {{$item->capacidad}} personas.</h6>
                                                                        
                                                                        <br>
                                                                        <div class="form-inline">
                                                                            <h4>Número de Sala:&emsp14;</h4>
                                                                            <input  type="text" readonly style="width:5rem; font-weight:500; line-height:1.2; margin-bottom:.5rem; text-decoration: none;border:none; font-size:1.5rem" id="idespaciotrabajo" name="idespaciotrabajo" value="{{$item->id_espacio_trabajo}}">
                                                                        </div>
                                                                        <br>
                                                                        <h5 style="color:red; text-align:justify">El número de sala es importante guardarlo ya que será el número con el que
                                                                        se identifique la sala que arrendará a continuación. </h5>
                                                                        <br>
                                                                        <div class="row">
                                                                            <div class="form-inline">
                                                                                <h6>Desde &emsp14;</h6>
                                                                                <input type="text" readonly style="width:6rem; font-weight:500; line-height:1.2; margin-bottom:.5rem; text-decoration: none;border:none; font-size:1rem" id="diainicio" name="diainicio">
                                                                                <h6>&emsp14; hasta &emsp14;</h6>
                                                                                <input type="text" readonly style="width:6rem; font-weight:500; line-height:1.2; margin-bottom:.5rem; text-decoration: none;border:none; font-size:1rem" id="diafinal" name="diafinal">
                                                                            </div>
                                                                        </div>

                                                                        <br>
                                                                        @if (session('admin')==1)
                                                                        <li class="nav-item">
                                                                          <label>Rut Titular: &emsp14;</label><input type="text" id="ruttitular" name="ruttitular">                                                            
                                                                        </li>
                                                                        @endif

                                                                        <div class="d-block my-3">
                                                                            <div class="custom-control custom-radio">
                                                                              <input id="credit" name="paymentMethod" type="radio" class="custom-control-input" checked required>
                                                                              <label class="custom-control-label" for="credit">Tarjeta crédito</label>
                                                                            </div>
                                                                            <div class="custom-control custom-radio">
                                                                              <input id="debit" name="paymentMethod" type="radio" class="custom-control-input" required>
                                                                              <label class="custom-control-label" for="debit">Tarjeta débito</label>
                                                                            </div>
                                                                            <div class="custom-control custom-radio">
                                                                              <input id="paypal" name="paymentMethod" type="radio" class="custom-control-input" required>
                                                                              <label class="custom-control-label" for="paypal">PayPal</label>
                                                                            </div>
                                                                          </div>

                                                                        <div style="background: #02ddff0c ;margin-top:60px; border-radius: 10px; border: 1px solid #2a2a2aa8">
                                                                        <h6 style="margin-top:20px; margin-left:20px; text-aling:right;">Precio x dia: ${{$item->precio}}</h6>
                                                                        <div class="form-inline" style="margin-left:20px;">
                                                                            <h6>Días solicitados:&emsp14;</h6>
                                                                            <h6 id="DiasSolici" name="DiasSolici"></h6>
                                                                        </div>
                                                                        <br>
                                                                        <div class="form-inline justify-content-end" style="margin-bottom:20px; text-align:right; margin-right:20px;">
                                                                            <h5>Total: $&emsp14;</h5>
                                                                            <input type="text" readonly style="background: #02ddff0c ; width:7rem; font-weight:500; line-height:1.2; margin-bottom:.5rem; text-decoration: none;border:none; font-size:1.5rem" id="TotalPago" name="TotalPago">
                                                                        </div>
                                                                        </div>
                                                                    </div>                                                                                                                                     
                      
                                                                </div>
                                                           
                                                            </div>
                                                        </div>
                                                    
                                                </div>
                                                <div class="modal-footer" style="width:100%;position: absolute;background: #ade5eb; z-index: 100">
                                          
                                                  <button type="submit" class="btn btn-primary">Realizar Arriendo</button>
                                                
                                                </div>
                                            </form>
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
            document.getElementById("capsulatemp").textContent = "Fecha no disponible, la más próxima a la consultada sería desde "+fecha_ini_res+" hasta el "+fecha_fin_res+" ";
            document.getElementById('boton_arriendo').disabled = true;
        }                           
        })  

    }


    window.addEventListener("load",function(){
        var logon;
        var fecha_ini_res;
        var now = new Date();
        var day = ("0" + now.getDate()).slice(-2);
        var month = ("0" + (now.getMonth() + 1)).slice(-2);
        var today = now.getFullYear()+"-"+(month)+"-"+(day) ;
        $("#fini").val(today);


        document.getElementById("boton_arriendo").addEventListener("click",function(){
            document.getElementById("ruttitular").value = "";
            
            /*logon = {{session('logueado')}};
            
            if(logon==1){
                alert("inicia3");
            }else{
                alert("no iniciad");
            }
            
            SOLO TOMA EL VALOR DE SESSION CUANDO SE ESTA LOGEADO
            CUANDO NO HAY NADIE, NO TOMA EL JS
            NO SE PODRA DEJAR SESSION COMO PREDETERMINADO EN 0 Y NO
            */
            
          
            
        })
  
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
            document.getElementById("diainicio").value= document.getElementById("fini").value;
            document.getElementById("diafinal").value= document.getElementById("ffin").value;

            
            document.getElementById("DiasSolici").textContent = cant_dias;
            document.getElementById("TotalPago").value = (cant_dias)*({{$item->precio}});
            
            
        })
        

    })


</script>