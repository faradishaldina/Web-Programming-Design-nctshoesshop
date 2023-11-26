<?php
    require "session.php";
    require "../konek.php";

    $query = mysqli_query($con, "SELECT a.*, b.namecategory AS name_category FROM product a JOIN category b
    ON a.categoryid=b.idcategory");
    $sumProduct = mysqli_num_rows($query);

    $queryCategory = mysqli_query($con, "SELECT * FROM category");
    function generateRandomString($length = 10) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product</title>
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../fontawesome/css/fontawesome.min.css">
</head>
<style>
.no-decoration{
        text-decoration: none;
    }
    form div{
        margin-bottom: 10px;
    }
</style>
<body>

        <?php require "navbar.php";?>
            <div class="container mt-5">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item active" aria-current="page">
                            <a href="../admin" class="no-decoration text-muted">
                                <i class="fas fa-home"></i> Home
                            </a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">
                        <i class="fas fa-shoe-prints"></i> Product
                        </li>
                    </ol>
                </nav>

                <!-- add product -->
                <div class="my-5 col-12 col-md-6">
                    <h3>Add New Product</h3>
                    <form action="" method="post" enctype="multipart/form-data">
                        <div>
                            <label for="nameproduct">Name Product</label>
                            <input type="text" name="nameproduct" id="nameproduct" class="form-control" autocomplete="off" required>
                        </div>
                        <div>
                            <label for="category">Category</label>
                            <select name="category" id="category" class="form-control" required>
                                <option value="">Choose One</option>
                                <?php
                                    while($data=mysqli_fetch_array($queryCategory)){
                                      ?>
                                      <option value="<?php echo $data['idcategory'];?> "><?php echo $data['namecategory'];?></option>
                                      <?php  
                                    }
                                ?>
                            </select>
                        </div>
                        <div>
                            <label for="price">Price</label>
                            <input type="number" class="form-control" name="price" required>
                        </div>
                        <div>
                            <label for="photo">Photo</label>
                            <input type="file" name="photo" id="photo" class="form-control">
                        </div>
                        <div>
                            <label for="detail">Detail</label>
                            <textarea name="detail" id="detail" cols="30" rows="10" class="form-control"></textarea>
                        </div>
                        <div>
                            <label for="status">Status</label>
                            <select name="status" id="status" class="form-control">
                                <option value="available">Available</option>
                                <option value="soldout">Sold out</option>
                            </select>
                        </div>
                        <div>
                            <button type="submit" class="btn btn-primary" name="save">Save</button>
                        </div>
                    </form>
                    <?php
                        if(isset($_POST['save'])){
                            $nameproduct = htmlspecialchars($_POST['nameproduct']);
                            $category = htmlspecialchars($_POST['category']);
                            $price = htmlspecialchars($_POST['price']);
                            $status = htmlspecialchars($_POST['status']);
                            $detail = htmlspecialchars($_POST['detail']);
                            $target_dir = "../image/";
                            $filename = basename($_FILES["photo"]["name"]);
                            $target_file = $target_dir . $filename;
                            $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
                            $image_size = $_FILES["photo"]["size"];
                            echo $target_dir."<br>";
                            echo $filename."<br>";
                            echo $target_file."<br>";
                            echo $imageFileType."<br>";
                            echo $image_size."<br>";
                            $random_name = generateRandomString(20);
                            $new_name = $random_name . "." . $imageFileType;

                            if($nameproduct=='' || $category=='' || $price==''){
                            ?>
                                <div class="alert alert-warning mt-3" role="alert">
                                Required data! Please fill in the data
                                </div>
                            <?php

                            } else {
                                if($filename!=''){
                                    if($image_size > 50000000){
                                        ?>
                                        <div class="alert alert-warning mt-3" role="alert">
                                        File size shouldnt more than 500kb!
                                        </div>
                                        <?php
                                    }else{
                                        if($imageFileType != 'jpg' && $imageFileType != 'png' && $imageFileType != 'gif'){
                                            ?>
                                            <div class="alert alert-warning mt-3" role="alert">
                                            Just jpg, png, and gif are allowed!
                                            </div>
                                            <?php
                                        } else {
                                            move_uploaded_file($_FILES["photo"]["tmp_name"], $target_dir . $new_name) ;
                                        }
                                    }
                                }
                                // query insert to product table
                                $queryAdd = mysqli_query($con, "INSERT INTO product (categoryid, nameproduct, price, photo, detail, status) VALUES 
                                ('$category', '$nameproduct', '$price', '$new_name' , '$detail' , '$status')"); 
                                if($queryAdd){
                                    ?>
                                    <div class="alert alert-warning mt-3" role="alert">
                                        Product saved successfully!
                                        </div>
                                        <meta http-equiv="refresh" content="1; url=product.php">
                                    <?php
                                } else {
                                    echo mysqli_error($con);
                                }
                            }
                        }
                    ?>
                </div>

                <div class="mt-3 mb-5">
                    <h2>Products List</h2>

                    <div class="table-responsive mt-5">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Product Name</th>
                                    <th>Category</th>
                                    <th>Price</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if($sumProduct==0){
                                    ?>
                                        <tr>
                                            <td colspan=6 class="text-center"> Data Product is unavailable!</td>
                                        </tr>
                                    <?php
                                } else {
                                    $sum = 1;
                                    while($data=mysqli_fetch_array($query)){
                                        ?> 
                                            <tr>
                                                <td><?php echo $sum; ?></td>
                                                <td><?php echo $data['nameproduct'];?> </td>
                                                <td><?php echo $data['name_category'];?></td>
                                                <td><?php echo $data['price'];?></td>
                                                <td><?php echo $data['status'];?></td>
                                                <td>
                                                <a href="product-detail.php?p=<?php echo $data['idproduct']; ?>"
                                                class="btn btn-info"><i class="fas fa-search"></i></a>
                                                </td>
                                            </tr>
                                        <?php
                                        $sum++;
                                    }
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
    <script src="../bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../fontawesome/js/all.min.js"></script>
</body>
</html>