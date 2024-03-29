<?php
  session_start();
  require 'database.php';
  if (isset($_SESSION['user_id'])) {
    $records = $conn->prepare('SELECT id, email, password FROM users WHERE id = :id');
    $records->bindParam(':id', $_SESSION['user_id']);
    $records->execute();
    $results = $records->fetch(PDO::FETCH_ASSOC);
    $user = null;
    if (count($results) > 0) {
      $user = $results;
    }
  }
?>

<link rel="shortcut icon" type="image/x-icon" href="pantallaprueba/img/iconlogoWeListen.ico">
<!DOCTYPE html>
<html>
  <head>


    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Bootstrap Core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">


  <!-- Custom CSS -->
  <link href="dist/css/sb-admin-2.css" rel="stylesheet">


  <!-- Custom Fonts -->
  <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

  </head>
  <body>

    <!--CODE PHP-->
    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand">WeListen</a>
            </div>
            <!-- /.navbar-header -->
            <ul class="nav navbar-top-links navbar-right">
                <!-- /.dropdown PERFIL DE USUARIO -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
                        <?php if(!empty($user)): ?>
                        <?= $user['email']; ?>
                    </a>
                    <ul class="dropdown-menu dropdown-user">

                        <li><a href="logout.php"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li>
                            <a href="index.php"><i class="fa fa-music"></i> Inicio</a>
                        </li>
                        <li>
                            <a href="tuMusica.php"><i class="fa fa-play-circle"></i> Tu música</a>
                        </li>
                        <li>
                            <a href="addMusic.php"><i class="fa fa-play-circle"></i> Agregar música</a>
                        </li>

                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Agregar Música</h1>
                    <div class="container">

                      <form enctype="multipart/form-data" id="form1" method="post" action="upload.php">
                          <div class="form-group">
                              <input type="text" style="width:500px" class="form-control" name="titulo" placeholder="Titulo cancion" required>
                          </div>

                          <div class="form-group">
                              <input type="text" style="width:500px" class="form-control" name="autor" placeholder="Autor cancion" required>
                          </div>

                          <hr style="border-color:beige;">

                          <div class="form-group">
                              Seleccione archivo: <input type="file" name="file1" accept=".ogg,.flac,.mp3" required="required"/>
                          </div>

                          <hr style="border-color:beige;">

                          <button type="submit" name="submit" class="btn btn-success">Subir</button>
                          <button type="button" class="btn btn-danger" onclick="javascript:location.href='index.php'">Cancelar</button>
                          <input type="text" style="visibility:hidden" class="form-control" name="id2" value="<?= $user['id']; ?>">
                        </form>
                    </div>
                  </div>
                </div>
              </div>



      <!--renderiza directamente la pagina de login-->
    <?php else:
        header('Location: login.php');
      ?>
    <?php endif; ?>


    <!-- jQuery -->
    <script src="vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="dist/js/sb-admin-2.js"></script>
    <script src="js/app.js"></script>






  </body>
</html>
