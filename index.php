<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Componentes</title>
    <style media="screen">
    h1{
      text-align: center;
    }
    td {
      text-align: center;
    }
    </style>
  </head>
  <body>

<?php
// Me conecto a la base de datos
$servername = "localhost";
$username = "eneko";
$password = "eneko";
$dbname = "ComponentsBD";

$conn = new mysqli($servername, $username, $password, $dbname);

  session_start();
  if (isset($_SESSION['usuario'])) {
    // variable que guarda la sentencia sql para mostrar los datos de la tabla components
        $sql = "select id, tipo, model, descripcion, preu from components";

    // Guarda el resultado de la sentencia sql ejecutada en una variable
    $result = $conn->query($sql);

    // Mientras que el resultado tenga mas de 0 lineas se mostrarán los siguientes datos
    if ($result->num_rows > 0) {

      echo "
          <h1>Componentes</h1>
          <div align='center'>
        <table border='1' cellpadding='0' cellspacing='0' width='600' bgcolor='#58ACFA' bordercolor='#FFFFFF'>
          <tr>
            <td width='150' style='font-weight: bold'>TIPO</td>
            <td width='150' style='font-weight: bold'>MODEL</td>
            <td width='300' style='font-weight: bold'>DESCPRIPCION</td>
            <td width='100' style='font-weight: bold'>PREU</td>
            <td width='90' style='font-weight: bold'>Eliminar</td>
            <td width='90' style='font-weight: bold'>Modificar</td>
          </tr>";
      while($row = $result->fetch_assoc()) {
        echo "
            <tr>
              <td width='150'>".$row['tipo']."</td>
              <td width='150'>".$row['model']."</td>
              <td width='300'>".$row['descripcion']."</td>
              <td width='100'>".$row['preu']."€</td>
              <td width='90'><a onClick=\"javascript: return confirm('¿Deseas eliminar este registro?');\"
                href=\"controlador.php?id={$row['id']}\"><img src=\"eliminar.png\"></a></td>
              <td width='90'><a onClick=\"javascript: return confirm('¿Deseas modificar este registro?');\"
                href=\"modificar.php?id={$row['id']}\"><img src=\"edit.png\"></a></td>
            </tr>
            ";

      }
      echo "</table>";
      echo "<a href=\"controlador.php?logout\"><button type=\"submit\" name=\"logout\">Logout</button></a>";
      echo "<a href=\"altas.php\"><button type=\"submit\" name=\"add\">Agregar</button></a>";
    }else {
     echo "0 results";
    }
  }else {
    include('pantalla_login.php');
  }



// Cierra la conexión
  $conn->close();
?>
   </table>
</div>

  </body>
</html>
