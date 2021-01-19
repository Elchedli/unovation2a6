<?php
  require_once("Mailing/src/PHPMailer.php");
  require_once("Mailing/src/SMTP.php");
  require_once("Mailing/src/Exception.php");

  use PHPMailer\PHPMailer\PHPMailer;
  use PHPMailer\PHPMailer\SMTP;
  use PHPMailer\PHPMailer\Exception;


  $mail = new PHPMailer();
  $mail->isSMTP();
  $mail->SMTPAuth = true;
  $mail->SMTPSecure = 'ssl';
  $mail->Host = 'smtp.gmail.com';
  $mail->Port = '465';
  $mail->isHTML();
  $mail->Username = 'LibrairieHemdeni@gmail.com';
  $mail->Password = 'Unovation';
  $mail->SetFrom('test@Hamdeni.org');
  $choix = $_POST['choix'];
  $adresse = $_POST['adresse'];
  switch($choix){
    case 0:
      $client = $_POST['client'];
      $message = $_POST['message'];
      $mail->Subject = "Client: $client Adresse:$adresse";
      $mail->Body = "$message";
      $mail->AddAddress("librairehemdeni@gmail.com");
    break;
    case 1:
      $mail->Subject = "Hamdeni commande";
      $nomprod = $_POST['nomprod'];
      $prix = $_POST['prix'];
      $qte = $_POST['qte'];
      $prixT = $prix * $qte;
      $mail->Body = "Commande envoyée <br> Nom du produit: $nomprod <br> Prix: $prix x$qte <br> Prix Total: $prixT";
      $mail->AddAddress($adresse);
        
    break;
  }
  

  
  /*$mail->Subject = 'Hello world';
  $mail->Body = 'test mail';
  $mail->AddAddress("shidonosan@gmail.com");*/
  

  if($mail->Send()){
    echo "Email sent";
  }else{
    echo "yeet";
  }

  $mail->smtpClose();
?>