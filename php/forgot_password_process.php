<?php
include('./sql_connect.php');
use \PHPMailer\PHPMailer\PHPMailer;
use \PHPMailer\PHPMailer\Exception;
require ('./PHPMailer/PHPMailerAutoload.php');
require ('./PHPMailer/Exception.php');
require './PHPMailer/PHPMailer.php';
require './PHPMailer/SMTP.php';

$email = $_POST['email'];
$sql = $conn->query("SELECT * FROM customer WHERE email='$email'");
if ($sql->num_rows > 0) {
          $data = $sql->fetch_array();
          $id = $data['id'];


          $mail = new PHPMailer(true);

          $mail->isSMTP();                                      // Set mailer to use SMTP
          $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
          $mail->SMTPAuth = true;                               // Enable SMTP authentication
          $mail->Username = 'ausvintageclothing@gmail.com';                 // SMTP username
          $mail->Password = '!@!$xsphysics1!';                           // SMTP password
          $mail->SMTPSecure = 'false';                            // Enable TLS encryption, `ssl` also accepted
          $mail->Port = 587;

          $mail->From = "ausvintageclothing@gmail.com";
          $mail->FromName = "AUSTRALIAN VINTAGE CLOTHING";

          $mail->addAddress($email);
          $mail->isHTML(true);
          $mail->Subject = "AUSTRALIAN VINTAGE CLOTHING: Reset Your Password";
          //Thank you for signing up \n Please confirm your email address
          $mail->Body = "
              Click the link below to update the new password <br><br>

              <a href='localhost/Project1_Email/resetPassword.php?id=$id'>Change Password</a>
          ";

          if ($mail->send()){
              //$msg = "You have been registered! Please verify your email!";

              echo "true";

          }else{
              //$msg = "Something wrong happened! Please try again!";
              echo "Mail can't be sent";
          }


}
else{
  echo "false";
}

 ?>
