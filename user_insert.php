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
  <link href="assets/dist/css/custom.css" rel="stylesheet">
</head>

<body>
  <? require('includes/header.php'); ?>
  <div class="container-fluid">
    <div class="row">
      <? require('includes/menu.php'); ?>

      <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
          <h1 class="h2">Insert</h1>
        </div>
        <div class="col-md-4 order-md-1">
        <form action="home.php?action=insert" method='post'>
          <div class="form-group">
            <label for="pwd">Name:</label>
            <input type="text" class="form-control" id="name" name="name">
          </div>

          <div class="form-group">
            <label for="confirming_pwd">Document:</label>
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

          <button type="submit" class="btn btn-primary btn-md">Submit</button>
        </form>
        </div>
      </main>
    </div>
  </div>
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
    integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
  </script>
  <script>
    window.jQuery || document.write('<script src="../assets/js/vendor/jquery.slim.min.js"><\/script>')
  </script>
  <script src="assets/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/feather-icons/4.9.0/feather.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.min.js"></script>
  <script src="assets/dist/js/dashboard.js"></script>
</body>


</html>