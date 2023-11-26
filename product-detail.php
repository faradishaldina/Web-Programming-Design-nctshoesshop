<?php
    require "konek.php";
    $name = htmlspecialchars($_GET['name']);
    $queryProduct = mysqli_query($con, "SELECT * FROM product WHERE nameproduct='$name'");
    $product = mysqli_fetch_array($queryProduct);
    $queryRelatedProduct = mysqli_query($con, "SELECT * FROM product WHERE categoryid='$product[categoryid]' 
    AND idproduct!='$product[idproduct]' LIMIT 4");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NCT Shoes Shop | Detail Product</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="fontawesome/css/all.min.css">
    <link rel="stylesheet" href="bootstrap/css/style.css">
</head>
<body>
<?php require "navbar2.php"; ?>  
    <div class="container-fluid py-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-5 mb-3">
                    <img src="image/<?php echo $product['photo'];?>" class="w-100" alt="">
                </div>
                <div class="col-md-6 offset-lg-1">
                    <h1><?php echo $product['nameproduct'];?></h1>
                    <p class="fs-5" style="text-align: justify;">
                    <?php echo $product['detail'];?>
                    </p>
                    <p class="text-price">
                        Rp.<?php echo $product['price'];?>
                    </p>
                    <p class="fs-5"> Status : <strong> Available <strong> </p>
                </div>
            </div>
        </div>

    </div>

    <!--related product-->
    <div class="container-fluid py-5 color2">
        <div class="container">
            <h2 class="text-center text-white">Related Product</h2>

            <div class="row">
                <?php while($data=mysqli_fetch_array($queryRelatedProduct)) {?>
                <div class="col-md-6 col-lg-3 mb-3">
                    <a href="product-detail.php?name=<?php echo $data['nameproduct'];?>">
                    <img src="image/<?php echo $data['photo'];?>" class="img-fluid img-thumbnail" alt="">
                </a>
                </div>
                <?php } ?>
            </div>
        </div>
    </div>

    <!--footer--> 
    <?php
        require "footer.php";
    ?>
    <script src="bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="fontawesome/js/all.min.js"></script>
</body>
</html>