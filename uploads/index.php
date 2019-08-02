
<?php
   include("createDatabase.php");
   createDatabase();
?>

<!doctype html>
<html lang="es">
   <head>
      <meta charset="utf-8" />
      <link rel="icon" type="image/png" href="../assets/img/logo.ico">
      <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
      <title>SIITEC</title>
      <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
      <meta name="viewport" content="width=device-width"/>
      <link href="../assets/css/bootstrap.min.css?v=1.4.0" rel="stylesheet"/>
      <link href="../assets/css/animate.min.css" rel="stylesheet"/>
      <link href="../assets/css/light-bootstrap-dashboard.css?v=1.4.0" rel="stylesheet"/>
      <link href="../assets/css/demo.css" rel="stylesheet"/>
      <link rel="stylesheet" href="css/style.css">

      <!-- jQuery UI style sheet -->
      <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">
      
      <!--     Fonts and icons     -->
      <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
      <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>
      <link href="../assets/css/pe-icon-7-stroke.css" rel="stylesheet"/>
      <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css"
         integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
   </head>

   <body>
      <div class="wrapper">
         <div class="sidebar" data-color="purple">
            <div class="sidebar-wrapper">
               <div class="logo">
                  <a href="#" class="simple-text"><img src="../assets/img/logo-blanco.png" width="180px"/></a>
               </div>
               <ul class="nav">
                  <li class="active">
                     <a href="#"><i class="pe-7s-graph"></i><p>Inicio</p></a>
                  </li>
                  <li>
                     <a href="./u/"><i class="pe-7s-users"></i><p>Alumnos</p></a>
                  </li>
                  <li>
                     <a href="user.html"><i class="pe-7s-user"></i><p>Profesores</p></a>
                  </li>
                  <li>
                     <a href="typography.html"><i class="pe-7s-news-paper"></i><p>Calificaciones</p></a>
                  </li>
                  <li>
                     <a href="icons.html"><i class="pe-7s-science"></i><p>Cargas académicas</p></a>
                  </li>
                  <li>
                     <a href="maps.html"><i class="pe-7s-map-marker"></i><p>Jefatura de división</p></a>
                  </li>
               </ul>
            </div>
         </div>
         <div class="main-panel">
            <nav class="navbar navbar-default navbar-fixed">
               <div class="container-fluid">
                  <div class="navbar-header">
                     <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation-example-2">
                           <span class="sr-only">Toggle navigation</span>
                           <span class="icon-bar"></span>
                           <span class="icon-bar"></span>
                           <span class="icon-bar"></span>
                     </button>
                     <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                           <li class="breadcrumb-item active" aria-current="page">Inicio</li>
                        </ol>
                     </nav>
                  </div>
                  <div class="collapse navbar-collapse">
                     <ul class="nav navbar-nav navbar-left"></ul>
                     <ul class="nav navbar-nav navbar-right">
                        <li>
                           <a>
                              <form action="./u/search.php" method="POST">
                                    <input name="b" class="form-control" placeholder="Buscar">
                              </form>
                           </a>
                        </li>
                        <li>
                           <a href=""><p><i class="fa fa-user"></i> Cuenta</p></a>
                        </li>
                        <li>
                           <a href="../">
                              <p><i class="fa fa-power-off"></i>  Cerrar sesión</p>
                           </a>
                        </li>
                        <li class="separator hidden-lg hidden-md"></li>
                     </ul>
                  </div>
               </div>
            </nav>
            <div class="content">
               <div class="container-fluid">
                  <div class="row">
                     <div class="col-md-12">
                        <div class="card">
                           <div class="header">
                              <h4 class="title">CONTENIDO</h4>
                              <form name="envia" method="POST" enctype="multipart/form-data">
                                 <p class="category">Formulario Matricula</p>
                                 <input type="file" class="form-control btn btn-primary" name="attachments[]" id="inputFiles" multiple>
                              </form>
                           </div>
                           <div id="dropArea" name="dropArea" class="content table-responsive">
                              Arrastre sus archivos aquí...
                           </div>
                           <div id="errorsDiv" name="errorsDiv"></div>
                           <div class="content table-responsive" id="listDiv" name="listDiv">
                              <ul id="filesList" name="filesList" class="list-group list-group-flush"></ul>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <footer class="footer">
               <div class="container-fluid">
                  <nav class="pull-left">
                     <p class="copyright pull-right">
                        &copy;
                        SIITEC. Todos los derechos reservados <a href="http://www.itscoalcoman.edu.mx" target="blank">ITSC</a>.
                        Soporte y contacto soporte.itscoalcoman.edu.mx
                     </p>
                  </nav>
               </div>
            </footer>
         </div>
      </div>
      
      <script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.4.1.js" language="JavaScript" type="text/javascript"></script>

      <script src="../../jQuery_file_upload_plugin/vendor/jquery.ui.widget.js" language="JavaScript" type="text/javascript"></script>
      <script src="../../jQuery_file_upload_plugin/jquery.iframe-transport.js" language="JavaScript" type="text/javascript"></script>
      <script src="../../jQuery_file_upload_plugin/jquery.fileupload.js" language="JavaScript" type="text/javascript"></script>
      
      <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js" language="JavaScript"
         type="text/javascript"></script>

      <script src="javascript/mainScript.js" language="JavaScript" type="text/javascript"></script>
      
   </body>
</html>

