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
    <title>Update</title>

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
                <form action="php/auth.php" method="post">
                  <label for="login">Login:</label><br>
                  <input type="text" id="login" name="login"><br>
                  <label for="pass">Password:</label><br>
                  <input type="password" id="pass" name="pass"><br>
                  <div class="text-danger"><?=$_SESSION['error_auth']?></div>
                  <input type="submit" class="mt-2 btn btn-success login_btn" value="Log in" ><br>
                  <a href="php/create.php" class="btn btn-primary mt-2 create">Create account</a>
                </form> 
                            
                <?php else:?>
                <a href="/exit.php" class="btn btn-danger logout_btn">Log out</a><br>
                <a href="competitorForm.php" class="btn btn-primary btn_add mt-2">Add Competitor</a><br>
                <a href="coachForm.php" class="btn btn-primary btn_coach_add mt-2">Add Coach</a>

                <?php endif;?>
            </div>
            <!-- Accaunt End -->

                            <!-- Competitor Form -->
                    <div class="form_competitor">
                    <h2>Update Competitor</h2>
                    <form action="updateCompetitor.php" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="id" value="<?= $competitor['id'] ?>">
                        <label>First name: </label>
                        <input type="text" name="name" id="name" value="<?= $competitor['name'] ?>"><br><br>
                        <label for="surname">Last name: </label>
                        <input type="text" name="surname" id="surname" value="<?= $competitor['surname'] ?>"><br><br>
                        <label for="date">Date of birth: </label>
                        <input type="date" name="date" id="date" value="<?= $competitor['date'] ?>"><br><br>
                        <label for="dan">Gip/Dan: </label>
                        <select name="dan" id="dan">
                            <option value="<?= $competitor['Gip/Dan'] ?>"><?= $competitor['Gip/Dan'] ?></option>
                            <option value="3 (Пум, Дан)">3 (пум, дан)</option>
                            <option value="2 (Пум, Дан)">2 (пум, дан)</option>
                            <option value="1 (Пум, Дан)">1 (пум, дан)</option>
                            <option value="10 Кып">10 кып</option>
                            <option value="9 Кып">9 кып</option>
                            <option value="8 Кып">8 кып</option>
                            <option value="7 Кып">7 кып</option>
                            <option value="6 Кып">6 кып</option>
                            <option value="5 Кып">5 кып</option>
                            <option value="4 Кып">4 кып</option>
                            <option value="3 Кып">3 кып</option>
                            <option value="2 Кып">2 кып</option>
                            <option value="1 Кып">1 кып</option>
                        </select><br>   <br>      
                        <label for="sex">Sex: </label>
                        <select name="sex" id="sex" >
                            <option value="<?= $competitor['Sex'] ?>"><?= $competitor['Sex'] ?></option>
                            <option value="male">Male</option>
                            <option value="female">Female</option>
                        </select><br><br>
                        <label for="club">Club: </label>
                        <input type="text" name="club" id="club" value="<?= $competitor['club'] ?>"><br><br>
                        <label for="coach">Coach name: </label>
                        <input type="text" name="coach_name" id="coach_name" value="<?= $competitor['coach_name'] ?>"><br><br>
                        <label for="coach">Coach last name: </label>
                        <input type="text" name="coach_surname" id="coach_surname" value="<?= $competitor['coach_surname'] ?>"><br><br>
                        <label for="avatar">Avatar: </label>
                        <input type="file" name="avatar" id="avatar"><br><br>
                        <input type="submit" class="mt-3 btn btn-success reg_btn" value="Update Competitor">
                    </form>
                </div>
                </div>   

</div>





    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    <script src="js/script.js"></script>
</body>
</html>