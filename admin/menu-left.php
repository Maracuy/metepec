<div id="sidebar-container" class="bg-dark">
    <div class="logo">
            <h3 class="text-light font-weight-bold">Metepec</h3>
    </div>
    
    <div class="menu">
        <a href="../admin/index.php" class="d-block text-light p-3"> <i class="fas fa-home mr-2"></i> Inicio </a>

        <!-- <a href="../admin/reportes.php" class="d-block text-light p-3"> <i class="fas fa-file-alt mr-2"></i> Reportes </a>
 -->
        <a href="../admin/ciudadanos.php" class="d-block text-light p-3"> <i class="fas fa-briefcase mr-2"></i> Ciudadanos </a>

        
        <a href="../admin/documentos.php" class="d-block text-light p-3"> <i class="far fa-file mr-2"></i> Documentos </a>
        <a href="../admin/glosario.php" class="d-block text-light p-3"> <i class="fas fa-spell-check mr-2"></i> Glosario </a>

        <?php 
        if ($_SESSION['user']['nivel'] == "Admin" || $_SESSION['user']['nivel'] == "Super Admin"){
            echo '<a href="../admin/ajustes.php" class="d-block text-light p-3"> <i class="fas fa-tools mr-2"></i> Ajustes </a>';
        }
        else{
            echo"";
        }
        ?>

    </div>
</div>