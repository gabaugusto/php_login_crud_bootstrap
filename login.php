<?php
  // session_start inicia a sessão
  session_start();
  session_regenerate_id(true);
  require('includes/conn.php');

  $login = $_POST['email'];
  $senha = $_POST['password'];
  // A variavel $result pega as varias $login e $senha, faz uma
  //pesquisa na tabela de usuarios
  
  $sql = "SELECT * FROM `alunos` WHERE `email` = '$login' AND `password`= '$senha'";
  $result = $conn->query($sql);

  /* Logo abaixo temos um bloco com if e else, verificando se a variável $result foi
  bem sucedida, ou seja se ela estiver encontrado algum registro idêntico o seu valor
  será igual a 1, se não, se não tiver registros seu valor será 0. Dependendo do
  resultado ele redirecionará para a página site.php ou retornara  para a página
  do formulário inicial para que se possa tentar novamente realizar o login */
  if ($result->num_rows > 0) {
    $_SESSION['email'] = $login;
    $_SESSION['password'] = $senha;
    header('location:home.php');
  } else {
    unset($_SESSION['email']);
    unset($_SESSION['password']);
    header('location:sign.php?message="Login not sucessuful"');
  }
?>

