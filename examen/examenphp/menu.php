<?php
//TRAER LOS TÍTULOS Y LOS ID DE LOS JUEGOS
//COMPROBAR SI EL USUARIO ESTÁ LOGEADO
?>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <img src="imagenes/logo.svg" class="logo" style="width: 100px"/>
    <div class="collapse navbar-collapse" id="menu">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="index.php">Inicio</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="personajes.php">Personajes</a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-
                    haspopup="true" aria-expanded="false">Juegos</a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <?php
                      //AÑADIR ETIQUETAS <A> CON CADA UNO DE LOS JUEGOS
                      //FORMATO DE LA ETIQUETA:
                      //<a class='dropdown-item' href='juego.php?id=IDJUEGO'>TÍTULOJUEGO</a>
                    ?>
                </div>
            </li>
        </ul>
        <?php
          if ($logged) {
        ?>
          <ul class="navbar-nav ml-auto">
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-
                haspopup="true" aria-expanded="false"><?=$userName?></a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                  <a class='dropdown-item' href='pc.php'>Panel de control</a>
                  <a class='dropdown-item' href='logout.php'>Logout</a>
                </div>
            </li>
          </ul>

        <?php
          }else              
            echo '<a href="" class="btn btn-outline-secondary my-2 my-sm-0" data-toggle="modal" data-target="#modalLoginForm">Login</a>';
            ?>           
    </div>
</nav>


<form action="checkLogin.php" method="post">
<div class="modal fade" id="modalLoginForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header text-center">
        <h4 class="modal-title w-100 font-weight-bold">Sign in</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body mx-3">
        <div class="md-form mb-5">
          <i class="fas fa-envelope prefix grey-text"></i>
          <input name="username" class="form-control">
          <label for="username">Nombre de usuario</label>
        </div>

        <div class="md-form mb-4">
          <i class="fas fa-lock prefix grey-text"></i>
          <input type="password" name="password" class="form-control">
          <label for="password">Password</label>
        </div>

      </div>
      <div class="modal-footer d-flex justify-content-center">
        <button class="btn btn-default">Login</button>
      </div>
    </div>
  </div>
</div>
</form>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

