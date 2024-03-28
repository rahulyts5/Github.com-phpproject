<?php
include("dbconn.php");
session_start();
if(!isset($_SESSION['email'] , $_SESSION['password'])){
    header("location:login.php");
}
if(isset($_POST['add_to_cart'])){
    $error[] = "item added";
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
    <nav>
        <?php include("header.php");?>
    </nav><br>
    <a href="add_product.php" class="btn btn-primary">add product</a><br>
    <center>
    <div><?php
                     if(isset($error)){
                        foreach($error as $error){
                            echo '<span>'.$error.'</span>';
                        }
                       }
                  ?>
            </div>
    </center><br><br>
    <section>
        <div>
        <table class="table">
  <thead>
    <tr>
      <th scope="col">id</th>
      <th scope="col">product_name</th>
      <th scope="col">product_image</th>
      <th scope="col">product_price</th>
      <th>action</th>
      <th>cart</th>
    </tr>
  </thead>
  <tbody>
    <form action="" method="post">
    <?php
    include("dbconn.php");
    $read = "SELECT * FROM `pro`";
    $result = $conn->query($read);
    if($result->num_rows>0){
    while($row = $result->fetch_assoc()){
        $_SESSION['cart'] = $row['product_id'];
            ?>
            <tr>
            <td scope="row"><?php echo $row['product_id'];?></td>
            <td><?php echo $row['product_name'];?></td>
            <td><img src="<?php echo $row['product_image'] ?>" width="200px"height="75px"></td>
            <td><?php echo $row['product_price'];?></td>
            <td><a href="delete.php?id=<?php echo $row['product_id'];?>" class="btn btn-outline-danger">delete</a>
                <a href="update.php?id=<?php echo $row['product_id'];?>"class="btn btn-outline-secondary">update</a>
            </td>
            <!-- <td><input type="hidden" name="product_id" value="<?php echo $row['product_id'];?>"></td> -->
            <td><input type="submit" name="add_to_cart" class="btn btn-outline-info" value="add to cart"> </td>
           </tr>
           </form>
           </tbody>
            <?php
        }
    }
    ?>
    
</table>
<a href="logout.php" class="btn btn-danger ">logout</a>
        </div>
    </section>
</body>
</html>