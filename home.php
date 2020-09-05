<?
  session_start();

  if((!isset ($_SESSION['email']) == true) and (!isset ($_SESSION['password']) == true)) {
    unset($_SESSION['email']);
    unset($_SESSION['password']);
    header('location:sign.php?message="Please, enter again."');
  }
  
  $logged = $_SESSION['email'];

  require('./phpmailer/PHPMailerAutoload.php');
  require('./includes/send_mail.php');

  if(isset($_REQUEST['action'])){
    $action = $_REQUEST['action'];
  } else {
    $action = "";
  }
  $message =""; 

  require('includes/conn.php');
  if ($action == 'insert') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $date = $_POST['birthday'];
    $pwd = $_REQUEST['pwd'];
    $document = $_POST['document'];

    $sql_i = "SELECT * FROM `alunos` WHERE email = '$email'";
    $result_i = $conn->query($sql_i);
    
    if ($result_i->num_rows > 0) {
      header('location:user_insert.php?message=duplicated');
    } else {
      $sql_s = "INSERT INTO `alunos` (nome, email, data_nascimento, password, cpf) VALUES ('$name', '$email', '$date', '$pwd', $document)";
      $result_s = $conn->query($sql_s);
      $message = "Data inserted";
      send_mail('hello@gabrielaugusto.me', 'Someone\s Name', 'Subject inserted', $message); 
    }

  } elseif ($action == 'update') {
    $pwd = $_REQUEST['pwd'];
    $sql_s = "UPDATE alunos SET password='$pwd' WHERE email='$logged'";
    $result = $conn->query($sql_s);
    $message = "Data updated";

    send_mail('hello@gabrielaugusto.me', 'Someone\s Name', 'Subject updated', $message);

  } elseif ($action == 'delete') {
    $id = $_REQUEST['id'];
    $sql_s = "DELETE FROM alunos WHERE id=$id";
    $result = $conn->query($sql_s);
    $message = "Data deleted";
    send_mail('hello@gabrielaugusto.me', 'Someone\s Name', 'Subject deleted', $message);        
  }

  $sql = "SELECT * FROM `alunos`";
  $result = $conn->query($sql);
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
  <link href="assets/dist/css/dashboard.css" rel="stylesheet">
  <link href="assets/dist/css/custom.css" rel="stylesheet">
</head>

<body>
  <? require('includes/header.php'); ?>
  <div class="container-fluid">
    <div class="row">
      <? require('includes/menu.php'); ?>

      <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
        <div
          class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
          <h1 class="h2">Dashboard</h1>
          <div class="btn-toolbar mb-2 mb-md-0">
            <div class="btn-group mr-2">
              <button type="button" class="btn btn-sm btn-outline-secondary">Share</button>
              <button type="button" class="btn btn-sm btn-outline-secondary">Export</button>
            </div>
            <button type="button" class="btn btn-sm btn-outline-secondary dropdown-toggle">
              <span data-feather="calendar"></span>
              This week
            </button>
          </div>
        </div>

        <?
      if ($message != ""){
        echo '<div class="alert alert-secondary">';
        echo   '<strong></strong> ' . $message;
        echo '</div>';
      }
    
      if ($result->num_rows > 0) {
        echo '<canvas class="my-4 w-100" id="myChart" width="900" height="380"></canvas>';
        echo '<div class="table-responsive">';
        echo '<table class="table table-striped table-sm">';
        echo '<thead>';
        echo '  <tr>';
        echo '    <th scope="col">#</th>';
        echo '    <th scope="col">Nome</th>';
        echo '    <th scope="col">e-mail</th>';    
        echo '    <th scope="col">CPF</th>';
        echo '    <th scope="col">Data de Nascimento</th>';
        echo '  </tr>';
        echo '</thead> ';
        while($row = $result->fetch_assoc()) {
            echo "<tr><td>" . $row["id"]. "</td><td>" . $row["nome"]. "</td><td>" . $row["email"]. "</td><td>" . $row["cpf"]. "</td><td>" . $row["data_nascimento"]. "</td></tr>";
        }
        echo '</table>';
        echo '</div>';
      } else {
        echo "Nenhum resultado. ";
      }
    ?>
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