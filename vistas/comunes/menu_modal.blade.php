<div style="position:fixed;width:100%;bottom:0;left:0">
    <center>
        
        <button style="color:black;border-radius: 25px 25px 25px 25px;" type="button" class="btn btn-raised btn-light" data-toggle="modal" data-target="#menu">
            <i class="fas fa-ellipsis-v"></i>
        </button>
        
    </center>
</div>

<div class="modal fade" id="menu" tabindex="-1" role="dialog" aria-labelledby="menu" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
        <a href="{{ruta('biblioteca','principal')}}" class="btn btn-primary">Inicio</a>
        <a href="{{ruta('login','gestionar_usuarios')}}" class="btn btn-primary">Gestionar Usuarios</a>
        <a href="{{ruta('biblioteca','biblioteca')}}" class="btn btn-primary">Biblioteca</a>
        <a href="{{ruta('biblioteca','prestamos')}}" class="btn btn-primary">Préstamos</a>
        <a href="{{ruta('biblioteca','registrar')}}" class="btn btn-primary">Registrar Libro</a>
        <button data-dismiss="modal" class="btn btn-primary">Volver</button>
        
      </div>
    </div>
  </div>
</div>