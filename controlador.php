<?php
//Connectar a una Base de dates
$servername = "localhost";
$username = "eneko";
$password = "eneko";
$dbname = "ComponentsBD";
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Funcion para limpiar el código
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

/*  ALTA */

// Limpiamos el codigo
  if (isset($_POST["submitA"])) {
    $tipo = test_input($_POST["tipos"]);
    $modelo = test_input($_POST["modelo"]);
    $precio = test_input($_POST["precio"]);
    $descripcion = test_input($_POST["descripcion"]);

  // variable que guarda la sentencia para insertar los datos
    $consulta = "INSERT INTO components (tipo, model, descripcion, preu) VALUES
     ('$tipo', '$modelo', '$descripcion', '$precio')";

  // Si se hace correctamente pasa al archivo index.php si no escribe un error
     if ($conn->query($consulta) === TRUE) {
        header('location: index.php');
     }else {
       echo "ERROR";
     }
}
   /* BAJA */

   if(isset ($_GET["id"])){
        $id=test_input($_GET["id"]);
        $sql = "DELETE FROM components WHERE id ='$id'";
        if ($conn->query($sql) === TRUE) {
            header('Location: index.php');
        }else {
            echo "<br>Error:" . $conn->error;
        }
    }
    /* MODIFICAR */
    if (isset($_POST["submitM"])) {
      $idM = test_input($_POST["idM"]);
      $tipoM = test_input($_POST["tiposM"]);
      $modeloM = test_input($_POST["modeloM"]);
      $precioM = test_input($_POST["precioM"]);
      $descripcionM = test_input($_POST["descripcionM"]);

      $modificar = "UPDATE components set tipo='$tipoM', model='$modeloM', descripcion='$descripcionM',
                    preu='$precioM' where id = '$idM'";

      if ($conn->query($modificar) === TRUE) {
          header('location: index.php');
      }else {
        echo "ERROR";
      }
}

    /* LOGIN */
      if (isset($_POST["submitL"])) {
        $usuarioL = test_input($_POST["usuari"]);
        $passL = test_input($_POST["pass"]);
        $login = "select * from usuarios where usuari like '$usuarioL' and contrasenya like '$passL'";

        $result = $conn->query($login);

          if ($result->num_rows > 0) {
            // inicio la sesion
            session_start();
            $_SESSION['usuario'] = $usuarioL;
            header('location: index.php');
          }else {
            include("pantalla_login.php");
            header('location: index.php?error=si');
          }

      }else {
        echo "ERROR";
      }
    /* LOGOUT*/
    if (isset($_GET["logout"])) {
      session_start();
      // Borra contingut de $_SESSION
      session_unset();
      // elimina la sessio
      session_destroy();

      header('location: index.php');
    }


 ?>
