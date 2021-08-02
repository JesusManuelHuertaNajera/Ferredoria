<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Doria</title>
    <link rel="stylesheet" type="text/css" href="../bulma/css/bulma.min.css">
   <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.2/css/bulma.min.css"> -->
   <script src="../jquery/Minimal-Modal-Popup-Plugin-with-jQuery-modal-js/jquery.min.js"></script>
    <script src="../jquery/Minimal-Modal-Popup-Plugin-with-jQuery-modal-js/jquery.modal.min.js"></script>
    <link rel="stylesheet" href="../jquery/Minimal-Modal-Popup-Plugin-with-jQuery-modal-js/jquery.modal.min.css">
  </head>
  <body>
      <!-- NAVEGACIÓN -->
      <nav class="navbar is-link" role="navigation" aria-label="main navigation">
        <div class="container">
            <div id="navbarBasicExample" class="navbar-menu">
                <div class="navbar-brand">
                  <a class="navbar-item" href="../index.php" >
                  Ferredoria
                  </a> 
                </div>
                <div class="navbar-end">
                    <a href="./insert.php" class="navbar-item">
                      Agregar Categoría
                    </a>
                    <a href="../index.php" class="navbar-item">
                     Regresar
                    </a>
                   <!-- <a href="./docker.html" class="navbar-item">
                      Docker
                    </a>-->
                </div>
            </div>
        </div>
    </nav><!-- NAVEGACIÓN -->
    <?php
              function myFunction()
              {
                echo "<script>alert('Hello! I am an alert box!');</script>";
              }
             // function myFunction($message){echo "<script>alert('$message');</script>";}
              
              $mysql = require_once "../conexion.php";
              $i=0;
              $select = "SELECT * from categoria";
              $resultado = $mysql->query($select);
            ?>
  <!-- HERO -->
  <div class="has-background-grey-lighter">
    <div class="container my-5 px-3">
        <section class="columns">
           
            <div class="column  is-flex is-flex-direction-column is-justify-content-space-between">
                <div>
                    <h3 class="is-size-3 has-text-black-bis has-text-weight-bold line-height-3 mb-4">
                      Categorías
                    </h3>
                    
                </div>
                <div class="table-container">
                  <table class="table is-bordered is-striped is-narrow is-hoverable is-fullwidth">
                    <thead >
                      <th>Id</th>
                      <th>Perfil</th>
                      <th>Descripción</th>
                      <th>Cambios</th>
                      <th>Eliminar</th>
                    </thead>
                    <tbody>
                      <?php while($filas= $resultado->fetch_assoc()){ 
                        $i=$i+1;
                        ?>
                        <tr>
                          <td><?php echo $i ?></td>
                          <td><?php echo $filas["NAME"] ?></td>
                          <td><?php echo $filas["DESCRIPCION"] ?></td>
                          <td><a class="button is-success is-rounded" href='./update.php?id=<?php echo $filas["ID"]?>'>Editar</a></td>
                          <td><a class="button is-danger is-rounded" href="#myModal<?php echo $filas["ID"] ?>" rel="modal:open">Quitar</a></td>
                        </tr>
                        <div class="modal" id="myModal<?php echo $filas["ID"] ?>">
                          <div class="modal-background"></div>
                          <div class="card">
                            <header class="modal-card-head">
                              <p class="modal-card-title">Borrar: <?php echo $filas["NAME"] ?></p>
                            </header>
                            <section class="modal-card-body">
                              ¿Estas seguro de borrar la categoría?
                            </section>
                            <footer class="modal-card-foot">
                              <a class="button is-danger" href='./delete.php?id=<?php echo $filas["ID"]?>'>Eliminar</a>
                              <a class="button" href="#myModal" rel="modal:close">Cancelar</a>
                            </footer>
                          </div>
                        </div>
                      <?php }?>
                    </tbody>
                  </table>
                </div>
            </div>
           
        </section>
    </div>
</div><!-- HERO -->

</body>
</html>