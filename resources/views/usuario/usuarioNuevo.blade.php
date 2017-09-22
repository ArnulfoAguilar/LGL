@extends('adminlte::layouts.app')

@section('htmlheader_title')
	{{ trans('message.tituloUsuarioNuevo') }}
@endsection

@section('CSSx')
	<!-- Select2 -->
	<link rel="stylesheet" href="{{asset('/plugins/select2.min.css')}}">
@endsection

@section('contentheader_title')
	{{ trans('message.tituloUsuarioNuevo') }}
@endsection

@section('contentheader_description')
	
@endsection

@section('main-content')

@include('partials.alertaerror')
 
<!-- Form de nuevo proveedor -->
<div class="box box-primary">
	<div class="box-header with-border">
	  <h3 class="box-title">Ficha del usuario</h3>
	</div><!-- /.box-header -->
	<!-- form start -->
	<form class="form-horizontal" action="{{ route('usuarioNuevoPost') }}" method="POST">
	{{ csrf_field() }}
	  <div class="box-body">
	  	<div class="col-xs-6">
	  		<h4>Datos generales</h4>
	  		<br>
	      {{-- Nombre del usuario --}}
		  	<div class="form-group">
	        <label class="col-sm-2 control-label">Nombres</label>
	        <div class="col-sm-10">
	          <input type="text" class="form-control" placeholder="Nombres" value="{{ old('name') }}" name="name">
	        </div>
	      </div>
		  	{{-- Apellidos del usuario --}}
		  	<div class="form-group">
	        <label class="col-sm-2 control-label">Apellidos</label>
	        <div class="col-sm-10">
	          <input type="text" class="form-control" placeholder="Apellidos" value="{{ old('lastname') }}" name="lastname">
	        </div>
	      </div>
	  		{{-- username --}}
		  	<div class="form-group">
	        <label class="col-sm-2 control-label">Username</label>
	        <div class="col-sm-10">
	          <input type="text" class="form-control" placeholder="Username" value="{{ old('username') }}" name="username">
	        </div>
	      </div>
	      	{{-- password --}}
		  	<div class="form-group">
	        <label class="col-sm-2 control-label">Password</label>
	        <div class="col-sm-10">
	          <input type="password" class="form-control" placeholder="Password" value="{{ old('password') }}" name="password">
	        </div>
	      </div>
	      {{-- Unidad de medida --}}
				<div class="form-group">
					<label class="col-sm-2 control-label">Tipo de usuario</label>
					<div class="col-sm-10">
						<select class="form-control select2" name="rol">
							<option value="0">Administrador</option>
							<option value="1">Bodega</option>
						</select>
					</div>
				</div>
		  	</div>
	  	<div class="col-xs-6">
	  		<h4>Contacto</h4>
	  		<br>
	  		{{-- Correo  --}}
		  	<div class="form-group">
	        <label class="col-sm-2 control-label">Correo</label>
	        <div class="col-sm-10">
	          <input type="text" class="form-control" placeholder="example@example.com" value="{{ old('email') }}" name="email">
	        </div>
	      </div>
	      {{-- Telefono --}}
		  	<div class="form-group">
	        <label class="col-sm-2 control-label">Teléfono</label>
	        <div class="col-sm-10">
	          <input type="text" class="form-control" placeholder="(503) 9999-9999" value="{{ old('telefono') }}" name="telefono" data-inputmask='"mask": "(999) 9999-9999"' data-mask>
	        </div>
	      </div>
	  	</div>
	  </div><!-- /.box-body -->

	  <div class="box-footer">
	    <a href="{{ route('usuarioLista') }}" class="btn btn-lg btn-default">Cancelar</a>
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

