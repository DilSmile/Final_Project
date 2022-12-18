<?php
require 'connection.php';
if(!empty($_SESSION["id"])){
  header("Location: index.php");
}
if(isset($_POST["submit"])){
  $username = $_POST["username"];
  $email = $_POST["email"];
  $password = $_POST["password"];
  $confirmpassword = $_POST["confirmpassword"];
  $duplicate = mysqli_query($conn, "SELECT * FROM registration WHERE username = '$username' OR email = '$email'");
  if(mysqli_num_rows($duplicate) > 0){
    echo
    "<script> alert('Username or Email Has Already Taken'); </script>";
  }
  else{
    if($password == $confirmpassword){
      $query = "INSERT INTO registration VALUES('','$username','$email','$password')";
      mysqli_query($conn, $query);
      echo
      "<script> alert('Registration Successful'); </script>";
    }
    else{
      echo
      "<script> alert('Password Does Not Match'); </script>";
    }
  }
}
?>
<!DOCTYPE html>
<html>
  <head>
    <title>Регистрация</title>
    <link rel="stylesheet"  href="index.css"/>
  </head>
  <body>
<div class="container">
  <header>Регистрация</header>
  <form class="" action="" method="post" autocomplete="off" >
    <div class="field Username">
    <div class="input-field ">
        <input type="text" name="username" id = "username"  placeholder="Введите свое имя пользователя" required value=""> <br>
     </div>
    </div>  
    <div class="field email">
    <div class="input-field ">
        <input type="email" name="email" id = "email" required value=""  placeholder="Введите свой адрес электронной почты"> <br>
     </div>
    </div>
    <div class="field password">
    <div class="input-field ">
        <input type="password" name="password" id = "password" required value=""  placeholder="Введите свой пароль"> <br>
     </div>
    </div>
    <div class="field cPasword">
     <div class="input-field ">
        <input type="password" name="confirmpassword" id = "confirmpassword" required value=""  placeholder="Подвердите свой пароль"> <br>
     </div>
    </div>
    <div class="input-field button">
        <input type="submit"name="submit" value="Отправить">
    </div>
  </form>
    <p class="text_log">После регистаций вернитесь на страницу Войти чтобы пройти тест</p>
    <br>
  <a class="text_log2"href="login.php">Войти</a>

</div>
