<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Doria</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.2/css/bulma.min.css">
  </head>
  <body>
      <!-- NAVEGACIÓN -->
      <nav class="navbar is-link" role="navigation" aria-label="main navigation">
        <div class="container">
            <div id="navbarBasicExample" class="navbar-menu">
                <div class="navbar-brand">
                  <a class="navbar-item" href="https://www.definicionabc.com/negocios/agenda.php">
                      Ferredoria
                  </a> 
                </div>
                <div class="navbar-end">
                    <a href="./inicio.php" class="navbar-item">
                      Regresar
                    </a>

                   <!-- <a href="./docker.html" class="navbar-item">
                      Docker
                    </a>-->
                </div>
            </div>
        </div>
    </nav><!-- NAVEGACIÓN -->
  <!-- HERO -->
  <?php
    $mysql = require_once "../conexion.php";
    if (!isset($_GET["id"])){
      exit("no hay id");
    }
    $id = $_GET['id'];
    $select = "SELECT * FROM perfil WHERE id = $id";
    $resultado = $mysql->query($select);
    $persona = $resultado-> fetch_all(MYSQLI_ASSOC);
      foreach($persona as $up){
  ?>
  <div class="has-background-grey-lighter">
    <div class="container my-5 px-3">
        <section class="columns">
           
            <div class="column is-two-thirds is-flex is-flex-direction-column is-justify-content-space-between">
                <div>
                    <h3 class="is-size-3 has-text-black-bis has-text-weight-bold line-height-3 mb-4">
                      Editar Perfil
                    </h3>
                    
                </div>
              <form action="Cambios.php" method="POST">
              <?php //while($filas= $resultado->fetch_assoc()){ ?>
                <div class="field">
                  <input type="hidden" name="old" id="old" value="<?php echo $up['NAME'] ?>">
                </div>
                <div class="field">
                  <input type="hidden" name="id" id="id" value="<?php echo $up['ID'] ?>">
                </div>
                <div class="field">
                  <label class="label">Nombre del Perfil</label>
                  <div class="control">
                    <input class="input" type="text" name="nombre" id="nombre" placeholder="Text input" value="<?php echo $up['NAME'] ?>" onkeyup="this.value = this.value.toUpperCase();" required>
                  </div>
                </div>

                <div class="field">
                  <label class="label">Descripción</label>
                  <div class="control">
                    <input class="input" type="text" name="descripcion" id="descripcion"  placeholder="hola@" value="<?php echo $up['DESCRIPCION'] ?>" onkeyup="this.value = this.value.toUpperCase();" required>
                  </div>
                </div>

                <div class="field is-grouped">
                  <div class="control">
                    <button class="button is-link">Guardar</button>
                  </div>
                </div>
                
              </form>
              <?php  }?>
            </div>
           
        </section>
    </div>
</div><!-- HERO -->

</body>
</html>