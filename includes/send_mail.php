
<?
  function send_mail($to, $who, $subject, $message) {
    //Configurações do e-mail
    $mail = new PHPMailer;
    $mail->isSMTP();
    $mail->SMTPDebug = 0;
    $mail->SMTPAuth = true;
    $mail->Host = '[YOUR_HOST]';
    $mail->Port = 465; //Or maybe 587
    $mail->SMTPSecure = 'ssl'; //Or maybe tsl
    $mail->Username = "[YOUR_USERNAME]";
    $mail->Password = "[YOUR_PASSWORD]";

    $mail->addAddress($to, $who);
    $mail->setFrom('[YOUR_EMAIL]', '[YOUR_NAME]');  

    $mail->Subject = $subject;
    $mail->msgHTML($message);

    if (!$mail->send()) {
      echo "Mailer Error: " . $mail->ErrorInfo;
    } else {

    }  
  }

  ?>