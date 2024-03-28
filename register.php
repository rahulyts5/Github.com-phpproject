<?php
include("dbconn.php");
if(isset($_POST['register'])){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $mobile = $_POST['mobile'];
    $password = $_POST['password'];

    $check = "SELECT * FROM user_form WHERE email = '$email' AND password = '$password'";
    $result = $conn->query($check);

    if($result->num_rows>0){
        $error[] = "user allready exist please login";
    }else{
        $insert = "INSERT INTO user_form(name,email,mobile,password) VALUES('$name','$email','$mobile','$password')";
        mysqli_query($conn,$insert);
        header("location:index.php");
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
               <h2>register</h2><br>
            <input type="text" required name="name" placeholder="USERNAME"><br><br>
            <input type="email" required name="email" placeholder="EMAIL"><br><br>
            <input type="mobile" required name="mobile" placeholder="MOBILE"><br><br>
            <input type="password" required name="password" placeholder="PASSWORD"><br><br>
            <input type="submit" name="register"value="register" class="btn btn-outline-success">
            <p>don't have an account <a href="login.php">login</a></p>
            <div><?php
                     if(isset($error)){
                        foreach($error as $error){
                            echo '<span>'.$error.'</span>';
                        }
                     }
                     ?></div>
            </center>
        </form>
    </div>
</body>
</html>