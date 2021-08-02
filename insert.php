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
            
  <div class="has-background-grey-lighter">
    <div class="container my-5 px-3">
        <section class="columns">
           
            <div class="column is-two-thirds is-flex is-flex-direction-column is-justify-content-space-between">
                <div>
                    <h3 class="is-size-3 has-text-black-bis has-text-weight-bold line-height-3 mb-4">
                    <center> Producto Nuevo</center>
                     
                    </h3>
                </div>
              <form action="guardar.php" method="POST">
              <?php
                  $mysql = require_once "conexion.php";
                  $select = "SELECT * from perfil;";
                  $resultado = $mysql->query($select);
                  $selectS = "SELECT * FROM categoria;";
                  $resultados = $mysql->query($selectS);
                      ?>
              <div class="field">
                  <label class="label">Perfil</label>
                  <div class="control">
                  <div class="select is-rounded">
                  <select name="perfil" required>

                        <option value="">Elige una opción</option>
                      
                        <?php while($filas= $resultado->fetch_assoc()){ ?>
                        <option> <?php echo $filas["NAME"] ?></option>
                        <?php  }?>
                        </select>
                        
                  </div>
                  
                  </div>
                  
                </div>
                
                <div class="field">
                  <label class="label">Nombre</label>
                  <div class="control">
                    <input class="input" type="text" name="nombre" id="nombre" placeholder="¿Como se llama tu producto?" onkeyup="this.value = this.value.toUpperCase();" required>
                  </div>
                </div>

                <div class="field">
                  <label class="label">Descripción</label>
                  <div class="control">
                    <input class="input" type="text" name="descripcion" id="descripcion"  placeholder="Descripción del producto" onkeyup="this.value = this.value.toUpperCase();" required>
                  </div>
                </div>

                <div class="field">
                  <label class="label">Medida</label>
                  <div class="control">
                    <input class="input" type="text" name="medida" id="medida"  placeholder="1/2" onkeyup="this.value = this.value.toUpperCase();" required>
                  </div>
                </div>

                <div class="field">
                  <label class="label">Costo</label>
                  <div class="control">
                    <input class="input" type="number" step="any" name="costo" id="costo" placeholder="100" required> 
                  </div>
                </div>

                <div class="field">
                  <label class="label">Categoría</label>
                  <div class="control">
                  <div class="select is-rounded">
                    <select name="Categoria" required>

                        <option value="">Elige una opción</option>

                        <?php while($filas= $resultados->fetch_assoc()){ ?>
                        <option> <?php echo $filas["NAME"] ?></option>
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
            </div>
           
        </section>
    </div>
</div><!-- HERO -->

</body>
</html>