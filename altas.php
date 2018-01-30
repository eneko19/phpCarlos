
<?php
session_start();
if (isset($_SESSION['usuario'])) {
?>
<!DOCTYPE html>
<html>
 <head>
   <meta charset="utf-8">
   <title>Altas</title>
   <style media="screen">

     .formulario{
       margin: auto;
       width: 60%;
       border: 2px solid blue;
       text-align: center;
       border-radius: 15px;
       padding: 15px;
     }
     h1{
       padding-bottom: 10px;
       border-bottom: 1px solid black;
     }
   </style>
 </head>
 <body>
   <form class="formulario" action="controlador.php" method="post">
     <h1>Alta de componente</h1>
     <p>Tipo</p>
     <input list="tipos" name="tipos">
     <datalist id="tipos">
       <option value="Placa Base">
       <option value="Procesador">
       <option value="Disco Duro">
       <option value="Memoria RAM">
     </datalist>
     <br>
     <p>Modelo</p>
     <input type="text" name="modelo" ><br>
     <p>Precio</p>
     <input type="text" name="precio" value="0"><br><br>
     <textarea name="descripcion" rows="10" cols="50" placeholder="Descripcion..."></textarea>
     <br>
     <input type="submit" name="submitA" value="Enviar">
     <input type="button" onClick="document.location = 'index.php'" name="Cancelar" value="Cancelar">
   </form>
 </body>
</html>

<?php
}else {
  include('pantalla_login.php');
}
 ?>
