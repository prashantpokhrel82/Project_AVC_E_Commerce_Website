
<?php
include('./php/sql_connect.php');
//print_r($_POST);
$f_name_error = $l_name_error = $email_error = $mobile_error = $gender_error = "";
$address_line_error = $street_error = $city_error = $post_code_error = $state_error = $country_error = "";
$card_number_error = $name_on_card_error = $expiry_date_error = "";

$f_name = getUserFirstName();
$l_name = getUserLastName();
$email = getUserName();
$mobile = getUserMobile();
$gender = getUserGender();

$address_line = getUserAddressLine();
$street = getUserStreet();
$city = getUserCity();
$post_code = getUserPostCode();
$state = getUserState();
$country = getUserCountry();

$card_number = getCardNumber();
$name_on_card = getCardName();
$expiry_date = getCardExpiryDate();


/*echo "$f_name
$l_name
$email
$mobile
$gender

$address_line
$street
$city
$post_code
$state
$country

$card_number
$name_on_card
$expiry_date";*/

$password = "";

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}


if($_SERVER["REQUEST_METHOD"] == "POST"){
//first name
  if (empty($_POST["f_name"])) {
    $f_name_error = " * First Name is required";
  } else {
    $f_name = test_input($_POST["f_name"]);
  }
  //last name
  if (empty($_POST["l_name"])) {
    $l_name_error = "* Last Name is required";
  } else {
    $l_name = test_input($_POST["l_name"]);
  }
  //email
  if (empty($_POST["email"])) {
    $email_error = "* Email Address is required";
  } else {
    $email = test_input($_POST["email"]);
  }
  //mobile
  if (empty($_POST["mobile"])) {
    $mobile_error = "* Mobile Number is required";
  } else {
    $mobile = test_input($_POST["mobile"]);
  }

  //gender
  if (empty($_POST["gender"])) {
    $gender_error = "* Gender is required";
  } else {
    $gender = test_input($_POST["gender"]);
  }

  //start of address
  //address_line
  if (empty($_POST["address_line"])) {
    $address_line_error = "Address Line is not set";
    //$address_line = "0";
  } else {
    $address_line = test_input($_POST["address_line"]);
  }
  //street
  if (empty($_POST["street"])) {
    $street_error = "Street Name is not set";
    //$street = "0";
  } else {
    $street = test_input($_POST["street"]);
  }

  //City

  if (empty($_POST["city"])) {
    $city_error = "City is not set";
    //$city = "0";
  } else {
    $city = test_input($_POST["city"]);
  }

  if (empty($_POST["post_code"])) {
    $post_code_error = "Post Code is not set";
    //$post_code = "0";
  } else {
    $post_code = test_input($_POST["post_code"]);
  }

  if (empty($_POST["state"])) {
    $state_error = "State is not set";
    //$state = "0";
  } else {
    $state = test_input($_POST["state"]);
  }

  if (empty($_POST["country"])) {
    $country_error = "Country not set";
    //$country = "0";
  } else {
    $country = test_input($_POST["country"]);
  }

  //start of card_details
  //card_number
  if (empty($_POST["card_number"])) {
    $card_number_error = "Card number not set";
    //$card_number = 0;
  } else {
    $card_number = test_input($_POST["card_number"]);
  }

  //name_on_card
  if (empty($_POST["name_on_card"])) {
    $name_on_card_error = "Name not set";
    //$name_on_card = "0";
  } else {
    $name_on_card = test_input($_POST["name_on_card"]);
  }
  //expiry_date
  if (empty($_POST["expiry_date"])) {
    $expiry_date_error = "Expiry Date not set";
    //$expiry_date = "0";
  } else {
    $expiry_date = test_input($_POST["expiry_date"]);
  }



  //change personal details
      if (!empty($_POST["f_name"]) && !empty($_POST["l_name"]) && !empty($_POST["mobile"]) && !empty($_POST["gender"])) {



            //echo"I am inside";
            $stmt = $conn->prepare("UPDATE customer SET f_name=?, l_name=?, email=?, mobile=?, gender=? WHERE id=?;");
            $id = getUserId();
            $stmt->bind_param("sssssi", $f_name, $l_name, $email, $mobile, $gender, $id);
            if($stmt->execute()){
              echo "Successfully Changed the Personal Details";
              //header('Location: updatePersonalDetails.php');
            }else{
              echo "Couldn't change the details. Please try again.";
            }
        }
        else {
            echo "Something missing from form.";
        }

        //change address
        if (!empty($_POST["address_line"]) && !empty($_POST["street"]) && !empty($_POST["city"]) && !empty($_POST["post_code"]) && !empty($_POST["state"]) && !empty($_POST["country"])) {

          $address_id = getUserAddressId();
          if (isset($address_id)){

            $stmt = $conn->prepare("UPDATE address SET address_line=?, street=?, city=?, post_code=?, state=?, country=? WHERE id=?;");


            $stmt->bind_param("sssissi",   $address_line, $street, $city, $post_code, $state, $country, $address_id);
            if($stmt->execute()){
              echo "<script> alert('Successfully Changed the Personal Details') </script>";
              //header('Location: updatePersonalDetails.php');
            }else{
              echo "Couldn't change the details. Please try again.";
            }

          }else{
            $stmt = $conn->prepare("INSERT INTO address (address_line, street, city, post_code, state, country) VALUES (?,?,?,?,?,?)");


            $stmt->bind_param("sssiss",   $address_line, $street, $city, $post_code, $state, $country);
            if($stmt->execute()){
              echo "<script> alert('Successfully Added the new Address') </script>";
              //header('Location: updatePersonalDetails.php');
            }else{
              echo "Couldn't add the details. Please try again.";
            }

            $sql = "SELECT * from address where address_line = '$address_line' and street = '$street' and city='$city' and post_code='$post_code' and state='$state' and country='$country';";
            $results = mysqli_query($conn, $sql);
            $address_idd = 0;

            if (mysqli_num_rows($results) > 0) {
              while($row = mysqli_fetch_assoc($results)) {

                  $address_idd = $row['id'];
                }
            }

            $id = getUserId();
            $stmt = $conn->prepare("UPDATE customer SET address_id=? WHERE id=?;");
            $stmt->bind_param("ii", $address_idd, $id);
            if($stmt->execute()){
              echo "<script> alert('Successfully Changed the Personal Details') </script>";
              //header('Location: updatePersonalDetails.php');
            }else{
              echo "Couldn't change the details. Please try again.";
            }

          }


      }

        //change card details
         if (!empty($_POST["card_number"]) && !empty($_POST["name_on_card"]) && !empty($_POST["expiry_date"]) ) {


                 $stmt = $conn->prepare("INSERT INTO card(card_number, name_on_card, expiry_date) VALUES (?,?,?);");
                 $stmt->bind_param("iss", $card_number, $name_on_card, $expiry_date);
                 if($stmt->execute()){
                   echo "Successfully Changed the Card Details";
                   //header('Location: updatePersonalDetails.php');
                 }else{
                   echo "Couldn't change the details. Please try againnn.";
                 }
                 $id = getUserId();
                 $stmt = $conn->prepare("UPDATE customer SET card_number=? WHERE id=?;");
                 $stmt->bind_param("ii", $card_number, $id);
                 if($stmt->execute()){
                   //echo "updated the card details in customer"
                 }

              }else {
            echo "Something missing from form.";
        }
    }
















?>
