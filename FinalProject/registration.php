<?php
session_start();
$conn = mysqli_connect("localhost", "root", "", "testphp");


if(isset($_POST["submit"])){
  $username = $_POST["username"];
  $email = $_POST["email"];
  $number= $_POST["number"];
  $duplicate = mysqli_query($conn, "SELECT * FROM login_ WHERE username = '$username' OR email = '$email'");
  if(mysqli_num_rows($duplicate) > 0){
    echo
    "<script> alert('Имя пользователя или электронный почта ранее использовалось); </script>";
  }
  else{
      $query = "INSERT INTO login_ VALUES('','$username','$email','$number')";
      mysqli_query($conn, $query);
      echo
      "<script> alert('Ваши данные получены'); </script>";
  }
}
?>
<!DOCTYPE html>
<html>
  <head>
    <title>Бесплатный урок</title>
    <link rel="stylesheet"  href="registration.css">
  </head>
  <body>
    <div class ="all_container">
    <img  class="picture_registration" src="https://i.pinimg.com/564x/37/4c/fb/374cfb17f8a6cc014b85bb9e464ea526.jpg" >
<div class="container">
  <header>Запишитесь на бесплатный пробный урок</header>
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
    <div class="field phone_number">
    <div class="input-field ">
        <input type="number" name="number" id = "number" required value=""  placeholder="Введите свой номер телефона"> <br>
     </div>
    </div>
    <div class="input-field button">
        <input type="submit"name="submit" value="Отправить заявку">
    </div>
  </form>
  <br>
  <p class="p_lesson"><b>Оставьте свои контакты и укажите свои данные мы свяжемся с вами!</b></p>
  <a style="text-decoration:none"href="index.html">Вернуться назад</a>
    </div>
   </div>
</body>
</html>

