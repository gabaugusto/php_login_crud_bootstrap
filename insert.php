<?
  session_start();

  if((!isset ($_SESSION['email']) == true) and (!isset ($_SESSION['password']) == true)) {
    unset($_SESSION['email']);
    unset($_SESSION['password']);
    header('location:sign.php?message="Please, enter again."');
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

    <form action="home.php?action=insert" method='post'>
      <div class="form-group">
        <label for="pwd">Name:</label>
        <input type="text" class="form-control" id="name" name="name">
      </div>

      <div class="form-group">
        <label for="confirming_pwd">document:</label>
        <input type="text" class="form-control" id="document" name='document'>
      </div>

      <div class="form-group">
        <label for="confirming_pwd">e-mail:</label>
        <input type="email" class="form-control" id="email" name='email'>
      </div>

      <div class="form-group">
        <label for="confirming_pwd">Birthday:</label>
        <input type="date" class="form-control" id="birthday" name='birthday'>
      </div>

      <div class="form-group">
        <label for="confirming_pwd">Password:</label>
        <input type="password" class="form-control" id="pwd" name='pwd'>
      </div>      

      <button type="submit" class="btn btn-default">Submit</button>
    </form>

    <a href='logout.php'>Logout</a>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"> </script>
    <script>
      window.jQuery || document.write('<script src="../assets/js/vendor/jquery.slim.min.js"><\/script>')
    </script>
    <script src="assets/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>