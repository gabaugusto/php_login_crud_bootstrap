<?php
  session_start();
  session_regenerate_id(true);
  require('includes/conn.php');

  $login = $_POST['email'];
  $senha = $_POST['password'];
  
  $sql = "SELECT * FROM `alunos` WHERE `email` = '$login' AND `password`= '$senha'";
  $result = $conn->query($sql);

  if ($result->num_rows > 0) {
    $_SESSION['email'] = $login;
    $_SESSION['password'] = $senha;

    header('location:home.php');
  } else {
    unset($_SESSION['email']);
    unset($_SESSION['password']);
    header('location:sign.php?message=Login not sucessuful');
  }
?>

