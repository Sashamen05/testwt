<?php
 
 require_once 'connect.php';


 $competitor_id = $_GET['id'];
 $competitor = mysqli_query($connect, "SELECT * FROM `competitor` WHERE `id` = '$competitor_id'");
 $competitor = mysqli_fetch_assoc($competitor);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Info</title>

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
    <link rel="stylesheet" href="../css/style.css">
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
                    <a href="../index.php" class=" nav-link text-uppercase">Home</a>
                </li>
                <span>|</span>
                <li>
                    <a href="../competitors.php" class="active_link nav-link text-uppercase">Competitors</a>
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
                <p class="account_title1">Account</p>
                <?php
                    if($_COOKIE['user'] == ""):
                ?>
                <form action="auth.php" method="post">
                  <label for="login">Login:</label><br>
                  <input type="text" id="login" name="login"><br>
                  <label for="pass">Password:</label><br>
                  <input type="password" id="pass" name="pass"><br>
                  <div class="text-danger"><?=$_SESSION['error_auth']?></div>
                  <input type="submit" class="mt-2 btn btn-success login_btn" value="Log in" ><br>
                  <a href="create.php" class="btn btn-primary mt-2 create">Create account</a>
                </form> 
                            
                <?php else:?>
                <a href="/exit.php" class="btn btn-danger logout_btn">Log out</a><br>
                <a href="competitorForm.php" class="btn btn-primary btn_add mt-2">Add Competitor</a><br>
                <a href="coachForm.php" class="btn btn-primary btn_coach_add mt-2">Add Coach</a>

                <?php endif;?>
            </div>
            <!-- Accaunt End -->


            <!-- Info -->
            <div class="d-flex juc info row">
                <div class="img_info col-6">
                    <img src="../img/<?= $competitor['avatar'] ?>" alt="" class="avatar_info">
                    <!-- <div class="poyas">
                        <div id="poyastop"></div>
                        <div id="poyasbot"></div>
                    </div> -->
                </div>
                <div class="txt_info col-6">
                    <input type="hidden" name="id" value="<?= $competitor['id'] ?>">
                    <p>ID <?= $competitor['id'] ?></p>
                    <h2><?= $competitor['name'] ?> <?= $competitor['surname'] ?></h2><br>
                    <p>Club: <?= $competitor['club'] ?></p>
                    <?php 
                        $coachs = mysqli_query($connect, "SELECT * FROM `coach`");
                        $coachs = mysqli_fetch_all($coachs);
                        // foreach($coachs as $coach) {
                    ?><br>
                    <p>Coach:  <?= $competitor['coach_name'] ?> <?= $competitor['coach_surname'] ?></p><br>
                    <a href="coachInfo.php?id=<?= $coach[0] ?>"><?= $competitor['coach'] ?></a>
                    <?php
                        // }
                    ?>
                    <p >Gip/Dan: <?= $competitor['Gip/dan'] ?></p>
                    <input type="hidden" name="" id="dan" value="<?= $competitor['Gip/dan'] ?>">
                    <?php
                        if($_COOKIE['user'] != ""):
                    ?><br>
                    <a href="update.php?id=<?= $competitor['id'] ?>" class="btn btn-primary">Update</a>

                    <?php else:?>
                    <div></div>

                    <?php endif;?>
                </div>
            </div>




        </div>

        </div>
    


    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    <script src="../js/script.js"></script>
</body>
</html>