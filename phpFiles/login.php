<?php
    include_once "../connection.php";
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <!-- JQuery CDN -->
    <script src="https://code.jquery.com/jquery-3.6.3.js" integrity="sha256-nQLuAZGRRcILA+6dMBOvcRh5Pe310sBpanc6+QBmyVM=" crossorigin="anonymous"></script>
    <!-- google fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com"><link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Pacifico&family=Sofia+Sans:ital,wght@1,500&display=swap" rel="stylesheet">
    <!-- bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <!-- css -->
    <link rel="stylesheet" href="../styles/styles.css">
</head>
<body>
    <div class="container">
        <h1 class="title"><u>User L</u>ogin</h1>
        <p class="line">Waste Your All Time Here!!</p>
    </div>
    <div class="container text-center">
        <form action="" method="post">
          <div class="row">
            <div class="col-lg-6 col-md-12">
              <img class="vector" src="../Assets/login.png">
            </div>
            <div class="col-lg-6 col-md-12 align-self-center">
              <div class="container top">
                  <div class="row">
                      <div class="col">
                        <input id="em" name="em" type="text" class="form-control box" placeholder="User Id">
                      </div>
                      <div class="col">
                        <input id="pw" name="pw" type="password" class="form-control box" placeholder="Password">
                      </div>
                    </div>
                    <br>
                  <div class="row">
                      <button name="save" type="submit" class="btn btn-outline-success butt">Login</button>
                  </div>
                  <br>
                  <div class="jump">I don't Have an Account! <a class="link" href="../index.php" target="_blank"> Signup</a>?</div>
                </div>
              </div>
            </div>
        </form>
    </div>

    <?php
      if(isset($_POST['save'])){
        if($_POST){
          $mail = $_POST['em'];
          $password = $_POST['pw'];

          $query = "SELECT * FROM `users` WHERE `mail`='$mail'";
          $result = mysqli_query($connection, $query);
        //   echo $result;
          
          if(mysqli_num_rows($result) > 0){
            echo "You are Loggedin Successfully!";
          }else{
            echo "User Not Found!";
          }
        }
      }
    ?>
</body>
</html>
