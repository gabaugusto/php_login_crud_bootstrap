<?
  session_start();

  if((!isset ($_SESSION['email']) == true) and (!isset ($_SESSION['password']) == true)) {
    unset($_SESSION['email']);
    unset($_SESSION['password']);
    header('location:sign.php?message="Please, enter again."');
  }
  
  $logged = $_SESSION['email'];

  require('includes/conn.php');

  if ($_REQUEST['action'] == 'insert') {
    $sql = "INSERT INTO `alunos` (nome, email, data_nascimento) VALUES ('Gabriel Augusto', 'gab@example.com', '2020-08-25')";
    $result = $conn->query($sql);
    $message = "Inserted with Sucess.";

  } elseif ($_REQUEST['action'] == 'update') {
    $nome = $_REQUEST['nome'];
    $id = $_REQUEST['id'];

    $sql = "UPDATE alunos SET nome='$nome' WHERE id=$id";
    $result = $conn->query($sql);
    $message = "Updated with Sucess.";

  } elseif ($_REQUEST['action'] == 'delete') {
    $sql = "DELETE FROM alunos WHERE id=$id";
    $result = $conn->query($sql);
    $message = "Deleted with sucess";
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

  <link rel="canonical" href="https://getbootstrap.com/docs/4.5/examples/grid/">

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

    <h1>Welcome, Home</h1>
    <?
      if ($result->num_rows > 0) {
            
      echo '<table class="table">';
      echo '<thead>';
      echo '  <tr>';
      echo '    <th scope="col">#</th>';
      echo '    <th scope="col">Nome</th>';
      echo '    <th scope="col">Data de Nascimento</th>';
      echo '  </tr>';
      echo '</thead> ';
      while($row = $result->fetch_assoc()) {
          echo "<tr><td> " . $row["id"]. " </td><td> " . $row["nome"]. " </td><td>  " . $row["data_nascimento"]. "</td></tr>";
      }
      echo '</table>';
    } else {
      echo "Nenhum resultado. Por favor, faça a busca novamente.";
    }
    ?>

    <a href='logout.php'>Logout</a>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"> </script>
    <script>
      window.jQuery || document.write('<script src="../assets/js/vendor/jquery.slim.min.js"><\/script>')
    </script>
    <script src="assets/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>