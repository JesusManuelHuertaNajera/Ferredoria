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
      <nav class="navbar is-info" role="navigation" aria-label="main navigation">
        <div class="container">
            <div id="navbarBasicExample" class="navbar-menu">
                <div class="navbar-brand">
                  <a class="navbar-item" href="./index.php">
                      Ferredoria
                  </a> 
                </div>
                <div class="navbar-end">
                    <a href="./index.php" class="navbar-item">
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
    $mysql = require_once "conexion.php";
    if (!isset($_GET["id"])){
      exit("no hay id");
    }
    $id = $_GET['id'];
    $select = "SELECT * FROM producto WHERE id = $id";
    $resultado = $mysql->query($select);
    $selectT = "SELECT * from perfil;";
    $resultadoC = $mysql->query($selectT);
    $selectS = "SELECT * FROM categoria;";
    $resultados = $mysql->query($selectS);
    $persona = $resultado-> fetch_all(MYSQLI_ASSOC);
      foreach($persona as $up){
  ?>
  <div class="has-background-grey-lighter">
    <div class="container my-5 px-3">
        <section class="columns">
           
            <div class="column is-two-thirds is-flex is-flex-direction-column is-justify-content-space-between">
                <div>
                    <h3 class="is-size-3 has-text-black-bis has-text-weight-bold line-height-3 mb-4">
                      Editar Producto
                    </h3>
                    
                </div>
              <form action="Cambios.php" method="POST">
              <div class="field">
                  <input type="hidden" name="id" id="id" value="<?php echo $up['ID'] ?>">
                </div>
              <div class="field">
                  <label class="label">Perfil</label>
                  <div class="control">
                  <div class="select is-rounded">
                  <select name="perfil"  required>

                        <option ><?php echo $up["PERFIL"] ?></option>
                      
                        <?php while($filas= $resultadoC->fetch_assoc()){ 
                          
                          ?>
                        <option> <?php echo $filas["NAME"] ?></option>
                        <?php  }?>
                        </select>
                        
                  </div>
                  
                  </div>
                  
                </div>
                
                <div class="field">
                  <label class="label">Nombre</label>
                  <div class="control">
                    <input class="input" type="text" name="nombre" id="nombre" placeholder="¿Como se llama tu producto?" onkeyup="this.value = this.value.toUpperCase();" value="<?php echo $up["NAME"] ?>" required>
                  </div>
                </div>

                <div class="field">
                  <label class="label">Descripción</label>
                  <div class="control">
                    <input class="input" type="text" name="descripcion" id="descripcion"  placeholder="Descripción del producto" onkeyup="this.value = this.value.toUpperCase();" value="<?php echo $up["DESCRIPCION"] ?>" required>
                  </div>
                </div>

                <div class="field">
                  <label class="label">Medida</label>
                  <div class="control">
                    <input class="input" type="text" name="medida" id="medida"  placeholder="1/2" onkeyup="this.value = this.value.toUpperCase();" value="<?php echo $up["MEDIDA"] ?>" required>
                  </div>
                </div>

                <div class="field">
                  <label class="label">Costo</label>
                  <div class="control">
                    <input class="input" type="number" step="any" name="costo" id="costo" placeholder="100" value="<?php echo $up["COSTO"] ?>" required> 
                  </div>
                </div>

                <div class="field">
                  <label class="label">Categoria</label>
                  <div class="control">
                  <div class="select is-rounded">
                    <select name="Categoria" required>

                        <option ><?php echo $up["CATEGORIA"] ?></option>

                        <?php while($filas= $resultados->fetch_assoc()){ ?>
                        <option> <?php echo $filas["NAME"]; ?></option>
                        <?php  }?>
                        </select>
                  </div>
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