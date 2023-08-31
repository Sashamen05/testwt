<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create</title>
    
            <!-- добавить на страницу favicon (иконку) Сохраните изображение в формате .ico -->
            <link rel="shortcut icon" href="../img/spaort.png" type="image/x-icon">

<!-- Для разных устройств -->
<!-- Для iPad 3 с Retina-экраном высокого разрешения: -->
<link rel="apple-touch-icon-precomposed" sizes="144x144" href="../img/spaort.png">
<!-- Для iPhone с Retina-экраном высокого разрешения: -->
<link rel="apple-touch-icon-precomposed" sizes="114x114" href="../img/spaort.png">
<!-- Для iPad первого и второго поколения: -->
<link rel="apple-touch-icon-precomposed" sizes="72x72" href="../img/spaort.png">
<!-- Для iPhone, iPod Touch без Retina и устройств с Android 2.1+: -->
<link rel="apple-touch-icon-precomposed" href="../img/spaort.png">
<!-- Для других случаев - обычный favicon -->
<link rel="shortcut icon" href="../img/spaort.png">
<!-- Для разных устройств -->

    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/style.css">
</head>
<body>
    <div class="container">
        <!-- Header -->
        <nav class="pt-3 navbar row nav_bot">
            <div class="col-3">
                <h1>Register online</h1>
            </div>
            <div class="col-9 nav_link">
            <ul>
                <li>
                    <a href="../index.php" class="active_link nav-link text-uppercase">Home</a>
                </li>
                <span>|</span>
                <li>
                    <a href="../competitors.php" class=" nav-link text-uppercase">Competitors</a>
                </li>
                <span>|</span>
                <li>
                    <a href="../coaches.php" class=" nav-link text-uppercase">Coaches</a>
               </li>
            </ul>
            </div>
        </nav>
         <!-- Header End -->

        <!-- Content -->
       <div class="d-flex">
           <!-- Accaunt -->
           <div class="account">
               <p class="account_title">Account</p>
               <form action="auth.php" method="post">
                 <label for="login">Login:</label><br>
                 <input type="text" id="login" name="login"><br>
                 <label for="pass">Password:</label><br>
                 <input type="password" id="pass" name="pass"><br>
                 <input type="submit" class="mt-2 btn btn-success login_btn" value="Log in" ><br>
                 <a href="create.php" class="btn btn-primary mt-2 create">Create account</a>
               </form> 
           </div>
           <!-- Accaunt End -->

           <!-- Create Account -->
           <div class="create_block">
            <h2>Create Account</h2>
            <form action="check.php" method="post">
                <label for="login">Login: </label>
                <input type="text" id="login" name="login" class="login">
                <div class="text-danger"><?=$_SESSION['error_login']?></div><br>
                <label for="name">First name: </label>
                <input type="text" name="name" id="name" class="name">
                <div class="text-danger"><?=$_SESSION['error_name']?></div><br>
                <label for="last_name">Last name: </label>
                <input type="text" name="last_name" id="last_name" class="last_name">
                <div class="text-danger"><?=$_SESSION['error_lastname']?></div><br>
                <label for="pass">Password: </label>
                <input type="password" name="pass" id="pass" class="pass">
                <div class="text-danger"><?=$_SESSION['error_pass']?></div><br>
                <label for="repass">Confirm the password: </label>
                <input type="password" name="repass" id="repass" class="repass">
                <div class="text-danger"><?=$_SESSION['error_repass']?></div><br>
                <label for="email">E-mail: </label>
                <input type="email" name="email" id="email" class="email">
                <div class="text-danger"><?=$_SESSION['error_all']?></div><br>
                <input type="submit" class="mt-2 btn btn-success reg_btn" value="Register" >
               </form>
           </div>

       </div>

   </div>
   
   <!-- JavaScript Bundle with Popper -->
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
   <script src="./js/script.js"></script>
</body>
</html>