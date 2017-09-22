@extends('adminlte::layouts.app')

@section('htmlheader_title')
	Proveedores
@endsection

@section('CSSx')

@endsection

@section('contentheader_title')
	Proveedores
@endsection

@section('contentheader_description')
	
@endsection

@section('main-content')

@include('partials.alertaerror')
 
<!-- Form de nuevo proveedor -->
<div class="box box-primary">
	<div class="box-header with-border">
	  <h3 class="box-title">Lista de proveedores</h3>
	</div><!-- /.box-header -->
	<!-- form start -->
	<form class="form-horizontal" action="{{ route('proveedorNuevoPost') }}" method="POST">
	{{ csrf_field() }}
	  <div class="box-body">
	  	<div class="col-xs-6">
	  		<h4>Datos generales</h4>
	  		<br>
	      {{-- Nombre del proveedor --}}
		  	<div class="form-group">
	        <label class="col-sm-2 control-label">Nombre</label>
	        <div class="col-sm-10">
	          <input type="text" class="form-control" placeholder="Nombre del proveedor" name="nombre">
	        </div>
	      </div>
		  	{{-- Contacto del proveedor --}}
		  	<div class="form-group">
	        <label class="col-sm-2 control-label">Contacto</label>
	        <div class="col-sm-10">
	          <input type="text" class="form-control" placeholder="Contacto" name="contacto">
	        </div>
	      </div>
	  		{{-- Direccion del proveedor --}}
		  	<div class="form-group">
	        <label class="col-sm-2 control-label">Direccion</label>
	        <div class="col-sm-10">
	          <input type="text" class="form-control" placeholder="Direccion" name="direccion">
	        </div>
	      </div>
	  	</div>
	  	<div class="col-xs-6">
	  		<h4>Telefonos</h4>
	  		<br>
	  		{{-- Telefono principal del proveedor --}}
		  	<div class="form-group">
	        <label class="col-sm-4 control-label">Telefono principal</label>
	        <div class="col-sm-8">
	          <input type="tel" class="form-control" id="telefonoPrincipal" placeholder="7777-7777" name="telefonoPrincipal">
	        </div>
	      </div>
	      {{-- Telefono secundario del proveedor --}}
		  	<div class="form-group">
	        <label class="col-sm-4 control-label">Telefono secundario</label>
	        <div class="col-sm-8">
	          <input type="tel" class="form-control" id="telefonoSecundario" placeholder="7777-7777" name="telefonoSecundario">
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

@endsection

