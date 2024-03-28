<?php
include("dbconn.php");
session_start();
if(isset($_POST['login'])){
    $email = $_POST['email'];
    $password = $_POST['password'];

    $check = "SELECT * FROM user_form WHERE email = '$email' AND password = '$password'";
    $result = mysqli_query($conn,$check);

    if($result->num_rows>0){
        while($row = $result->fetch_assoc()){
            $_SESSION['email'] = $row['email']; 
            $_SESSION['password'] = $row['password'];
            header("location:index.php");
        }
    }else{
        $error[] = "wrong email or password";
    }


}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

</head>
<body>
    <div class="form-container">
        <form action="" method="post">
            <center><br><br><br><br>
               <h2>LOGIN</h2><br>
            <input type="email" required name="email" placeholder="EMAIL"><br><br>
            <input type="password" required name="password" placeholder="PASSWORD"><br><br>
            <p>allready have an account <a href="register.php">register</a></p>
            <input type="submit" name="login" value="login" class="btn btn-outline-secondary">
            <div><?php
                     if(isset($error)){
                        foreach($error as $error){
                            echo '<span>'.$error.'</span>';
                        }
                       }
                  ?>
            </div>
            </center>
        </form>
    </div>
</body>
</html>