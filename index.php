<?php
    include_once "./connection.php";
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup Page</title>

    <!-- JQuery CDN -->
    <script src="https://code.jquery.com/jquery-3.6.3.js" integrity="sha256-nQLuAZGRRcILA+6dMBOvcRh5Pe310sBpanc6+QBmyVM=" crossorigin="anonymous"></script>
    <!-- google fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com"><link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Pacifico&family=Sofia+Sans:ital,wght@1,500&display=swap" rel="stylesheet">
    <!-- bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <!-- css -->
    <link rel="stylesheet" href="./styles/styles.css">
</head>
<body>
    <div class="container">
        <h1 class="title"><u>User S</u>ignup</h1>
        <p class="line">Really Want an  New Account?!</p>
    </div>
    <br>
    <form method="post" action="">
      <div class="container text-center">
        <div class="row">
          <div class="col-lg-6 col-md-12">
            <img class="vector" src="./Assets/signup.png">
          </div>
          <div class="col-lg-6 col-md-12 align-self-center">
            <div class="container">
                <div class="row">
                    <div class="col-6">
                      <input id="em" name="em" type="text" class="form-control box" placeholder="User Id">
                    </div>
                    <div class="col-6">
                      <input id="pw1" name="pw1" type="password" class="form-control box" placeholder="Password">
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-6">
                      <input id="age" name="age" type="number" class="form-control box" placeholder="Age">
                    </div>
                    <div class="col-6">
                      <input id="pw2" name="pw2" type="password" class="form-control box" placeholder="Re-Enter Password">
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-6">
                      <input id="ctry" name="ctry" type="text" class="form-control box" placeholder="Country">
                    </div>
                    <div class="col-6">
                      <input id="sta" name="sta" type="text" class="form-control box" placeholder="State">
                    </div>
                </div>
                  <br>
                <div class="row">
                    <button type="submit" name="save" class="btn btn-outline-success butt">Signup</button>
                    <!-- onclick=isValid() -->
                </div>
                <br>
                <div class="jump">I already Have an Account! <a class="link" href="./phpFiles/login.php"> Login</a>?</div>
              </div>
            </div>
          </div>
      </div>
    </form>

    <script>
      function isValid(){
        var email = $("#em").val();
        var password1 = $("#pw1").val();
        var password2 = $("#pw2").val();
        var age = $("#age").val();
        var country = $("#ctry").val();
        var state = $("#sta").val();

        if(!/^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,3})+$/.test(email)){
          alert("Enter a Valid Email!");
        }

        if(password1 == password2){
          if(password1<=8){
            alert("Enter Password is too short!");
          }else if(password1>=16){
            alert("Enter Password is too long!");
          }
        }else{
          alert("Password Don't Match!");
        }

        if(age != ""){
          if(age<=13){
            alert("You are not Old Enough to create a new account!");
          }else{
            if(age>=100){
              alert("I think thats a fake age!");
            }
          }
        }else{
          alert("Enter Your Age!");
        }

        if(country == "" || state==""){
          alert("State & Country must be Specified");
        }
      };
    </script>

    <?php
      if(isset($_POST['save'])){
        if($_POST){
          $mail = $_POST['em'];
          $password = $_POST['pw1'];
          $age = $_POST['age'];
          $state = $_POST['sta'];
          $country = $_POST['ctry'];

          $query = "SELECT * FROM `users` WHERE `mail`='$mail'";
          $result = mysqli_query($connection, $query);
          
            if ($result == false){
                echo "Error has occurred!";
            }
            elseif (mysqli_num_rows($result) > 0){
                echo "User Already Exists!";
            }
            else{
            $query = "INSERT INTO `users`(`mail`, `password`, `age`, `country`, `state`) VALUES ('$mail','$password','$age','$country','$state')";
            $result = mysqli_query($connection, $query);
            echo "User Added Successfully!";
            }
          
          
        //   $count = mysql_num_rows($result);

        //   if($count > 0){
        //     echo "User Already Exists!";
        //   }else{
        //     $query = "INSERT INTO `users`(`mail`, `password`, `age`, `country`, `state`) VALUES ('$mail','$password','$age','$country','$state')";
        //     $result = mysqli_query($connection, $query);
        //     echo "User Added Successfully!";
        //   }
        }
      }
    ?>
</body>
</html>