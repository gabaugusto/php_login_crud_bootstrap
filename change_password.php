<?

    session_start();

    if (isset($_REQUEST['permite_trocar_senha'])) {
        $_SESSION['t'] = $_REQUEST['t'];
    } else {
        header('location:user_update_password.php');
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

    <h1>Welcome, Home</h1>
    <form action="home.php?action=update" method='post'>
      <p>Por favor, informe a sua senha nova:</p>
      <div class="form-group">
        <label for="pwd">Nova senha:</label>
        <input type="password" class="form-control" id="pwd" name="pwd">
      </div>

      <div class="form-group">
        <label for="confirme_pwd">Confirme a Nova senha:</label>
        <input type="password" class="form-control" id="confirme_pwd" name="confirme_pwd">
      </div>
      <button type="submit" class="btn btn-default">Submit</button>
    </form>

    <a href='logout.php'>Logout</a>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
      integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script>
      window.jQuery || document.write('<script src="../assets/js/vendor/jquery.slim.min.js"><\/script>')
    </script>
    <script src="assets/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>