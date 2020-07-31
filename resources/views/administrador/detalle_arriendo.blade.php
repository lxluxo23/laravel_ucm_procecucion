@extends('layouts.plantillaadmin')

@section('contenidoadmin')

<div class="modal-body">
    @foreach ($detalle_esp as $item)
    <label style="margin-bottom: 2em">{{$item->nombre_cat}}</label>

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
                    </div>
                </div>
           
            </div>
        </div>
        
    </form>

    @endforeach
</div>

@endsection