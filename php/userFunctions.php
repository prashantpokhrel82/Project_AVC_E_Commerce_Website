<?php
//include 'sql_connect.php';

  function isUserLoggedIn(){
    if((!isset($_SESSION['username']))||($_SESSION['username']==''))
    	{
    		return false;
      }
      else {
        return true;
      }
  }

  function getGrandTotalPrice(){
    if(isUserLoggedIn()){
      $customerID=$_SESSION["customerID"];
      $sql="SELECT * FROM item JOIN cart ON item.id = cart.item_id WHERE customer_id=$customerID";
      $conn = $GLOBALS['conn'];
      $result=mysqli_query($conn,$sql);
      $grand_total = 0;
      while($row = mysqli_fetch_assoc($result)) {
          //echo $row["name"]." ".$row["price"]." ".$row["quantity"]."<br>";
        $grand_total =$grand_total + $row["price"]*$row["quantity"];
        return $grand_total;
      }  //close while
    }else{
      return 0;
    }//close if else
  }

  function getUserName(){
    if((!isset($_SESSION['username']))||($_SESSION['username']==''))
    	{
    		return "";
      }
      else{
        return $_SESSION['username'];
      }

  }


  function getUserId(){
    require('sql_connect.php');
    $userName = getUserName();
    $sql = "SELECT id FROM CUSTOMER WHERE email = '$userName';";
    if($result = mysqli_query($conn, $sql)){
      $row = mysqli_fetch_assoc($result);
      return $row['id'];
    }
    else{
      return 'nothing returned';
    }

  }

  function getUserFirstName(){
    require('sql_connect.php');
    $userName = getUserName();
    $id = getUserId();
    $sql = "SELECT f_name FROM CUSTOMER WHERE id = '$id';";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    return $row['f_name'];
  }

  function getUserLastName(){
    require('sql_connect.php');
    $userName = getUserName();
    $sql = "SELECT l_name FROM CUSTOMER WHERE email = '$userName';";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    return $row['l_name'];
  }

  function getUserMobile(){
    require('sql_connect.php');
    $userName = getUserName();
    $sql = "SELECT mobile FROM CUSTOMER WHERE email = '$userName';";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    return $row['mobile'];
  }

  function getUserGender(){
    require('sql_connect.php');
    $userName = getUserName();
    $sql = "SELECT gender FROM CUSTOMER WHERE email = '$userName';";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    return $row['gender'];
  }

  function getUserAddressId(){
    require('sql_connect.php');
    $userName = getUserName();
    $sql = "SELECT address_id FROM CUSTOMER WHERE email = '$userName';";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    return $row['address_id'];
  }

  function getUserAddressLine(){
    require 'sql_connect.php';
    $address_id = getUserAddressId();
    $sql = "SELECT address_line FROM ADDRESS WHERE id = '$address_id';";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    return $row['address_line'];
  }

  function getUserStreet(){
    require 'sql_connect.php';
    $address_id = getUserAddressId();
    $sql = "SELECT street FROM ADDRESS WHERE id = '$address_id';";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    return $row['street'];
  }

  function getUserCity(){
    require 'sql_connect.php';
    $address_id = getUserAddressId();
    $sql = "SELECT city FROM ADDRESS WHERE id = '$address_id';";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    return $row['city'];
  }

  function getUserPostCode(){
    require 'sql_connect.php';
    $address_id = getUserAddressId();
    $sql = "SELECT post_code FROM ADDRESS WHERE id = '$address_id';";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    return $row['post_code'];
  }

  function getUserState(){
    require 'sql_connect.php';
    $address_id = getUserAddressId();
    $sql = "SELECT state FROM ADDRESS WHERE id = '$address_id';";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    return $row['state'];
  }

  function getUserCountry(){
    require 'sql_connect.php';
    $address_id = getUserAddressId();
    $sql = "SELECT country FROM ADDRESS WHERE id = '$address_id';";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    return $row['country'];
  }

  function getCardNumber(){
    require('sql_connect.php');
    $userName = getUserName();
    $sql = "SELECT card_number FROM CUSTOMER WHERE email = '$userName';";
    $result = mysqli_query($conn, $sql);
    if($result){
      $row = mysqli_fetch_assoc($result);
      return $row['card_number'];
    }
    else{
      return -1;
    }

  }

  function getCardName(){
    require 'sql_connect.php';
    $cardNumber = getCardNumber();
    $sql = "SELECT name_on_card FROM card WHERE card_number = '$cardNumber';";
    $result = mysqli_query($conn, $sql);
    if($result){
      $row = mysqli_fetch_assoc($result);
      return $row['name_on_card'];
    }
    else{
      return "Name on the Card";
    }

  }

  function getCardExpiryDate(){
    require 'sql_connect.php';
    $cardNumber = getCardNumber();
    $sql = "SELECT expiry_date FROM card WHERE card_number = '$cardNumber';";
    $result = mysqli_query($conn, $sql);
    if($result){
      $row = mysqli_fetch_assoc($result);
      return $row['expiry_date'];
    }
    else{
      return "yyyy-mm-dd";
    }
  }

  






?>
