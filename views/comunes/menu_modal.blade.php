<div style="position:fixed;width:100%;bottom:0;right:-45vw">
    <center>
        
        <button style="color:black;border-radius: 25px 25px 25px 25px;" type="button" class="btn btn-raised btn-light" data-toggle="modal" data-target="#menu">
            <i class="fas fa-ellipsis-v"></i>
        </button>
        
    </center>
</div>

<div class="modal fade" id="menu" tabindex="-1" role="dialog" aria-labelledby="menu" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
        <a href="{{url('main/main')}}" class="btn btn-primary">Inicio</a>
        @if(ControllerLogin::get_session('privileges')[0]==1)
            <a href="{{url('login/users')}}" class="btn btn-primary">Gestionar Usuarios</a>
        @endif
        <a href="{{url('main/crear_frase')}}" class="btn btn-primary">Crear Frase</a>
        <a href="{{url('login/edit_profile')}}" class="btn btn-primary">Editar Perfil</a>
        <a href="{{url('login/log_out')}}" class="btn btn-primary">Cerrar Sesión</a>
        <button data-dismiss="modal" class="btn btn-primary">Volver</button>
        
      </div>
    </div>
  </div>
</div>