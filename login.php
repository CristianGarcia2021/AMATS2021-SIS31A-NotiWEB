<?php
session_start();
include 'lib/config.php';

if(isset($_SESSION['usuario']))
{
  header("Location: index.php");
}
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Bienvenido a Noti</title>
  
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

  
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  
  <link rel="stylesheet" href="plugins/iCheck/square/blue.css">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href=""><b>RED</b>SOCIAL</a>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg">Bienvenido a REDSOCIAL</p>

    <form action="" method="post">
      <div class="form-group has-feedback">
        <input type="text" class="form-control" placeholder="Usuario" name="usuario" pattern="[A-Za-z_-0-9]{1,20}">
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" class="form-control" placeholder="Contraseña" name="contrasena" pattern="[A-Za-z_-0-9]{1,20}">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="row">
        <!-- /.col -->
        <div class="col-xs-12">
          <button type="submit" name="login" class="btn btn-primary btn-block btn-flat">Iniciar Sesión</button>
        </div>
        <!-- /.col -->
      </div>
    </form>

    <?php
    if(isset($_POST['login']))

    {

      $usuario = mysql_real_escape_string($_POST['usuario']);
      $usuario = strip_tags($_POST['usuario']);
      $usuario = trim($_POST['usuario']);

      $contrasena = mysql_real_escape_string(md5($_POST['contrasena']));
      $contrasena = strip_tags(md5($_POST['contrasena']));
      $contrasena = trim(md5($_POST['contrasena']));

      $query = mysql_query("SELECT * FROM usuarios WHERE usuario = '$usuario' AND contrasena = '$contrasena'");
      $contar = mysql_num_rows($query);

      if($contar == 1) 

      {

        while($row=mysql_fetch_array($query)) 

        {

          if($usuario = $row['usuario'] && $contrasena = $row['contrasena'])

          {

            $_SESSION['usuario'] = $usuario;
            $_SESSION['id'] = $row['id_use'];

            header('Location: index.php');

          }

        }
        
      } else { echo 'Los datos ingresados no son correctos'; }


    }

    ?>

    <br>

    <a href="#">Olvidé mi contraseña</a><br>
    <a href="registro.php" class="text-center">Registrarme en REDSOCIAL</a>

  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

<!-- jQuery 2.2.3 -->
<script src="plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="bootstrap/js/bootstrap.min.js"></script>
<!-- iCheck -->
<script src="plugins/iCheck/icheck.min.js"></script>
<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' // optional
    });
  });
</script>
</body>
</html>
