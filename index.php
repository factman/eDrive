<?php

require_once './libs/sql.php';

$eDriveDb = new eDriveSQL();

if(isset($_GET["login"]) && isset($_POST["submit"])) {
  $mail = filter_input(INPUT_POST, "mail", FILTER_VALIDATE_EMAIL);
  $pass = filter_input(INPUT_POST, "pass");
  
  if(!$eDriveDb->checkEmail($mail)){
    if($eDriveDb->AuthPassword($mail, $pass)){
      setcookie("sid", $mail, strtotime('+24 hours'));
      header("Location: dashboard.php");
    }
    else{
      setcookie("error", "Invalid Email Address or Password.", strtotime('+1 minute'));
      header("Location: index.php");
    }
  }
  else {
    setcookie("error", "Invalid Email Address or Password.", strtotime('+1 minute'));
    header("Location: index.php");
  }
}
elseif(isset($_GET["reg"]) && isset($_POST["submit"])) {
  $name = filter_input(INPUT_POST, "name", FILTER_SANITIZE_STRING);
  $mail = filter_input(INPUT_POST, "mail", FILTER_VALIDATE_EMAIL);
  $pass = filter_input(INPUT_POST, "pass");
  
  if($eDriveDb->checkEmail($mail)){
    $hash = password_hash($pass, PASSWORD_DEFAULT);
    
    $eDriveDb->saveUser($name, $mail, $hash);
    setcookie("sid", $mail, strtotime('+24 hours'));
    header("Location: dashboard.php");
  } 
  else {
    setcookie("error", "Invalid Email Address, It's already used by another user.", strtotime('+1 minute'));
    header("Location: index.php");
  }
}
else {
  if(!isset($_COOKIE["sid"])) {
    include './home.php';
  }
  else {
    header("Location: dashboard.php");
  }
}