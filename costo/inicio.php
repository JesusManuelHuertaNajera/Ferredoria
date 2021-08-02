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
                    <a href="../index.php" class="navbar-item">
                     Regresar
                    </a>
                </div>
            </div>
        </div>
    </nav><!-- NAVEGACIÓN -->
  <!-- HERO -->
  <div class="has-background-grey-lighter">
    <div class="container my-5 px-3">
        <section class="columns">
           
            <div class="column  is-flex is-flex-direction-column is-justify-content-space-between">
                <div>
                    <h3 class="is-size-2 has-text-black-bis has-text-weight-bold line-height-3 mb-4">
                      Cambio de costos
                    </h3>              
                </div> 
                    <?php
                      $mysql = require_once "../conexion.php"; 
                      $selectS = "SELECT * FROM categoria;";
                      $resultados = $mysql->query($selectS);
                      ?>
                <form action="guardar.php" method="POST">
                  <div class="field">
                      <div class="control">
                      <div class="select is-rounded">
                      <select name="perfil" required>
                            <option value="">Elige una Categoría</option>
                            <?php while($filas= $resultados->fetch_assoc()){ ?>
                            <option> <?php echo $filas["NAME"] ?></option>
                            <?php  }?>
                            </select>
                            
                              </div>
                              
                              </div>
                              
                            </div>
                      </div>
                    </section>
                  </div>   
                 
                  <div class="column is-two-fifths ml-6 ">
                    <div class="column is-two-fifths ml-6 ">
                      <label class="label">Porcentaje</label>
                        <div class="control">
                          <input class="input " type="number" name="costo" step="any" id="costo" placeholder="100%" min="1" max="100" pattern="^[0-9]+" required> 
                        </div>
                    </div>
                  </div>
                  
                  <div class="column is-two-fifths ml-6">
                  <div class="column is-two-fifths ml-6">
                      <div class="control">
                      <div class="select is-rounded">
                      <select name="cambio" required>
                            <option value="">Elige una Acción</option>
                            <option> AUMENTO</option>
                            <option> DISMINUIR</option>
                            </select>   
                            </div>
                      </div>
                      </div>
                  </div>  


                  <center>
                  <div class="column">
                    
                      <div class="control">
                        <button class="button is-link">Guardar Cambios</button>
                      </div>
                    
                  </div>
                  </center>  
                </form>
              <br>
            </div>
           
                    
</div><!-- HERO -->

</body>
</html>