<?php
    session_start();

    require_once 'php/connect.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>

        <!-- добавить на страницу favicon (иконку) Сохраните изображение в формате .ico -->
        <link rel="shortcut icon" href="img/spaort.png" type="image/x-icon">

<!-- Для разных устройств -->
<!-- Для iPad 3 с Retina-экраном высокого разрешения: -->
<link rel="apple-touch-icon-precomposed" sizes="144x144" href="img/spaort.png">
<!-- Для iPhone с Retina-экраном высокого разрешения: -->
<link rel="apple-touch-icon-precomposed" sizes="114x114" href="img/spaort.png">
<!-- Для iPad первого и второго поколения: -->
<link rel="apple-touch-icon-precomposed" sizes="72x72" href="img/spaort.png">
<!-- Для iPhone, iPod Touch без Retina и устройств с Android 2.1+: -->
<link rel="apple-touch-icon-precomposed" href="img/spaort.png">
<!-- Для других случаев - обычный favicon -->
<link rel="shortcut icon" href="img/spaort.png">
<!-- Для разных устройств -->

    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
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
                    <a href="index.php" class=" nav-link text-uppercase">Home</a>
                </li>
                <span>|</span>
                <li>
                    <a href="competitors.php" class=" nav-link text-uppercase">Competitors</a>
                </li>
                <span>|</span>
                <li>
                    <a href="coaches.php" class="active_link nav-link text-uppercase">Coaches</a>
               </li>
            </ul>
            </div>
        </nav>

         <!-- Content -->
        <div class="d-flex">
            <!-- Accaunt -->
            <div class="account">
                <p class="account_title1">Account</p>
                <?php
                    if($_COOKIE['user'] == ""):
                ?>
                <form action="php/auth.php" method="post">
                  <label for="login">Login:</label><br>
                  <input type="text" id="login" name="login" class="form-control" aria-label="Large" aria-describedby="inputGroup-sizing-sm"><br>
                  <label for="pass">Password:</label><br>
                  <input type="password" id="pass" name="pass" class="form-control" aria-label="Large" aria-describedby="inputGroup-sizing-sm"><br>
                  <div class="text-danger"><?=$_SESSION['error_auth']?></div>
                  <input type="submit" class="mt-2 btn btn-success login_btn" value="Log in" ><br>
                  <a href="php/create.php" class="btn btn-primary mt-2 create">Create account</a>
                </form> 
                            
                <?php else:?>
                <a href="/exit.php" class="btn btn-danger logout_btn">Log out</a><br>
                <a href="php/competitorForm.php" class="btn btn-primary btn_add mt-2">Add Competitor</a><br>
                <a href="php/coachForm.php" class="btn btn-primary btn_coach_add mt-2">Add Coach</a>

                <?php endif;?>

                 <!-- Search -->
                 <br><br>
                <p>SEARCH</p>
                <div class="input-group input-group-lg">
                    <form action="#">
                        <input type="text" id="elastic" placeholder="Username" class="form-control" aria-label="Large" aria-describedby="inputGroup-sizing-sm">
                    </form>
                </div>
            <!-- Search -->
            </div>
            <!-- Accaunt End -->
            <div class="row">
                 <!-- Competitors -->
            <?php 
                $coaches = mysqli_query($connect, "SELECT * FROM `coach`");
                $coaches = mysqli_fetch_all($coaches);
                foreach($coaches as $coach) {
                ?>
                <div class="col">
                <div class="elastic">
                <div class="card" style="width: 18rem;">
                    <img src="img/<?= $coach[5] ?>" alt="" class="competitor_img">
                    <div class="card-body">
                        <p id="id_info">ID: <?= $coach[0] ?> </p>
                        <h5 class="card-title"> <?= $coach[1] ?></h5>
                        <h5 class="card-title"> <?= $coach[2] ?></h5>
                        <a href="php/coachInfo.php?id=<?= $coach[0] ?>" class="btn btn-primary">Info</a>
                        <?php
                            if($_COOKIE['user'] != ""):
                        ?>
                        <a href="php/deleteCoach.php?id=<?= $coach[0] ?>" class="btn btn-danger">Delete</a>
                        <?php endif;?>
                    </div>
                </div>
                </div>
                </div>
                <?php
                }
            ?>
            </div>
             
        
            

        </div>

    </div>
            </div>
    
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    <script src="js/script.js"></script>
</body>
</html>