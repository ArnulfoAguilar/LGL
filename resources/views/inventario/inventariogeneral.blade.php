@extends('adminlte::layouts.app')

@section('htmlheader_title')
	{{ trans('message.tituloInventarioGeneral') }}
@endsection

@section('CSSx')
  <!-- DataTables -->
  <link rel="stylesheet" href="{{ asset('/plugins/dataTables.bootstrap.css') }}">
@endsection

@section('contentheader_title')
  {{ trans('message.tituloProductoLista') }}
@endsection

@section('contentheader_description')

@endsection

@section('main-content')

@include('partials.modaleliminar')

@include('partials.alertamensajes')

<div class="row">
    <div class="col-xs-12">
      <div class="box box-primary">
        <div class="box-header">
          <h3 class="box-title">Lista de alumnos</h3>
        </div><!-- /.box-header -->
        <div class="box-body table-responsive">
          <table id="tablaAlumnos" class="table table-bordered table-hover">
            <thead>
              <tr>
                <th style="width: 10%">Código</th>
                <th style="width: 30%">Nombre</th>
                <th style="width: 15%">Cantidad total</th>
                <th style="width: 15%">Valor total</th>
                <th style="width: 20%">Stock</th>
                <th style="width: 10%">Acción</th>
              </tr>
            </thead>
            <tbody>
              @foreach($productos as $producto)
              <tr>
              <td>{{$producto->codigo}}</td>
              <td>{{$producto->nombre}}</td>
              <td>{{$producto->cantidad}} {{$producto->unidadMedida->nombre}}</td>
              <td>${{ number_format($producto->valor_total,2)}}</td>
              @if($producto->porcentajeStock > 40)
              <td>
                <div class="progress progress-xs">
                  <div class="progress-bar progress-bar-success" style="width: {{ $producto->porcentajeStock }}%"></div>
                </div>
              </td>
              @elseif($producto->porcentajeStock > 20)
              <td>
                <div class="progress progress-xs">
                  <div class="progress-bar progress-bar-yellow" style="width: {{ $producto->porcentajeStock }}%"></div>
                </div>
              </td>
              @else
              <td>
                <div class="progress progress-xs">
                  <div class="progress-bar progress-bar-danger" style="width: {{ $producto->porcentajeStock }}%"></div>
                </div>
              </td>
              @endif
              <td align="center">
                <a href="{{ route('kardexProducto', ['id' => $producto->id]) }}" class="btn btn-primary"><span class="fa fa-th"></span></a>
              </td>
              </tr>
            @endforeach
            </tbody>
            <tfoot>
            </tfoot>
          </table>
        </div><!-- /.box-body -->
      </div><!-- /.box -->
    </div>
  </div>

@endsection

@section('JSx')
<!-- DataTables -->
<script src="{{ asset('/plugins/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('/plugins/dataTables.bootstrap.min.js') }}"></script>
<script>
      $(function () {
        $("#tablaAlumnos").DataTable(
          {
    language: {
        processing:     "Procesando...",
        search:         "Buscar:",
        lengthMenu:     "Mostrar _MENU_ registros",
        info:           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
        infoEmpty:      "Mostrando registros del 0 al 0 de un total de 0 registros",
        infoFiltered:   "(filtrado de un total de _MAX_ registros)",
        infoPostFix:    "",
        loadingRecords: "Cargando...",
        zeroRecords:    "No se encontraron resultados",
        emptyTable:     "Ningún dato disponible en esta tabla",
        paginate: {
            first:      "Primero",
            previous:   "Anterior",
            next:       "Siguiente",
            last:       "Último"
        },
        aria: {
            sortAscending:  ": Activar para ordenar la columna de manera ascendente",
            sortDescending: ": Activar para ordenar la columna de manera descendente"
        }
    }
} 
          );
      });

      $('#modalEliminar').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget) // Button that triggered the modal
        var nombreProducto = button.data('producto') // Extract info from data-* attributes
        var idProducto = button.data('id')
        // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
        // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
        var modal = $(this)
        modal.find('.modal-body').text('Desea eliminar ' + nombreProducto)
        modal.find('#myform').attr("action", "/producto/" + idProducto)
      })
</script>
@endsection
