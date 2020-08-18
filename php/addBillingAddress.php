<?php
include('./php/sql_connect.php');
//print_r($_POST);



function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}


if($_SERVER["REQUEST_METHOD"] == "POST"){


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



          if (!empty($_POST["address_line"]) && !empty($_POST["street"]) && !empty($_POST["city"]) && !empty($_POST["post_code"]) && !empty($_POST["state"]) && !empty($_POST["country"])) {

            $address_id = getUserAddressId();
            $stmt = $conn->prepare("UPDATE address SET address_line=?, street=?, city=?, post_code=?, state=?, country=? WHERE id=?;");


            $stmt->bind_param("sssissi",   $address_line, $street, $city, $post_code, $state, $country, $address_id);
            if($stmt->execute()){
              echo "<script> alert('Successfully Changed the Personal Details') </script>";
              //header('Location: updatePersonalDetails.php');
            }else{
              echo "Couldn't change the details. Please try again.";
            }

        }
  else {
      echo "Something missing from form.";
  }




}
















?>
