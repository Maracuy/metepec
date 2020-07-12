<?php
require_once '../conection/conexioni.php';
?>

<div class="frow">
    <div class="col col3" id="salirusuario">
        <a href="../cerrar.php">CERRAR SESION <i class="fas fa-sign-out-alt"></i></a>
    </div>


    <div class="col col3">
        <button type="button" class="btn btn-primary">
            Notificaciones <span class="badge badge-light">4</span>
        </button>    
    </div>


    <div class="col col3">
        
        Bienvenido <?php echo ($_SESSION['user']['nombres']); ?>
    </div>
</div>