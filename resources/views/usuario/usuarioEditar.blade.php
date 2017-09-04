@extends('adminlte::layouts.app')

@section('htmlheader_title')
	{{ trans('message.tituloUsuarioEditar') }}
@endsection

@section('CSSx')
	<!-- Select2 -->
	<link rel="stylesheet" href="{{asset('/plugins/select2.min.css')}}">
@endsection

@section('contentheader_title')
	{{ trans('message.tituloUsuarioEditar') }}
@endsection

@section('contentheader_description')
	
@endsection

@section('main-content')

@include('partials.modalcambiarpassword')

@include('partials.alertaerror')
 
<!-- Form de nuevo proveedor -->
<div class="box box-primary">
	<div class="box-header with-border">
	  <h3 class="box-title">Ficha del nuevo usuario</h3>
	</div><!-- /.box-header -->
	<!-- form start -->
	<form class="form-horizontal" action="{{ route('usuarioEditarPut', ['id' => $usuario->id]) }}" method="POST">
	{{ csrf_field() }}
	{{ method_field('PUT') }}
	  <div class="box-body">
	  	<div class="col-xs-6">
	  		<h4>Datos generales</h4>
	  		<br>
	      {{-- Nombre del usuario --}}
		  	<div class="form-group">
	        <label class="col-sm-2 control-label">Nombres</label>
	        <div class="col-sm-10">
	          <input type="text" class="form-control" placeholder="Nombres" value="{{ $usuario->name }}" name="name">
	        </div>
	      </div>
		  	{{-- Apellidos del usuario --}}
		  	<div class="form-group">
	        <label class="col-sm-2 control-label">Apellidos</label>
	        <div class="col-sm-10">
	          <input type="text" class="form-control" placeholder="Apellidos" value="{{ $usuario->lastname }}" name="lastname">
	        </div>
	      </div>
	  		{{-- username --}}
		  	<div class="form-group">
	        <label class="col-sm-2 control-label">Username</label>
	        <div class="col-sm-10">
	          <input type="text" class="form-control" placeholder="Username" value="{{ $usuario->username }}" name="username">
	        </div>
	      </div>
	      	{{-- password --}}
		  	{{-- <div class="form-group">
	        <label class="col-sm-2 control-label">Password</label>
	        <div class="col-sm-10">
	          <input type="password" class="form-control" placeholder="Password" value="{{ $usuario->password }}" name="password">
	        </div>
	      </div> --}}
	      {{-- Tipo de usuario --}}
				<div class="form-group">
					<label class="col-sm-2 control-label">Tipo</label>
					<div class="col-sm-10">
						<select class="form-control select2" name="rol">
							<option value="0">Administrador</option>
							<option value="1">Bodega</option>
						</select>
					</div>
				</div>
				{{-- Cambiar password --}}
			<div class="form-group">
				<div class="col-sm-2"></div>
				<div class="col-sm-10">
					<button type="button" class="btn btn-warning" data-toggle="modal" data-target="#modalCambiarPassword" data-usuario="{{ $usuario->username }}" data-id="{{ $usuario->id }}">
                  		<span class="fa fa-unlock"> </span> Cambiar password
                	</button>
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
	          <input type="text" class="form-control" placeholder="example@example.com" value="{{ $usuario->email }}" name="email">
	        </div>
	      </div>
	      {{-- Telefono --}}
		  	<div class="form-group">
	        <label class="col-sm-2 control-label">Teléfono</label>
	        <div class="col-sm-10">
	          <input type="text" class="form-control" placeholder="(503) 9999-9999" value="{{ $usuario->telefono }}" name="telefono" data-inputmask='"mask": "(999) 9999-9999"' data-mask>
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

  $('#modalCambiarPassword').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget) // Button that triggered the modal
    var nombreUsuario = button.data('usuario') // Extract info from data-* attributes
    var idUsuario = button.data('id')
    // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
    // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
    var modal = $(this)
    // modal.find('.modal-body').text('Desea eliminar ' + nombreUsuario)
    modal.find('#myform').attr("action", "/usuario/" + idUsuario + "/pass")
  })
</script>
@endsection

