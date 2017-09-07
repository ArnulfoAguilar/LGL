@extends('adminlte::layouts.app')

@section('htmlheader_title')
	{{-- {{ trans('message.tituloProveedorNuevo') }} --}}
	Entrada de productos
@endsection

@section('CSSx')
	<!-- Select2 -->
	<link rel="stylesheet" href="{{asset('/plugins/select2.min.css')}}">
@endsection

@section('contentheader_title')
	{{-- {{ trans('message.tituloProveedorNuevo') }} --}}
	Entrada de productos
@endsection

@section('contentheader_description')
	
@endsection

@section('main-content')

@include('partials.alertaerror')
 
<!-- Form de nuevo proveedor -->
<div class="box box-primary">
	<div class="box-header with-border">
		<h3 class="box-title">Ingreso de detalle de entrada</h3>
	</div><!-- /.box-header -->
	<!-- form start -->
	<form class="form-horizontal" action="{{ route('proveedorNuevoPost') }}" method="POST">
		{{ csrf_field() }}
		<div class="box-body">
			{{-- Fila  --}}
			<div class="col-sm-6">
				{{-- Fecha --}}
				<div class="form-group">
					<label class="col-sm-3 control-label">Fecha ingreso:</label>
					<div class="col-sm-9">
						<input type="date" class="form-control">
					</div>
				</div>
			</div>					
			<div class="col-sm-6">
				{{-- Codigo factura --}}
				<div class="form-group">
					<label class="col-sm-4 control-label">Factura n°:</label>
					<div class="col-sm-8">
						<input type="text" class="form-control">
					</div>
				</div>
			</div>
			{{-- Fin fila --}}
			
			{{-- Fila  --}}
			<div class="col-sm-6">
				{{-- Proveedor --}}
				<div class="form-group">
					<label class="col-sm-3 control-label">Proveedor:</label>
					<div class="col-sm-9">
						<select class="form-control select2" name="tipoProducto_id">
							@foreach($proveedores as $proveedor)
							<option value="{{ $proveedor->id }}">{{ $proveedor->nombre }}</option>
							@endforeach
						</select>
					</div>
				</div>
			</div>					
			<div class="col-sm-6">
				{{-- Ingresado por --}}
				<div class="form-group">
					<label class="col-sm-4 control-label">Ingresado por:</label>
					<div class="col-sm-8">
						<input type="text" class="form-control">
					</div>
				</div>
			</div>
			{{-- Fin fila --}}
			
			{{-- Fila --}}
			<div class="col-sm-12">
				{{-- Tabla de productos --}}
				<table class="table table-bordered" id="tblProductos">
					<tr>
						<th style="width: 5%">#</th>
						<th style="width: 45%">Producto</th>
						<th style="width: 20%">Cantidad</th>
						<th style="width: 20%">Precio</th>
						<th style="width: 10%">
							<button class="btn btn-success" id="btnNuevoProducto" onclick="funcionNuevoProducto()" type="button">
                  				<span class="fa fa-plus"></span>  Agregar
                			</button>
						</th>
					</tr>
					<tr>
						<td>
							1
						</td>
						<td>
							<select class="form-control select2" name="tipoProducto_id" id="selectProductos">
								@foreach($productos as $producto)
								<option value="{{ $producto->id }}">{{ $producto->nombre }}</option>
								@endforeach
							</select>
						</td>
						<td>
							<input type="number" class="form-control" placeholder="100" name="nombre">
						</td>
						<td>
							<input type="number" class="form-control" placeholder="100" name="nombre">
						</td>
						<td align="center">
							<div id="a1" class="btn btn-danger">
                  				<span class="fa fa-remove"></span>
                			</div>
						</td>
					</tr>
				</table>
			</div>

		</div><!-- /.box-body -->

		<div class="box-footer">
			<a href="{{ route('proveedorLista') }}" class="btn btn-lg btn-default">Cancelar</a>
			<button type="submit" class="btn btn-lg btn-success pull-right">Guardar</button>
		</div>
	</form>
</div><!-- /.box -->

@endsection

@section('JSx')
{{-- Funcion para cargar mas filas de productos --}}
<script>
	$(document).on('ready', funcionPrincipal());

	function funcionPrincipal() {
		$("body").on( "click", ".btn-danger",funcionEliminarProducto);
	}
	var numero = 2;

	function funcionNuevoProducto() {
		copia = $('#selectProductos').clone(false);
		$('#tblProductos')
		.append
		(
			$('<tr>').attr('id','rowProducto'+numero)
			.append
			(
				$('<td>')
				.append
				(
					numero
				)
			)
			.append
			(
				$('<td>')
				.append
				(
					copia
				)
			)
			.append
			(
				$('<td>')
				.append
				(
					'<input type="number" class="form-control" placeholder="100" name="nombre">'
				)
			)
			.append
			(
				$('<td>')
				.append
				(
					'<input type="number" class="form-control" placeholder="100" name="nombre">'
				)
			)
			.append
			(
				$('<td>').attr('align','center')
				.append
				(
					'<button type="button" class="btn btn-danger" click="funcionEliminarProducto()" type="button"><span class="fa fa-remove"></span></button>'
				)
			)
		);
		//Initialize Select2 Elements
    	$(".select2").select2();
    	$(".select2").select2();
    	numero++;
	}

	function funcionEliminarProducto() {
		// $(this).remove().end();
		// $(this).closest('tr').remove();
		// console.log($(this).parent().parent());
		$(this).parent().parent().remove();
	}

</script>
{{-- Fin de funcion para cargar mas filas de productos --}}

<!-- Select2 -->
<script src="{{asset('/plugins/select2.full.min.js')}}"></script>
<!-- InputMask -->
<script src="{{asset('/plugins/jquery.inputmask.js')}}"></script>
<script src="{{asset('/plugins/jquery.inputmask.date.extensions.js')}}"></script>
<script src="{{asset('/plugins/jquery.inputmask.extensions.js')}}"></script>
<script>
  $(function () {
    //Money Euro
    $("[data-mask]").inputmask();
  });
</script>
<script>
  $(function () {
    //Initialize Select2 Elements
    $(".select2").select2();

  });
</script>
@endsection

