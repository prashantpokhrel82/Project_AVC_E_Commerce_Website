
<?php
include('./sql_connect.php');

//$first_name_error = $last_name_error = $email_error = $password_error = $mobile_error = $gender_error = "";
//$first_name = $last_name = $email = $password = $mobile = "";
	//$msg = "";

  use \PHPMailer\PHPMailer\PHPMailer;
  use \PHPMailer\PHPMailer\Exception;
  require ('./PHPMailer/PHPMailerAutoload.php');
  require ('./PHPMailer/Exception.php');
  require './PHPMailer/PHPMailer.php';
  require './PHPMailer/SMTP.php';




	if($_SERVER["REQUEST_METHOD"]=="POST"){


		$first_name = $conn->real_escape_string($_POST['first_name']);
    $last_name = $conn->real_escape_string($_POST['last_name']);
		$email = $conn->real_escape_string($_POST['email']);
		$password = $_POST['password'];
    $mobile = $conn->real_escape_string($_POST['mobile']);
    $gender = $conn->real_escape_string($_POST['gender']);
    $email_confirmation = 0;
		//$cPassword = $conn->real_escape_string($_POST['cPassword']);


			$sql = $conn->query("SELECT id FROM customer WHERE email='$email'");
			if ($sql->num_rows > 0) {
				echo false;
				//$msg = "Email already exists in the database!";

				//echo "$msg";
			} else {
				//echo"inside";
				$token = 'qwertzuiopasdfghjklyxcvbnmQWERTZUIOPASDFGHJKLYXCVBNM0123456789!$/()*';
				$token = str_shuffle($token);
				$token = substr($token, 0, 10);
				$hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        //echo "<script>alert('$hashedPassword')</script>";

				//$conn->query("insert into customer (f_name, l_name, password, email, mobile, gender, isEmailConfirmed, token) VALUES ('$first_name', '$last_name', '$hashedPassword', '$email', '$mobile', '$gender' '0', '$token');");
								$location = "localhost/Project1_Email/php/confirmEmail.php";
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
                $mail->Subject = "AUSTRALIAN VINTAGE CLOTHING: Confirm your email address";
                //Thank you for signing up \n Please confirm your email address
                $mail->Body = "
                    Thank you for signing up \n Please confirm your email address by clicking the link below: <br><br>

                    <a href=$location?email=$email&token=$token>Click Here</a>
                ";

                if ($mail->send()){
                    //$msg = "You have been registered! Please verify your email!";
										//echo"mail sent";
                    //echo "You have been registered! Please verify your email!";
                    $stmt = $conn->prepare("insert into customer (f_name, l_name, password, email, mobile, gender, isEmailConfirmed, token)
                    values(?, ?, ?, ?, ?, ?, ?, ?);");
                    $stmt->bind_param("ssssssis", $first_name, $last_name, $hashedPassword, $email, $mobile, $gender, $email_confirmation, $token);
                    if($stmt->execute()){
                      //echo '<script>swal("Congratulations", "Account Successfully Created", "success");</script>';
											echo true;
											//echo "inserted in database";
                      //header('Location: login.php');
                    }else{
                      //echo "<script>alert('Unsuccessful to create an account')</script>";
											echo false;
											//echo "can't store in database";
                    }
                }else{
                    //$msg = "Something wrong happened! Please try again!";
                    //echo "<script>alert('Something wrong happened! Please try again!')</script>";
										echo false;
										//echo "mail not set";
                }
			}

	}else{
		echo false;
	}


?>
