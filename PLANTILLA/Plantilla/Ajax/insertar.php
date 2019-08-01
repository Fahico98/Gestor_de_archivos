 <?php
include("../cnx.php");
 
$archivo = $_FILES["foto"];

if ($archivo["type"]=="image/jpg" or $archivo["type"]=="image/png") {
   $nom_encriptado=md5($archivo["tmp_name"]).".jpg";
      $ruta="../Fotos/".$nom_encriptado;
      move_uploaded_file($archivo["tmp_name"], $ruta);
      mysql_query("insert into insertarfoto (id,foto) value ('','$nom_encriptado')");
      /*
      foreach ($archivo as $key => $value) {
         echo $key.' '.$value.'->';
      }
      */
}
?>
