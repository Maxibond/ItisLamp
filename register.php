<?php
session_start();
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
	<header><h1>Авторизация</h1></header>
	<div class="form">
	<form method = "POST" action ="register.php" >

		<input type ="text" name = "email" placeholder = "e-mail" required><br/>
    <input type ="text" name = "name" placeholder = "name" required><br/>
    <input type ="password" name = "password" placeholder = "password" required><br/>
    <input type ="password" name = "r_password" placeholder = "repeat password" required><br/>
		<input type="submit" name ="button" value = "Зарегистрироваться">
	</form>
	</div>
	</div>
HERE;

  if(isset($_POST['button']))
  {

  	if (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)&&($_POST['password']==$_POST['r_password']))
  	{
      $fp = fopen('users.csv','r');
      $user = $_POST['email'];
      $b = false;
  		while(($data = fgetcsv($fp, 100, ','))!==FALSE){
        if($data[0]==$user)
        {
          echo 'Пользователь с таким e-mail уже существует';
          $b = true;
          break;
        }
      }
        if($b==false){
          $hash = md5($_POST['password']);
          
          $fp = fopen('users.csv','a');
          $list = array($_POST['email'], $_POST['name'], $hash,'user');
          fputcsv($fp, $list);
          fclose($fp);
          echo 'Вы успешно зарегистрированы';
        
      }
      
  	}
  	
    else echo 'Некорректный ввод';
  }

?>
</body>
</html>