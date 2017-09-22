{{-- modal para eliminar --}}
<div class="modal modal-warning fade" id="modalCambiarPassword" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Asignar un nuevo password</h4>
      </div>
      <div class="modal-body">
        <form id="myform" class="form-horizontal" action="algo" method="POST">
        {{ csrf_field() }}
        {{ method_field('PUT') }}
        <div class="form-group">
          <label class="col-sm-3 control-label">Nuevo password: </label>
          <div class="col-sm-6">
            <input type="password" class="form-control" placeholder="Password" name="password">
          </div>
          <div class="col-sm-3">
            <button type="submit" class="btn btn-outline">Cambiar</button>  
          </div>
        </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Cancelar</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->