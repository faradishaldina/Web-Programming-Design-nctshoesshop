<?php
    require "session.php";
    require "../konek.php";

    $queryCategory = mysqli_query($con, "SELECT * FROM category");
    $sumCategory = mysqli_num_rows($queryCategory);

    $queryProduct = mysqli_query($con, "SELECT * FROM product");
    $sumProduct = mysqli_num_rows($queryProduct);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../fontawesome/css/fontawesome.min.css">
</head>

<style>
    .kotak{
        border: solid;
    }

    .summary-category{
        background-color: #eab676;
        border-radius: 15px;
    }
    .summary-product{
        background-color: #a47f53;
        border-radius: 15px;
    }
    .no-decoration{
        text-decoration: none;
    }
</style>
<body>
    <?php require "navbar.php";?>
    <div class="container mt-5">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active" aria-current="page">
                <i class="fas fa-home"></i> Home
                </li>
            </ol>
        </nav>
        <h2>Halo <?php echo $_SESSION['username']; ?></h2>

        <div class="container mt-5">
            <div class="row">
                <div class="col-lg-4 col-md-6 col-12 mb-3">
                    <div class="summary-category p-3">
                        <div class="row">
                            <div class="col-6">
                                <i class="fas fa-align-justify fa-8x text-black-50"></i>
                            </div>
                            <div class="col-6">
                                    <h3 class="fs-2">Category</h3>
                                    <p class="fs-4"><?php echo $sumCategory; ?> Categories</p>
                                    <p> <a href="category.php" class="text-dark no-decoration">See Details</a></p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-12 mb-3">
                    <div class=" summary-product p-3">
                        <div class="row">
                            <div class="col-6">
                                <i class="fas fa-store fa-8x text-black-50"></i>
                            </div>
                            <div class="col-6">
                                    <h3 class="fs-2">Product</h3>
                                    <p class="fs-4"> <?php echo $sumProduct; ?> Products</p>
                                    <p> <a href="product.php" class="text-dark no-decoration">See Details</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>
    <script src="../bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../fontawesome/js/all.min.js"></script>
</body>
</html>