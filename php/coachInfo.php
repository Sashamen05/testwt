<?php
 
 require_once 'connect.php';


 $coach_id = $_GET['id'];
 $coach = mysqli_query($connect, "SELECT * FROM `coach` WHERE `id` = '$coach_id'");
 $coach = mysqli_fetch_assoc($coach);



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

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
                    <a href="../competitors.php" class=" nav-link text-uppercase">Competitors</a>
                </li>
                <span>|</span>
                <li>
                    <a href="../coaches.php" class="active_link nav-link text-uppercase">Coaches</a>
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
            <div class="d-flex juc main_info_coach row">
                <div class="img_info col-6">
                    <img src="../img/<?= $coach['img'] ?>" alt="" class="avatar_info">
                </div>
                <div class="txt_info col-6">
                    <input type="hidden" name="id" value="<?= $coach['id'] ?>">
                    <p>ID <?= $coach['id'] ?></p>
                    <h2><?= $coach['name'].' '.$coach['surname'] ?></h2>
                    <p>Club: <?= $coach['club'] ?></p>
                    <?php
                        if($_COOKIE['user'] != ""):
                    ?>
                    <a href="updateCoach.php?id=<?= $coach['id'] ?>" class="btn btn-primary">Update</a>
                    <?php else:?>
                    <?php endif;?>
                </div>
            </div>
            <hr>
        </div>  

        <h2 class="main_coach_competitor_title">Competitors</h2>
        
        <div class="competitor_list main_coach_competitor row"> 
            <?php
            $categories = mysqli_query($connect, "SELECT * FROM `competitor`");
        ?>
           
        <?php
                if( $cat = mysqli_fetch_assoc($categories) )
                {
                    ?>
            <?php 
            $name1 =$coach['name'];
                $competitors = mysqli_query($connect, "SELECT * FROM `competitor` WHERE `coach_name` = '$name1'");
                $competitors = mysqli_fetch_all($competitors);
                foreach($competitors as $competitor) {
                ?>
                    <div class="elastic col-4">
                        <div class="card" style="width: 18rem;">
                            <img src="../img/<?= $competitor[9] ?>" alt="" class="competitor_img">
                            <div class="card-body">
                                <p class="id">ID: <?= $competitor[0] ?> </p>
                                <h5 class="card-title"> <?= $competitor[1] ?></h5>
                                <h5 class="card-title"> <?= $competitor[2] ?></h5>
                                <a href="php/info.php?id=<?= $competitor[0] ?>" class="btn btn-primary">Info</a>
                                <?php
                                    if($_COOKIE['user'] != ""):
                                ?>
                                <a href="php/delete.php?id=<?= $competitor[0] ?>" class="btn btn-danger">Delete</a>
                                <?php endif;?>
                            </div>
                        </div>
                    </div>
                    <?php
                        }
                    ?>
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