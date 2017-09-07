@extends('adminlte::layouts.app')

@section('htmlheader_title')
	{{ trans('message.tituloProductoEditar') }}
@endsection

@section('CSSx')
	<!-- Select2 -->
	<link rel="stylesheet" href="{{asset('/plugins/select2.min.css')}}">
@endsection

@section('contentheader_title')
	{{ trans('message.tituloProductoEditar') }}
@endsection

@section('contentheader_description')
	
@endsection

@section('main-content')

@include('partials.alertaerror')
 
<!-- Form de nuevo producto -->
<div class="box box-primary">
	<div class="box-header with-border">
		<h3 class="box-title">{{ trans('message.tituloFormProductoNuevo') }}</h3>
	</div><!-- /.box-header -->
	<!-- form start -->
	<form class="form-horizontal" action="{{ route('productoEditarPut', ['id' => $producto->id]) }}" method="POST">
		{{ csrf_field() }}
		{{ method_field('PUT') }}
		<div class="box-body">
			<div class="col-xs-6">
				<h4>Datos generales</h4>
				<br>
				{{-- Id del producto --}}
				<input type="hidden" name="id" value="{{ $producto->id }}">
				{{-- Codigo del producto --}}
				<div class="form-group">
					<label class="col-sm-4 control-label">Codigo del producto</label>
					<div class="col-sm-8">
						<input type="text" class="form-control" name="codigo" value="{{ $producto->codigo }}" disabled="">
					</div>
				</div>
				{{-- Nombre del producto --}}
				<div class="form-group">
					<label class="col-sm-4 control-label">Nombre del producto</label>
					<div class="col-sm-8">
						<input type="text" class="form-control" name="nombre" value="{{ $producto->nombre }}">
					</div>
				</div>
				{{-- Tipo de producto --}}
				<div class="form-group">
					<label class="col-sm-4 control-label">Tipo del producto</label>
					<div class="col-sm-8">
						<select class="form-control select2" name="tipoProducto_id" value="{{ $producto->tipoProducto_id }}">
							@foreach($tipoProductos as $tipoProducto)
							<option value="{{ $tipoProducto->id }}">{{ $tipoProducto->tipo }}</option>
							@endforeach
						</select>
					</div>
				</div>
				{{-- Unidad de medida --}}
				<div class="form-group">
					<label class="col-sm-4 control-label">Unidad de medida</label>
					<div class="col-sm-8">
						<select class="form-control select2" name="unidadMedida_id" value="{{ $producto->unidadMedida_id }}">
							@foreach($unidadMedidas as $unidadMedida)
							<option value="{{ $unidadMedida->id }}">{{ $unidadMedida->nombre }} - {{ $unidadMedida->abreviatura }}</option>
							@endforeach
						</select>
					</div>
				</div>
			</div>
			<div class="col-xs-6">
				<h4>Control de inventario</h4>
				<br>
				{{-- Cantidad minima --}}
				<div class="form-group">
					<label class="col-sm-4 control-label">Cantidad minima</label>
					<div class="col-sm-8">
						<input type="number" min="0" class="form-control" placeholder="0" name="existencia_min" value="{{ $producto->existencia_min }}">
					</div>
				</div>
				{{-- Cantidad maxima --}}
				<div class="form-group">
					<label class="col-sm-4 control-label">Cantidad maxima</label>
					<div class="col-sm-8">
						<input type="number" min="0" class="form-control" placeholder="0" name="existencia_max" value="{{ $producto->existencia_max }}">
					</div>
				</div>
				<h4>Inventario inicial</h4>
				<br>
				{{-- Cantidad inicial --}}
				<div class="form-group">
					<label class="col-sm-4 control-label">Cantidad inicial</label>
					<div class="col-sm-8">
						<input type="number" min="0" class="form-control" placeholder="0" name="cantidad" value="{{ $producto->cantidad }}">
					</div>
				</div>
				{{-- Valor unitario  --}}
				<div class="form-group">
					<label class="col-sm-4 control-label">Valor unitario</label>
					<div class="col-sm-8">
						<div class="input-group">
							<span class="input-group-addon">$</span>
							<input type="number" step="0.01" min="0" class="form-control" placeholder="0.00" name="valor_unitario" value="{{ $producto->valor_unitario }}">        		
						</div>
					</div>
				</div>
			</div>
		</div><!-- /.box-body -->

		<div class="box-footer">
			<a href="{{ route('productoLista') }}" class="btn btn-lg btn-default">Cancelar</a>
			<button type="submit" class="btn btn-lg btn-success pull-right">Guardar</button>
		</div>
	</form>
</div><!-- /.box -->

@endsection

@section('JSx')
<!-- Select2 -->
<script src="{{asset('/plugins/select2.full.min.js')}}"></script>
<!-- InputMask -->
<script src="{{asset('/plugins/jquery.inputmask.js')}}"></script>
<script src="{{asset('/plugins/jquery.inputmask.date.extensions.js')}}"></script>
<script src="{{asset('/plugins/jquery.inputmask.extensions.js')}}"></script>
<script>
  $(function () {
    //Initialize Select2 Elements
    $(".select2").select2();

  });
</script>
@endsection

