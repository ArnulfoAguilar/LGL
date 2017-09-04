@extends('adminlte::layouts.app')

@section('htmlheader_title')
	{{-- {{ trans('message.tituloProveedorNuevo') }} --}}
	Entrada de producto
@endsection

@section('CSSx')
	<!-- Select2 -->
	<link rel="stylesheet" href="{{asset('/plugins/select2.min.css')}}">
@endsection

@section('contentheader_title')
	{{-- {{ trans('message.tituloProveedorNuevo') }} --}}
	Entrada de producto
@endsection

@section('contentheader_description')
	
@endsection

@section('main-content')

@include('partials.alertaerror')
 
<!-- Form de nuevo proveedor -->
<div class="box box-primary">
	<div class="box-header with-border">
	  <h3 class="box-title">{{ trans('message.tituloFormProveedorNuevo') }}</h3>
	</div><!-- /.box-header -->
	<!-- form start -->
	<form class="form-horizontal" action="{{ route('proveedorNuevoPost') }}" method="POST">
	{{ csrf_field() }}
	  <div class="box-body">
	  	<div class="col-xs-6">
	  		<h4>Producto</h4>
	  		<br>
	      {{-- Producto --}}
		  	<div class="form-group">
	        <label class="col-sm-2 control-label">Producto</label>
	        <div class="col-sm-10">
	          <select class="form-control select2" name="tipoProducto_id">
	      		@foreach($productos as $producto)
		      	<option value="{{ $producto->id }}">{{ $producto->nombre }}</option>
	      		@endforeach
			  </select>
	        </div>
	      </div>
		  	{{-- Tipo --}}
		  	<div class="form-group">
	        <label class="col-sm-2 control-label">Tipo</label>
	        <div class="col-sm-10">
	          <select class="form-control select2" name="tipoProducto_id">
		      	<option value="1">Normal</option>
		      	<option value="2">Devolucion</option>
		      	<option value="3">Inicio de periodo</option>
			  </select>
	        </div>
	      </div>
	  		{{-- Proveedor --}}
		  	<div class="form-group">
	        <label class="col-sm-2 control-label">Proveedor</label>
	        <div class="col-sm-10">
	          <select class="form-control select2" name="tipoProducto_id">
	      		@foreach($proveedores as $proveedor)
		      	<option value="{{ $proveedor->id }}">{{ $proveedor->nombre }}</option>
	      		@endforeach
			  </select>
	        </div>
	      </div>
	      {{-- Nombre del producto --}}
		  	<div class="form-group">
	        <label class="col-sm-2 control-label">Descripcion</label>
	        <div class="col-sm-10">
	          <input type="text" class="form-control" placeholder="Producto" name="nombre">
	        </div>
	      </div>
	  	</div>
	  	<div class="col-xs-6">
	  		<h4>Cantidad</h4>
	  		<br>
	  		{{-- Cantidad --}}
		  	<div class="form-group">
	        <label class="col-sm-4 control-label">Cantidad</label>
	        <div class="col-sm-8">
	          <input type="number" min="0" class="form-control" placeholder="0" name="cantidad">
	        </div>
	      </div>
	      {{-- Valor unitario --}}
		  	<div class="form-group">
	        <label class="col-sm-4 control-label">Valor unitario</label>
	        <div class="col-sm-8">
	        	<div class="input-group">
	        		<span class="input-group-addon">$</span>
	          		<input type="number" step="0.01" min="0" class="form-control" placeholder="0.00" name="valor_unitario">        		
        		</div>
	        </div>
	      </div>
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

