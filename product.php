<?php
    require "konek.php";

    $queryCategory = mysqli_query($con, "SELECT * FROM category");

// get product by name product/keyword
    if(isset($_GET['keyword'])){
        $queryProduct = mysqli_query($con, "SELECT * FROM product WHERE nameproduct LIKE '%$_GET[keyword]%'");

    }
    // get product by category
    else if(isset($_GET['category'])){
        $queryGetCategoryId = mysqli_query($con, "SELECT idcategory FROM category WHERE namecategory = '$_GET[category]'");
        $categoryid = mysqli_fetch_array($queryGetCategoryId);
        
        $queryProduct = mysqli_query($con, "SELECT * FROM product WHERE categoryid='$categoryid[idcategory]'");
    }
    // get product default
    else{
        $queryProduct = mysqli_query($con, "SELECT * FROM product");
    }
    $countData = mysqli_num_rows($queryProduct);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NCT Shoes Shop | Product</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="fontawesome/css/all.min.css">
    <link rel="stylesheet" href="bootstrap/css/style.css">
</head>
<body>
<?php require "navbar2.php"; ?>   

<!--banner-->
<div class="container-fluid banner-product d-flex align-items-center">
    <div class="container">
        <h1 class="text-white text-center">Product</h1>
    </div>
</div>

<!--body-->
<div class="container py-5">
    <div class="row">
        <div class="col-lg-3 mb-5">
            <h3>Category</h3>
            <ul class="list-group">
                <?php while($category = mysqli_fetch_array($queryCategory)){ ?>
                    <a href="product.php?category=<?php echo $category['namecategory']; ?> ">
                        <li class="list-group-item"><?php echo $category['namecategory'];?></li>
                    </a>
                <?php } ?>
            </ul>
        </div>
            <div class="col-lg-9">
                <h3 class="text-center mb-3"> Product</h3>
                <div class="row">
                    <?php
                        if($countData<1){
                    ?>
                            <h4 class="text-center">Product Not Found </h4>
                    <?php
                        }
                    ?>

                    <?php while($product = mysqli_fetch_array($queryProduct)) { ?>
                    <div class="col-md-4 mb-4">
                        <div class="card h-100">
                            <div class="image-box">
                                <img src="image/<?php echo $product['photo'];?>" class="card-img-top" alt="...">
                            </div>
                            <div class="card-body">
                                <h4 class="card-title"><?php echo $product['nameproduct'];?></h4>
                                <p class="card-text text-price"><?php echo $product['price'];?></p>
                                <a href="product-detail.php?name=<?php echo $product['nameproduct'];?>" class="btn color2 text-white">See Product</a>
                            </div>
                        </div>
                    </div>
                <?php } ?>
                </div>
            </div>

            
        
    </div>

</div>

<?php

require "footer.php";

?>
    <script src="bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="fontawesome/js/all.min.js"></script>
</body>
</html>