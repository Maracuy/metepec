<div id="sidebar-container" class="bg-dark">
    <div class="logo">
            <h3 class="text-light font-weight-bold">Metepec</h3>
    </div>
    
    <div class="menu">
        <a href="../admin/reportes.php" class="d-block text-light p-3"> <i class="fas fa-align-justify mr-2"></i> Reporte </a>


        <a href="../admin/elecciones.php" class="d-block text-light p-3"> <i class="fas fa-vote-yea mr-2"></i> Electoral </a>
        
            <a href="../admin/defensa.php" class="d-block text-light p-3 ml-3"> <i class="fas fa-user-shield mr-2"></i> Defensa </a>
            <a href="../admin/promocion.php" class="d-block text-light p-3 ml-3"> <i class="fas fa-ad mr-2"></i> Promoción </a>
            <a href="../admin/alta_ciudadano.php" class="d-block text-light p-3 ml-3"> <i class="fas fa-pen mr-2"></i> Captura </a>
            <a href="../admin/ciudadanos.php" class="d-block text-light p-3 ml-3"> <i class="fas fa-briefcase mr-2"></i> Prospectos </a>

        <?php 
        if ($_SESSION['user']['nivel'] <= 1):?>
<!--             <a href="../admin/ajustes.php" class="d-block text-light p-3"> <i class="fas fa-tools mr-2"></i> Ajustes </a>
 -->        <?php endif ?>

    </div>
</div>