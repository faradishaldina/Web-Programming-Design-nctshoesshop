<?php
require "konek.php";
$queryProduct = mysqli_query($con, "SELECT idproduct, nameproduct, price, photo, detail FROM product LIMIT 6");
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NCT Shoes Shop | Home</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="fontawesome/css/all.min.css">
    <link rel="stylesheet" href="bootstrap/css/style.css">
</head>


<body>
    <?php require "navbar2.php";?>
    <!-- banner -->
    <div class="container-fluid banner d-flex align-items-center">
        <div class="container text-center text-white">
        <h1> NCT SHOES SHOP </h1>
        <h3> What are you looking for? </h3>
        <div class="col-md-8 offset-md-2">
            <form method="get" action="product.php">
                <div class="input-group input-group-lg my-4">
                    <input type="text" class="form-control" placeholder="Search Product" aria-label="Recipient's username" aria-describedby="basic-addon2" name="keyword">
                    <button type="submit" class="btn color2 text-white">Search</button>
                </div>
            </form>
        </div>

        </div>
    </div>

     <!-- hightlight category -->
     <div class="container-fluid py-5">
        <div class="container text-center">
            <h3>Best Category</h3>
            <div class="row mt-5">
                <div class="col-sm-6 col-md-4 mb-3">
                    <div class="highlighted-category category1 d-flex justify-content-center
                    align-items-center">
                    <h4 class="text-white"><a href="product.php?category=Old Skool Sneakers">Old Skool Sneakers</a></h4>
                    </div>
                </div>
                <div class="col-sm-6 col-md-4 mb-3">
                    <div class="highlighted-category category2 d-flex justify-content-center
                    align-items-center">
                    <h4 class="text-white"><a href="product.php?category=Canvas Sneakers">Canvas Sneakers</a></h4>
                    </div>
                </div>
                <div class="col-sm-6 col-md-4 mb-3">
                    <div class="highlighted-category category3 d-flex justify-content-center
                    align-items-center">
                    <h4 class="text-white"><a href="product.php?category=Kpop Sneakers">K-Pop Sneakers</a></h4>
                    </div>
                </div>

            </div>
        </div>
     </div>

     <!--about us-->
    <div class="container-fluid color3 py-5">
        <div class="container text-center">
            <h3>ABOUT US</h3>
            <h4> Wecome to NCT Shoes Shop <br> We sell local brand shoes with perfect quality</h4>
            <p> Shoes look cool and sporty Soft, <br> Light and Stretchy Shoes <br> Sport Casual Shoes that are suitable for all types of sports </p>
        </div>
    </div>

    <!--product-->
    <div class="container-fluid py-5">
        <div class="container text-center">
            <h3>Product</h3>
            <div class="row mt-5">
                <?php while($data = mysqli_fetch_array($queryProduct)){?>
                <div class="col-sm-6 col-md-4 mb-3">
                    <div class="card h-100">
                        <div class="image-box">
                        <img src="image/<?php echo $data['photo'];?>" class="card-img-top" alt="...">
                        </div>
                        <div class="card-body">
                            <h4 class="card-title"><?php echo $data['nameproduct'];?></h4>
                             <p class="card-text text-price"><?php echo $data['price'];?></p>
                             <a href="product-detail.php?name=<?php echo $data['nameproduct'];?>" class="btn color2 text-white">See Product</a>
                        </div>
                    </div>
                </div>
                <?php } ?>
            </div>
            <a class= "btn btn-outline-warning mt-3 p-3 fs-2" href="product.php"> See More </a>
        </div>
    </div>
<!--footer-->
<?php require "footer.php";?>

    <script src="bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="fontawesome/js/all.min.js"></script>
</body>
</html>