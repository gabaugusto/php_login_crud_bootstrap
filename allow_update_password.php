<?php
  session_start();
  session_regenerate_id(true);
  require('includes/conn.php');

  $senha = $_POST['pwd'];
  $login = $_SESSION['email'];
 
  $_SESSION['permite_trocar_senha'] = 0;
  
  $sql = "SELECT * FROM `alunos` WHERE `email` = '$login' AND `password`= '$senha'";
  $result = $conn->query($sql);

  if ($result->num_rows > 0) {
    $_SESSION['permite_trocar_senha'] = 1;

    require('./phpmailer/PHPMailerAutoload.php');
    require('./includes/envio_de_email.php');

    $message = 'Para trocar de senha clique no link abaixo<br/>';
    $message .= 'Link para trocar senha: <a href="http://localhost/projeto_escolar/change_password.php?t=1">Link</a>';
    $login = "hello@gabrielaugusto.me";
    while($row = $result->fetch_assoc()) {
        enviar_email($login, $row['nome'], 'Você quer trocar de senha?', $message);  
    }
  }
?>


<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="Gabriel Augusto - GabrielAugusto.me">
  <title>PHP Login System</title>

  <!-- Bootstrap core CSS -->
  <link href="assets/dist/css/bootstrap.min.css" rel="stylesheet">

  <style>
    .bd-placeholder-img {
      font-size: 1.125rem;
      text-anchor: middle;
      -webkit-user-select: none;
      -moz-user-select: none;
      -ms-user-select: none;
      user-select: none;
    }

    @media (min-width: 768px) {
      .bd-placeholder-img-lg {
        font-size: 3.5rem;
      }
    }
  </style>
  <!-- Custom styles for this template -->

  <link href="assets/dist/css/album.css" rel="stylesheet">
</head>

<body>
  <? require('includes/header.php'); ?>
  <? require('includes/menu.php'); ?>
  <div class="container">

    <h2>Changing password</h2>
    <p>Please. Check your e-mail</p>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"> </script>
    <script>
      window.jQuery || document.write('<script src="../assets/js/vendor/jquery.slim.min.js"><\/script>')
    </script>
    <script src="assets/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>

