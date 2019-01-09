<div style="position:fixed;width:5%;bottom:0;right:0vw;">
    <center>
        
        <button style="color:black;border-radius: 25px 25px 25px 25px;" type="button" class="btn btn-raised btn-light" data-toggle="modal" data-target="#menu">
            <i class="fas fa-ellipsis-v"></i>
        </button>
        
    </center>
</div>

<div class="modal fade" id="menu" tabindex="-1" role="dialog" aria-labelledby="menu" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
        @if(ControllerLogin::get_session('status')!=2)
            <a href="{{url('main/main')}}" class="btn btn-primary">Inicio</a>
            @if(ControllerLogin::get_session('privileges')[0]==1)
                <a href="{{url('login/users')}}" class="btn btn-primary">Gestionar Usuarios</a>
            @endif
            <a href="{{url('main/creador_frases')}}" class="btn btn-primary">Crear Frase</a>
            @if(ControllerLogin::get_session('privileges')[3]==1)
            <a href="{{url('main/critico')}}" class="btn btn-primary">Evaluar Contenido</a>
            @endif
            <a href="{{url('login/edit_profile')}}" class="btn btn-primary">Editar Perfil</a>
        @endif    
        <a href="{{url('login/log_out')}}" class="btn btn-primary">Cerrar Sesión</a>
        <button data-dismiss="modal" class="btn btn-primary">Volver</button>
        
      </div>
    </div>
  </div>
</div>