@section('css')
<link rel="stylesheet" href="{{asset('assets/vendors/choices.js/choices.min.css')}}" />
@endsection

<div>
    <div class="filtros row mb-4">
        <div class="col-md-12 col-sm-12">
            <div class="flex flex-row justify-center">
                <div class="mb-3 px-2" style="width: 85px">
                    <label class="titulo_filtros" for="" >Nª</label>
                    <select wire:model="perPage" class="form-select">
                        <option value="10">10</option>
                        <option value="25">25</option>
                        <option value="50">50</option>
                        <option value="all">Todo</option>
                    </select>
                </div>
                <div class="w-20 mb-3 px-2 flex-fill" style="width: 140px">
                    <label class="titulo_filtros" for="">Buscar</label>
                    <input wire:model.debounce.300ms="buscar" type="text" class="form-control w-100" placeholder="Escriba la palabra a buscar...">
                </div>
                <div wire:ignore  class="mb-3 px-2 flex-fill" style="width: 200px">
                    <label class="titulo_filtros" for="">Clientes</label>
                    <select wire:key="{{rand()}}" wire:model="selectedCliente" name="selectedCliente" id="selectedCliente" class="form-select choices">
                        <option value=""> Seleccione un cliente </option>
                        @foreach ($clientes as $cliente)
                            <option value="{{$cliente->id}}">{{$cliente->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3 px-2 flex-fill" style="width: 140px">
                    <label class="titulo_filtros" for="">Gestor</label>
                    <select wire:model="selectedGestor" name="selectedGestor" id="selectedGestor" class="form-select">
                        <option value=""> Gestor </option>
                        @foreach ($gestores as $gestor)
                            <option value="{{$gestor->id}}">{{$gestor->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3 px-2 flex-fill" style="width: 140px">
                    <label class="titulo_filtros"for="">Comercial</label>
                    <select wire:model="selectedComerciales" name="selectedComerciales" id="selectedComerciales" class="form-select">
                        <option value=""> Comercial </option>
                        @foreach ($comerciales as $comercial)
                            <option value="{{$comercial->id}}">{{$comercial->name}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3 px-2 flex-fill" style="width: 140px">
                    <label class="titulo_filtros" for="">Estados</label>
                    <select wire:model="selectedEstado" name="selectedEstado" id="selectedEstado" class="form-select">
                        <option value=""> Estado </option>
                        @foreach ($estados as $estado)
                            <option value="{{$estado->id}}">{{$estado->nombre}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3 px-2 flex-fill" style="width: 140px">
                    <label class="titulo_filtros" for="">Servicios</label>
                    <select wire:model="selectedServicio" name="selectedServicio" id="selectedServicio" class="form-select">
                        <option value=""> Servicio </option>
                        @foreach ($servicios as $servicio)
                            <option value="{{$servicio->id}}">{{$servicio->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3 px-2 flex-fill" style="width: 140px">
                    <label class="titulo_filtros" for="">Estado de la Factura</label>
                    <select wire:model="selectedEstadoFactura" name="selectedEstadoFactura" id="selectedEstadoFactura" class="form-select">
                        <option value=""> Estado </option>
                        @foreach ($estados_facturas as $estadofactura)
                            <option value="{{$estadofactura['id']}}">{{$estadofactura['nombre']}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3 px-2 flex-fill" style="width: 140px">
                    <label class="titulo_filtros" for="">Segmento</label>
                    <select wire:model="selectedSegmento" name="selectedSegmento" id="selectedSegmento" class="form-select">
                        <option value=""> Segmento </option>
                        @foreach ($segmentos as $segmento)
                            <option value="{{$segmento['id']}}">{{$segmento['nombre']}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-md-12 col-sm-12 text-center">
                <span class="fs-3">Sumatorio: <b>{{$Sumatorio.' €'}}</b></span>
            </div>
        </div>
    </div>
    @if ( $kitDigitals )
    <div class="table-responsive">
        <table class="table table-sm">
            <thead class="header-table">
                @foreach ([
                    'empresa' => 'EMP',
                    'segmento' => 'SEG',
                    'cliente_id' => 'CLI. A.',
                    'cliente' => 'CLIENTE',
                    'mensaje_interpretado' => 'INTERES.',
                    'mensaje' => 'IA',
                    'contacto' => 'CONTACTO',
                    'telefono' => 'TELEFONO',
                    'expediente' => 'EXPEDIENTE',
                    'contratos' => 'CONTRATOS',
                    'servicio_id' => 'SERVICIOS',
                    'estado' => 'ESTADO',
                    'fecha_actualizacion' => 'F. ACT.',
                    'importe' => 'IMPORTE',
                    'estado_factura' => 'ESTADO FACTURA',
                    'banco' => 'EN BANCO',
                    'fecha_acuerdo' => 'F. ACUERDO',
                    'plazo_maximo_entrega' => 'PLZ. MAX',
                    'gestor' => 'GESTOR',
                    'comercial_id' => 'COMERCIAL',
                    'comentario' => 'COMENTARIO',
                    'nuevo_comentario' => 'N. COMENTARIO',
                    ] as $field => $label)
                    <th class="px-3">
                        <a href="#" wire:click.prevent="sortBy('{{ $field }}')">
                            {{ $label }}
                            @if ($sortColumn == $field)
                                <span>{!! $sortDirection == 'asc' ? '&#9650;' : '&#9660;' !!}</span>
                            @endif
                        </a>
                    </th>
                @endforeach
            </thead>
            <tbody>
                @foreach ($kitDigitals as $item)
                <tr style="--bs-table-bg: {{$item->estados->color}} !important; --bs-table-color: {{$item->estados->text_color}} !important">
                    <td class="exclude" style="max-width: 50px"> <input data-id="{{$item->id}}" type="text" name="empresa" id="empresa" value="{{ $item->empresa }}" style="height: fit-content;background-color: {{$item->estados->color}}; color: {{$item->estados->text_color}}; border:none; margin-bottom: 0 !important;font-size: 0.75rem;"></td>
                    <td class="exclude" style="max-width: 30px">
                        <select name="segmento" id="segmento" style="padding: 0.1rem 0.1rem 0.1rem 0.2rem; margin-bottom: 0 !important;font-size: 0.75rem;height: fit-content; background-color: {{$item->estados->color}}; color: {{$item->estados->text_color}}; border:none;" data-id="{{$item->id}}">
                            @foreach ($segmentos as $segmento)
                                <option value="{{$segmento['id']}}">{{$segmento['nombre']}}</option>
                            @endforeach
                        </select>
                    </td>
                    <td style="width: 50px !important; ">
                        <select data-id="{{$item->id}}" name="cliente_id" id="cliente_id" style="width: 50px !important; background-color: {{$item->estados->color}}; color: {{$item->estados->text_color}};margin-bottom: 0 !important;font-size: 0.75rem;height: fit-content;padding: 0.1rem 0.1rem 0.1rem 0.2rem;">
                            <option value="">SC</option>
                            @foreach ($clientes as $cliente)
                                <option value="{{$cliente->id}}" @if($item->cliente_id == $cliente->id) selected  @endif>{{$cliente->name}}</option>
                            @endforeach
                        </select>
                    </td>
                    <td style="max-width: 70px !important"><input data-id="{{$item->id}}" type="text" name="cliente" id="cliente" value="{{ $item->cliente }}" style="height: fit-content;background-color: {{$item->estados->color}}; color: {{$item->estados->text_color}}; border:none;margin-bottom: 0 !important;font-size: 0.75rem"></td>
                    <td style="max-width: 50px"><input disabled data-id="{{$item->id}}" type="text" name="mensaje_interpretado" id="mensaje_interpretado" value="{{ $item->mensaje_interpretado == 1 ? 'Si' : ($item->mensaje_interpretado == 2 ? 'No se' : ( $item->mensaje_interpretado === 0 ? 'No' : ($item->mensaje_interpretado === 3 ? 'Error' : '' ))) }}" style="height: fit-content;background-color: {{$item->estados->color}}; color: {{$item->estados->text_color}}; border:none;margin-bottom: 0 !important;font-size: 0.75rem; text-align:center;width: 56px;"></td>
                    <td style="max-width: 50px">
                        {{-- <textarea disabled cols="30" rows="1"  style="margin-bottom: 0; width:100%;">{{ $item->mensaje }}</textarea> --}}
                        <button type="button" class="btn btn-sm btn-light edit-textarea" data-bs-toggle="modal" data-bs-target="#editModal" data-id="{{$item->id}}" data-field="mensaje" data-content="{{ $item->mensaje }}">Ver</button>

                    </td>
                    <td style="max-width: 50px"><input data-id="{{$item->id}}" type="text" name="contacto" id="contacto" value="{{ $item->contacto }}" style="height: fit-content;background-color: {{$item->estados->color}}; color: {{$item->estados->text_color}}; border:none;margin-bottom: 0 !important;font-size: 0.75rem;"></td>
                    <td style="max-width: 50px"><input data-id="{{$item->id}}" type="text" name="telefono" id="telefono" value="{{ $item->telefono }}" style="height: fit-content;background-color: {{$item->estados->color}}; color: {{$item->estados->text_color}}; border:none;margin-bottom: 0 !important;font-size: 0.75rem;"></td>
                    <td style="max-width: 50px" class="exclude"><input data-id="{{$item->id}}" type="text" name="expediente" id="expediente" value="{{ $item->expediente }}" style="height: fit-content;background-color: {{$item->estados->color}}; color: {{$item->estados->text_color}}; border:none;margin-bottom: 0 !important;font-size: 0.75rem;"></td>
                    <td style="max-width: 50px" class="exclude"><input data-id="{{$item->id}}" type="text" name="contratos" id="contratos" value="{{ $item->contratos }}" style="height: fit-content;background-color: {{$item->estados->color}}; color: {{$item->estados->text_color}}; border:none;margin-bottom: 0 !important;font-size: 0.75rem;width: 50px;text-align: center"></td>
                    <td style="max-width: 50px">
                        <select name="servicio_id" id="servicio_id" data-id="{{$item->id}}" style="background-color: {{$item->estados->color}}; color: {{$item->estados->text_color}};margin-bottom: 0 !important;font-size: 0.75rem;height: fit-content;padding: 0.1rem 0.1rem 0.1rem 0.2rem;max-width: 60px">
                            @foreach($servicios as $servicio)
                                <option @if($item->servicio_id == $servicio->id) selected  @endif value="{{$servicio->id}}">{{$servicio->name}}</option>
                            @endforeach
                        </select>
                    </td>
                    <td>
                        <select name="estado" id="estado" data-id="{{$item->id}}" style="background-color: {{$item->estados->color}}; color: {{$item->estados->text_color}};margin-bottom: 0 !important;font-size: 0.75rem;height: fit-content;padding: 0.1rem 0.1rem 0.1rem 0.2rem;max-width: 60px">
                            <option value="">Seleccione un estado</option>
                            @foreach($estados as $estado)
                                <option @if($item->estado == $estado->id) selected  @endif value="{{$estado->id}}">{{$estado->nombre}}</option>
                            @endforeach
                        </select>
                    </td>
                    <td style="max-width: 98px"><input data-id="{{$item->id}}" type="date" name="fecha_actualizacion" id="fecha_actualizacion" value="{{ $item->fecha_actualizacion }}" style="height: fit-content;background-color: {{$item->estados->color}}; color: {{$item->estados->text_color}}; border:none;margin-bottom: 0 !important;font-size: 0.75rem;"></td>
                    <td style="max-width: 50px"><input data-id="{{$item->id}}" type="text" name="importe" id="importe" value="{{ $item->importe }}" style="height: fit-content;background-color: {{$item->estados->color}}; color: {{$item->estados->text_color}}; border:none;margin-bottom: 0 !important;font-size: 0.75rem; text-align: center;width: 50px"></td>
                    <td style="max-width: 50px" @if($item->estado_factura == 0) style="background-color: #f25757; color: white;" @else style="background-color: #2cbc09; color: white;" @endif >
                        <select name="estado_factura" id="estado_factura" data-id="{{$item->id}}" style="background-color: {{$item->estado_factura == 1 ? '#2cbc09': '#f25757'}}; color: white;margin-bottom: 0 !important;font-size: 0.75rem;height: fit-content;padding: 0.1rem 0.1rem 0.1rem 0.2rem; width: 66px;">
                            <option value="">Seleccione un estado</option>
                                <option @if($item->estado_factura == 1) selected style="height: fit-content;background-color: #2cbc09; color: white;" @endif value="1">Abonada</option>
                                <option @if($item->estado_factura == 0) selected style="height: fit-content;background-color: #f25757; color: white;" @endif value="0">No Abonada</option>
                        </select>
                    </td>
                    <td style="max-width: 98px"><input  data-id="{{$item->id}}" type="date" name="banco" id="banco" value="{{ $item->banco }}" style="height: fit-content;background-color: {{$item->estados->color}}; color: {{$item->estados->text_color}}; border:none;margin-bottom: 0 !important;font-size: 0.75rem;max-width: 98px"></td>
                    <td style="max-width: 98px"><input data-id="{{$item->id}}" type="date" name="fecha_acuerdo" id="fecha_acuerdo" value="{{ $item->fecha_acuerdo }}" style="height: fit-content;background-color: {{$item->estados->color}}; color: {{$item->estados->text_color}}; border:none;margin-bottom: 0 !important;font-size: 0.75rem;max-width: 80px"></td>
                    <td style="max-width: 80px"><input data-id="{{$item->id}}" type="date" name="plazo_maximo_entrega" id="plazo_maximo_entrega" value="{{ $item->plazo_maximo_entrega }}" style="height: fit-content;background-color: {{$item->estados->color}}; color: {{$item->estados->text_color}}; border:none;margin-bottom: 0 !important;font-size: 0.75rem;max-width: 80px"></td>
                    <td style="max-width: 80px" class="exclude">
                        <select name="gestor" id="gestor" data-id="{{$item->id}}" style="background-color: {{$item->estados->color}}; color: {{$item->estados->text_color}}; margin-bottom: 0 !important;font-size: 0.75rem;height: fit-content;padding: 0.1rem 0.1rem 0.1rem 0.2rem;max-width: 80px">
                            <option value="">Seleccione un gestor</option>
                            @foreach($gestores as $gestor)
                                <option @if($item->gestor == $gestor->id) selected  @endif value="{{$gestor->id}}">{{$gestor->name}} {{$gestor->surname}}</option>
                            @endforeach
                        </select>
                    </td>
                    <td style="max-width: 80px" class="exclude">
                        <select name="comercial_id" id="comercial_id" data-id="{{$item->id}}" style="background-color: {{$item->estados->color}}; color: {{$item->estados->text_color}}; margin-bottom: 0 !important;font-size: 0.75rem;height: fit-content;padding: 0.1rem 0.1rem 0.1rem 0.2rem;max-width: 80px">
                            <option value="">Seleccione un comercial</option>
                            @foreach($comerciales as $comercial)
                                <option @if($item->comercial_id == $comercial->id) selected  @endif value="{{$comercial->id}}">{{$comercial->name}} {{$comercial->surname}}</option>
                            @endforeach
                        </select>
                    </td>
                    <td style="max-width: 80px !important">
                        <button type="button" class="btn btn-sm btn-light edit-textarea" data-bs-toggle="modal" data-bs-target="#editModal" data-id="{{$item->id}}" data-field="comentario" data-content="{{ $item->comentario }}">Editar</button>
                    </td>
                    <td style="max-width: 80px !important">
                        <button type="button" class="btn btn-sm btn-light edit-textarea" data-bs-toggle="modal" data-bs-target="#editModal" data-id="{{$item->id}}" data-field="nuevo_comentario" data-content="{{ $item->nuevo_comentario }}">Editar</button>
                    </td>
                    {{-- <td style="max-width: 80px !important"><textarea name="comentario" data-id="{{$item->id}}" cols="30" rows="1" style=" background-color: rgba(255, 255, 255, 0.123) ;margin-bottom: 0; width:100%;">{{ $item->comentario }}</textarea></td>
                    <td style="max-width: 80px !important"><textarea name="nuevo_comentario" data-id="{{$item->id}}" cols="30" rows="1"  style="background-color: rgba(255, 255, 255, 0.123) ; margin-bottom: 0; width:100%;">{{ $item->nuevo_comentario }}</textarea></td> --}}
                </tr>
                @endforeach
            </tbody>
        </table>
        <!-- Modal Structure -->
        <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editModalLabel">Editar</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <textarea id="modal-textarea" class="form-control" rows="4"></textarea>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                        <button type="button" class="btn btn-primary" id="saveChanges">Guardar Cambios</button>
                    </div>
                </div>
            </div>
        </div>



        @if($perPage !== 'all')
        {{ $kitDigitals->links() }}
        @endif
        <div class="col-md-12 col-sm-12 text-center" style="margin: 1rem 0">
            <span class="fs-3" >Sumatorio: <b>{{$Sumatorio.' €'}}</b></span>
        </div>
    </div>

    @else
        <div class="text-center py-4">
            <h3 class="text-center fs-3">No se encontraron registros de <strong>DOMINIOS</strong></h3>
        </div>
    @endif
    <style>
        /* Estilos específicos para la tabla */
    .table-responsive {
        overflow-x: auto; /* Asegura un desplazamiento suave en pantallas pequeñas */
    }
    
    .header-table th {
        vertical-align: bottom; /* Alinea el texto de los encabezados en la parte inferior */
        white-space: nowrap; /* Evita que los encabezados se rompan en líneas */
        font-size: 0.85rem; /* Ajusta el tamaño del texto para los encabezados */
    }
    
    .table td, .table th {
        padding: 0.5rem; /* Ajusta el padding para las celdas */
    }
    
    .long-text {
        max-width: 250px; /* Máximo ancho para el texto largo */
        overflow: hidden;
        text-overflow: ellipsis;
        white-space: nowrap;
    }
    th {
      white-space: nowrap !important;
    }
    .titulo_filtros {
      white-space: nowrap !important;
    }
    </style>
</div>
@section('scripts')
<script>
$(document).ready(function() {
    $('.edit-textarea').on('click', function() {
        var id = $(this).data('id');
        var field = $(this).data('field');
        var content = $(this).data('content');
        $('#modal-textarea').val(content).data('id', id).data('field', field);
        $('#editModalLabel').text('Editar ' + field.replace('_', ' ').toUpperCase());
    });

    $('#saveChanges').on('click', function() {
        var id = $('#modal-textarea').data('id');
        var field = $('#modal-textarea').data('field');
        var value = $('#modal-textarea').val();
        $('[data-id="' + id + '"][data-field="' + field + '"]').data('content', value);
        handleDataUpdate(id, value, field);
    });
});

// Función para manejar la actualización de datos
function handleDataUpdate(id, value, key) {
    $.ajax({
        type: "POST",
        url: "{{ route('kitDigital.updateData') }}", // Asegúrate de que esta es la ruta correcta
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
        },
        data: {
            id: id,
            value: value,
            key: key
        },
        success: function(data) {
            // Cierra el modal explícitamente después de actualizar
            $('#editModal').modal('hide');
            $('.modal-backdrop').remove();
            // Opcionalmente muestra una notificación de éxito
            const Toast = Swal.mixin({
                        toast: true,
                        position: 'top-end',
                        showConfirmButton: false,
                        timer: 3000,
                        timerProgressBar: true,
                        didOpen: (toast) => {
                            toast.addEventListener('mouseenter', Swal.stopTimer);
                            toast.addEventListener('mouseleave', Swal.resumeTimer);
                        }
                    });

                    Toast.fire({
                        icon: data.icon, // Corregido: Se agregó una coma al final
                        title: data.mensaje // Corregido: Se agregó una coma al final
                    });
        },
        error: function(xhr, status, error) {
            // Opcionalmente muestra una notificación de error
            $('#editModal').modal('hide'); // Cierra el modal también en caso de error si lo prefieres
        }
    });
}


</script>


    @include('partials.toast')
    <script src="{{asset('assets/vendors/choices.js/choices.min.js')}}"></script>

    <script>
    $(document).ready(function() {
        $("#sidebar").remove();
        $("#main").css("margin-left", "0px");
        // Función para manejar la actualización de datos
        function handleDataUpdate(id, value, key) {
            $.ajax({
                type: "POST",
                url: "{{ route('kitDigital.updateData') }}", // Asegúrate que esta es la ruta correcta
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                },
                data: {
                    id: id,
                    value: value,
                    key: key
                },
                success: function(data) {
                    const Toast = Swal.mixin({
                        toast: true,
                        position: 'top-end',
                        showConfirmButton: false,
                        timer: 3000,
                        timerProgressBar: true,
                        didOpen: (toast) => {
                            toast.addEventListener('mouseenter', Swal.stopTimer);
                            toast.addEventListener('mouseleave', Swal.resumeTimer);
                        }
                    });

                    Toast.fire({
                        icon: data.icon, // Corregido: Se agregó una coma al final
                        title: data.mensaje // Corregido: Se agregó una coma al final
                    });
                },
                error: function(xhr, status, error) {
                    const Toast = Swal.mixin({
                        toast: true,
                        position: 'top-end',
                        showConfirmButton: false,
                        timer: 3000,
                        timerProgressBar: true,
                        didOpen: (toast) => {
                            toast.addEventListener('mouseenter', Swal.stopTimer);
                            toast.addEventListener('mouseleave', Swal.resumeTimer);
                        }
                    });

                    Toast.fire({
                        icon: 'error', // Se cambió a un ícono fijo 'error' porque 'data.icon' no estaría disponible aquí
                        title: 'Error de servidor' // Mensaje genérico de error, puedes personalizarlo
                    });
                }
            });
        }

        // Detectar cambios en inputs, selects y textareas dentro de la tabla
        $('.table').on('change', 'input, select, textarea', function() {
            var id = $(this).data('id');  // Asegúrate de que cada fila tenga un atributo data-id
            var key = $(this).attr('name');
            var value = $(this).val();
            handleDataUpdate(id, value, key);
        });
    });
    </script>
@endsection
