<?php
include("dbconn.php");

if(isset($_POST['add'])){
    $product_name = $_POST['product_name'];
    $product_price = $_POST['product_price'];
    $product_img = $_FILES['image'];
    $product_imgname = $_FILES['image']['name'];
    $image_loc = $_FILES['image']['tmp_name'];
    $image_des = 'image/'.$product_imgname;
    move_uploaded_file($image_loc,'image/'.$product_imgname);


    $insert = "INSERT INTO pro(product_name,product_image,product_price) VALUES('$product_name','$image_des','$product_price')";
    if($conn->query($insert)){
        header("location:index.php");
    }else{
        echo "product not added";
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
    <center>
        <div><br><br>
        <h3>ADD PRODUCT</h3>
            <form action="" method="post" enctype="multipart/form-data">
                <input type="text" name="product_name" placeholder="product_name"><br><br><br>
                <input type="file" name="image"><br><br><br>
                <input type="text" name="product_price" placeholder="product_price"><br><br><br>
                <input type="submit" name="add" value="add" class="btn btn-primary">
            </form>
        </div>
    </center>
</body>
</html>