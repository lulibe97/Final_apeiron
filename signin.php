<?php


session_start();
$errores = [];
$email = '';

if ($_POST) {
  if( isset($_POST['remember']) ) {
    setcookie('user_logged', $_POST['email'], time() + 3600);
  }

  if (strlen($_POST["password"]) < 4) {
    $errores[] = "<div class= 'incorrect'>* Password must be more than 4 characters </div>";
  }

  if (filter_var($_POST["email"], FILTER_VALIDATE_EMAIL) == false) {
    $errores[] = "<div class= 'incorrect'>* The e-mail does not have the correct format </div><br>";
  }else{
  $email = $_POST['email'];
}

  if ($errores == []) {
    $json = file_get_contents('data/users.json');
    $users = json_decode($json, true);
    var_dump($users);
    die;




    foreach ($users as $user){
      if ($_POST['email'] === $user['email'] && password_verify($_POST['password'], $user['password'])) {
        $_SESSION['user'] = ['email' => $user['email'], 'password' => $user['password']];
        header('location: home.php');
        break;
      }
    }
  }

}
 ?>


 <!DOCTYPE html>
 <html lang="en" dir="ltr">
   <head>
     <meta charset="utf-8">
     <meta name="viewport" content="width=device-width, initial-scale=1">
     <meta http-equiv="X-UA-Compatible" content="ie=edge">
     <link rel="shortcut icon" type="image/png" href="img/apeiron_logo.png">
     <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
     <link rel="stylesheet" href="css/stylessignin.css">

     <title>Sign In</title>
   </head>
   <body>
     <section class="login-box">
           <div class="col-12">
             <img src="img/Apeiron_Logo.png" class="logo_signin" alt="logo">

           </div>
           <br><br><br>
           <div class="col-12 form">
             <form class="" action="signin.php" method="post">

               <label for="email">Email</label><br>
               <input type="text" placeholder="" name="email" value="<?=$email?>"><br>

               <label for="password">Password</label><br>
               <input type="password" placeholder="" name="password"><br>

               <label for="">Remember</label>
               <input type="checkbox" name='remember'><br>
               <br>

               <input class="justify-content-center" type="submit" value="Log In"><br>

               <?php
               if ($errores != []) {
                 foreach ($errores as $error){
                   echo $error;
                 }
               }
                ?>

                <a href="#">Forgot your password?</a><br>
                <a href="register.php">I do not have an account</a><br>
                <a href="index.php"></a><br>
             </form>
           </div>
         </section>

       </body>

 </html>
