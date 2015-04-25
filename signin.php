<?php
session_start();
$_SESSION['name'];
$_SESSION['role'];
?>
<html>
<head>
  <title></title>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <link rel="stylesheet" href="main.css">
</head>

<body>

<?php

echo <<<HERE
	<div class="wrapper">
	<header><h1>Регистрация</h1></header>
	<div class="form">
	<form method = "POST" action ="signin.php" >

		<input type ="text" name = "email" placeholder = "e-mail" required><br/>
    <input type ="password" name = "password" placeholder = "password" required><br/>
		<input type="submit" name ="button" value = "Войти">
	</form>
  </div>
  <a class="right" href="register.php">Зарегистрироваться</a>
  <a class="left" href ="index.php">Вернуться к заказам</a>
  </div>
HERE;
  if(isset($_POST['button']))
  {
  	if (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL))
  	{
      $hash = md5($_POST['password']);
      $user = $_POST['email'];
      $b=false;
      $fp = fopen('users.csv','r');
      while(($data = fgetcsv($fp, 100, ','))!==FALSE){
        
        if(($data[0]==$user)&&($data[2]==$hash))
        {
            echo 'Вы успешно вошли, '.$data[1];
            $_SESSION['name'] = $data[1];
            $_SESSION['role'] = $data[3]; 
            $b=true;
            break;
        }
      }
      if(!$b)
        echo 'Такой пользователь не найден';
      
    }
    else echo 'Некорректный ввод';
  }

?>