<?php
require 'connection.php';
if(!empty($_SESSION["id"])){
  header("Location: index.php");
}
if(isset($_POST["submit"])){
  $usernameemail = $_POST["usernameemail"];
  $password = $_POST["password"];
  $result = mysqli_query($conn, "SELECT * FROM registration  WHERE username = '$usernameemail' OR email = '$usernameemail'");
  $row = mysqli_fetch_assoc($result);
  if(mysqli_num_rows($result) > 0){
    if($password == $row['password']){
      $_SESSION["login"] = true;
      $_SESSION["id"] = $row["id"];
      header("Location: index.php");
    }
    else{
      echo
      "<script> alert('Wrong Password'); </script>";
    }
  }
  else{
    echo
    "<script> alert('User Not Registered'); </script>";
  }
}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="index.css"/>
    <title>Войти</title>
  </head>
  <body>
  <div class="container">
    <header>Войти</header>
    <form class="" action="" method="post" autocomplete="off">
    <div class="field Username">
     <div class="input-field ">
        <input type="text" name="usernameemail" id = "usernameemail" required value=""placeholder="Введите свой адрес/имя пользователя"> <br>
     </div>
    </div>
    <div class="field password">
     <div class="input-field ">
        <input type="password" name="password" id = "password" required value="" placeholder="Введите свой пароль"> <br>
     </div>
    </div>
    <div class="input-field button">
        <input type="submit"name="submit" value="Войти">
    </div>
    <p class="text_log">Чтобы пройти тест на Профориентация регистрируетесь</p>
    <br>
    <a class="text_reg" href="registration.php">Регистрация</a>
</div>

    </form>
   
  </body>
</html>