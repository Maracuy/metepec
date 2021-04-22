<div id="sidebar-container" class="bg-dark">
    <div class="logo">
            <h3 class="text-light font-weight-bold">Metepec</h3>
    </div>
    
    <div class="menu" style="position: sticky; top: 10px;">

        <?php if($_SESSION['user']['nivel'] < 8 ): // Solo los RC para arriba pueden ver esto?> 
            <a href="../admin/reportes.php" class="d-block text-light p-3"> <i class="fas fa-align-justify mr-2"></i> Reporte </a>
        <?php endif?>

        <?php if($_SESSION['user']['nivel'] < 4 ): // Solo los ENCARGADOS para arriba pueden ver esto?> 
            <a href="../admin/elecciones.php" class="d-block text-light p-3"> <i class="fas fa-vote-yea mr-2"></i> Electoral </a>
        <?php endif?>
        
        <?php if($_SESSION['user']['nivel'] < 7 ): // Solo los ENCARGADOS para arriba pueden ver esto?> 
            <a href="../admin/defensa.php" class="d-block text-light p-3 ml-3"> <i class="fas fa-user-shield mr-2"></i> Defensa </a>
        <?php endif?>

        
        <?php if($_SESSION['user']['nivel'] < 4 ): // Solo los ENCARGADOS para arriba pueden ver esto?> 
            <a href="../admin/promocion.php" class="d-block text-light p-3 ml-3"> <i class="fas fa-ad mr-2"></i> Promoción </a>
        <?php endif?>

        
        <?php if($_SESSION['user']['nivel'] < 10 ): // Solo los ENCARGADOS para arriba pueden ver esto?> 
            <a href="../admin/alta_ciudadano.php" class="d-block text-light p-3 ml-3"> <i class="fas fa-pen mr-2"></i> Captura </a>
        <?php endif?>

        <?php if($_SESSION['user']['nivel'] < 9 ): // Solo los ENCARGADOS para arriba pueden ver esto?> 
            <a href="../admin/ciudadanos.php" class="d-block text-light p-3 ml-3"> <i class="fas fa-briefcase mr-2"></i> Prospectos </a>
        <?php endif?>

        

    </div>
</div>