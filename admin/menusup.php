<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <form class="form-inline my-2 d-inline-block position-relative">
        <input class="form-control mr-sm-2" type="search" placeholder="Buscar" aria-label="Buscar">
        <button class="btn position-absolute btn-search" type="submit"><i class="fas fa-search"></i></button>
      </form>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <img src="img/usuarios/<?php echo $_SESSION['user']['usuario'].'.jpg' ?>" alt="Falta imagen" class="img-fluid rounded-circle avatar mr-2">
            <?php 
            echo '"'.$_SESSION['user']['usuario'] . '" ' . $_SESSION['user']['nombres'];
            ?>
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="#">Perfil</a>
            <a class="dropdown-item" href="#">Mensajes</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="../cerrar.php">Cerrar Sesión</a>
          </div>
        </li>

      </ul>
    </div>
  </div>
</nav>