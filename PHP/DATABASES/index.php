<?php 
error_reporting(E_ALL);
ini_set('display_errors', 1);
require('connection.php');
?>
<!DOCTYPE html">
<!-- Desarrollo Web en Entorno Servidor -->
<!-- Tema 3 : Trabajar con bases de datos en PHP -->
<!-- Ejemplo: Conjuntos de datos con MySQLi -->
<html>
  <head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
      <title>Ejercicio Tema 3: Conjuntos de resultados en PDO</title>
      <link href="dwes.css" rel="stylesheet" type="text/css">
      </head>
      <body>
        <div id="encabezado">
          <h1>Ejercicio: Conjuntos de resultados en PDO</h1>
          <form id="form_seleccion" action="" method="post">
            <span>Producto: </span>
            <select name="producto">
              <?php
                  
                  if (isset($_POST['producto'])) $producto = $_POST['producto'];
                      // Rellenamos el desplegable con los datos de todos los productos
                      $error = $dwes->connect_errno;
                      if ($error == null) {
                          $sql = "SELECT cod, nombre_corto FROM producto";
                          $resultado = $dwes->query($sql);
                          if($resultado) {
                              $row = $resultado->fetch(PDO::FETCH_ASSOC);
                              while ($row != null) {
                                  echo "              <option value='${row['cod']}'";
                                  // Si se recibió un código de producto lo seleccionamos
                                  // en el desplegable usando selected='true'
                                  if (isset($producto) && $producto == $row['cod'])
                                      echo " selected='true'";
                                  echo ">${row['nombre_corto']}</option>";
                                  $row = $resultado->fetch(PDO::FETCH_ASSOC);
                              }
                          }
                      }
                      else {
                          $mensaje = $dwes->connect_error;
                      }
              ?>
            </select>
            <input type="submit" value="Mostrar stock" name="enviar"/>
          </form>
        </div>
        <div id="contenido">
          <h2>Stock del producto en las tiendas:</h2>
          <?php
              // Si se recibió un código de producto y no se produjo ningún error
              // mostramos el stock de ese producto en las distintas tiendas
              if ($error == null && isset($producto)) {
                  $sql = <<<SQL
                    SELECT tienda.nombre, stock.unidades
                    FROM tienda INNER JOIN stock ON tienda.cod=stock.tienda
                    WHERE stock.producto='$producto'
                    SQL;
                 $resultado = $dwes->query($sql);
                 if($resultado) {
                     $row = $resultado->fetch(PDO::FETCH_ASSOC);
                     while ($row != null) {
                         echo "<p>Tienda ${row['nombre']}: ${row['unidades']} unidades.</p>";
                         $row = $resultado->fetch(PDO::FETCH_ASSOC);
                      }
                  }
              }
          ?>
          </div>
          <div id="addproduct">
            <fieldset>
              <legend>Añadir producto</legend>
            <form action="" method="POST">
              <p><label>Código: </label><input type="text"><p>
              <p><label>Nombre: </label><input type="text"><p>
              <p><label>Descripción: </label><input type="textarea"><p>
              <p><label>PVP: </label><input type="text"><p>
              <p><label>Familia: </label>
              <select>
                <?php
                $sql = "SELECT * FROM familia";
                $resultado = $dwes->query($sql);
                if($resultado) {
                    $row = $resultado->fetch(PDO::FETCH_ASSOC);
                    while ($row != null) {
                        echo "              <option value='${row['cod']}'";
                        // Si se recibió un código de producto lo seleccionamos
                        // en el desplegable usando selected='true'
                        echo ">${row['nombre']}</option>";
                        $row = $resultado->fetch(PDO::FETCH_ASSOC);
                    }
                }
                ?>
            </select>
                <p>
                <p><input type="submit" value="Enviar">
            </form>
            </fieldset>
          </div>
          <div id="pie">
          <?php
              // Si se produjo algún error se muestra en el pie
              if ($error != null) echo "<p>Se ha producido un error! $mensaje</p>";
              else {
                  unset($dwes);
              }
          ?>
          </div>
     </body>
</html>