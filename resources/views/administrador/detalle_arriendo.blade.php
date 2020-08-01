@extends('layouts.plantillaadmin')

@section('contenidoadmin')

<div class="modal-body">
    @foreach ($detalle_esp as $item)
    <label style="margin-bottom: 2em">{{$item->nombre_cat}} #{{$item->id_espacio_trabajo}}  </label>
    

    <!-- Formulario Modal -->
    <form>
        @csrf
        
        <div class="container-fluid">
            <div class="col-md-12 order-md-1">
                <div class="row">                                                                                                                            
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-6">
                                <label for="fini" style="font-size: 0.9em">Elija el día que desea usar el servicio</label>                                                               
                                <input type="date" class="form-control" id="fini" name="fini" placeholder="" required>
                            </div>

                            <div class="col-md-6">
                                <label for="fini" style="font-size: 0.9em">Hasta el día (incluyéndose)</label>
                                <input type="date" class="form-control" id="fini" name="fini" placeholder="" required>
                            </div>   
                        </div> 
                    <br>
                        <div class="row">
                            <div class="col-md-4">
                                <label for="precio">Precio</label>
                                <input type="number" value="{{$item->precio}}" class="form-control" id="precio" name="precio" placeholder="" required>
                            </div>

                            <div class="col-md-4">
                                <label for="dias">Dias</label>
                                <input type="number" value="" class="form-control" id="dias" name="dias" placeholder="" disabled>
                            </div>

                            <div class="col-md-4">
                                <label for="total">Total</label>
                                <input type="number" value="" class="form-control" id="total" name="total" placeholder="" disabled>
                            </div>
                           
                        </div>                                                            
                    </div>
                </div>
           
            </div>
        </div>
        
    </form>

    @endforeach
</div>

@endsection