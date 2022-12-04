<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
require('connection.php');

if (isset($_POST["addForm"])) {
  $data = [
    'cod' => $_POST["addCod"],
    'nombre_corto' => $_POST["addNombrecorto"],
    'descripcion' => $_POST["addDescripcion"],
    'PVP' => $_POST["addPvp"],
    'familia' => $_POST["addFamilia"]
  ];

  $sql = "INSERT INTO producto (cod, nombre_corto, descripcion, PVP, familia) 
  VALUES (:cod, :nombre_corto, :descripcion, :PVP, :familia);";

  try {
    $resultado = $dwes->prepare($sql)->execute($data);
    $addMsg = "Se ha insertado correctamente";
  } catch (PDOException $error) {
    $addMsg = $error->getMessage();
  }
}

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
      <?php
      echo "<select name='producto' onchange='this.form.submit()'>";
      echo "<option></option>";

      if (isset($_POST['producto'])) $producto = $_POST['producto'];
      // Rellenamos el desplegable con los datos de todos los productos
      $error = $dwes->connect_errno;
      if ($error == null) {
        $sql = "SELECT cod, nombre_corto FROM producto";
        $resultado = $dwes->query($sql);
        if ($resultado) {
          $row = $resultado->fetch(PDO::FETCH_ASSOC);
          while ($row != null) {
            echo "              <option value='" . $row['cod'] . "'";
            // Si se recibió un código de producto lo seleccionamos
            // en el desplegable usando selected='true'
            if (isset($producto) && $producto == $row['cod'])
              echo " selected='true'";
            echo ">" . $row['nombre_corto'] . "</option>";
            $row = $resultado->fetch(PDO::FETCH_ASSOC);
          }
          echo "</select></form>";
        }
      } else {
        $mensaje = $dwes->connect_error;
      }

      if ($error == null && isset($producto)) {
        $sql = "SELECT * FROM producto WHERE cod = '$producto';";
        $resultado = $dwes->query($sql);
        if ($resultado) {
          $row = $resultado->fetch(PDO::FETCH_ASSOC);
          echo "<form id='form_delete' action='delete.php' method='POST'>
                  <input type='hidden' name='delCod' value='${row['cod']}'>
                  <p><label>Código: </label><input type='text' name='cod' disabled value='${row['cod']}'></p>
                  <p><label>Nombre: </label><input type='text' name='nombre_corto' disabled value='${row['nombre_corto']}'><p>
                  <p><label>Descripción: </label><textarea name='descripcion' disabled>${row['descripcion']}</textarea><p>
                  <p><label>PVP: </label><input type='text' name='PVP' disabled value='${row['PVP']}'><p>
                  <p><label>Familia: </label>
                    <select name='addFamilia' disabled>";

          $sql = 'SELECT * FROM familia';
          $resultado = $dwes->query($sql);
          if ($resultado) {
            $row = $resultado->fetch(PDO::FETCH_ASSOC);
            while ($row != null) {
              echo "              <option value='".$row['cod']."'";
              
              echo ">".$row['nombre']."</option>";
              $row = $resultado->fetch(PDO::FETCH_ASSOC);
            }
            echo "</select>";
            echo "<p><input type='submit' name='delete' value='Borrar registro'></p>";
            echo "</form>";
          }
        }
      }

      ?>
      <!-- <input type="submit" value="Mostrar stock" name="enviar"/> -->
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
      if ($resultado) {
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
        <p><label>Código: </label><input type="text" name="addCod">
        <p>
        <p><label>Nombre: </label><input type="text" name="addNombrecorto">
        <p>
        <p><label>Descripción: </label><input type="textarea" name="addDescripcion">
        <p>
        <p><label>PVP: </label><input type="text" name="addPvp">
        <p>
        <p><label>Familia: </label>
          <select name="addFamilia">
            <?php
            $sql = "SELECT * FROM familia";
            $resultado = $dwes->query($sql);
            if ($resultado) {
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
        <p><input type="submit" name="addForm" value="Enviar">
          <span><?php if (isset($addMsg)) echo $addMsg ?></span>
        </p>
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