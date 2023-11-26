<?php
    require "session.php";
    require "../konek.php";

    $idproduct = $_GET['p'];

    $query = mysqli_query($con, "SELECT a.*, b.namecategory AS name_category FROM product a JOIN category b
    ON a.categoryid=b.idcategory WHERE idproduct = '$idproduct'");
    $data = mysqli_fetch_array($query);

    $queryCategory = mysqli_query($con, "SELECT * FROM category WHERE idcategory!='$data[categoryid]'");
    
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
    <title>Product Detail</title>
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
</head>
<style>
       form div{
        margin-bottom: 10px;
    }
</style>
<body>
<?php 
    require "navbar.php"; ?>
    <div class="container mt-5">
        <h2>Detail Product</h2>
        <div class="col-12 col-md-6 mb-5">
            <form action="" method="post" enctype="multipart/form-data">
            <div>
                <label for="nameproduct">Name Product</label>
                <input type="text" name="nameproduct" id="nameproduct" value="<?php echo $data['nameproduct']; ?>" class="form-control" autocomplete="off" required>
            </div>

            <div>
                <label for="category">Category</label>
                    <select name="category" id="category" class="form-control" required>
                        <option value="<?php echo $data['categoryid'];?>"><?php echo $data['name_category'];?></option>
                        <?php
                            while($dataCategory=mysqli_fetch_array($queryCategory)){
                        ?>
                              <option value="<?php echo $dataCategory['idcategory'];?> "><?php echo $dataCategory['namecategory'];?></option>
                        <?php  
                                    }
                         ?>
                    </select>
            </div>
            <div>
                <label for="price">Price</label>
                <input type="number" class="form-control" value="<?php echo $data['price'];?>" name="price" required>
            </div>
            <div>
                <label for="currentFoto">Now Product</label>
                <img src="../image/<?php echo $data['photo']?>" alt="" width="300px">
            </div>
            <div>
                <label for="photo">Photo</label>
                <input type="file" name="photo" id="photo" class="form-control">
            </div>
            <div>
                <label for="detail">Detail</label>
                <textarea name="detail" id="detail" cols="30" rows="10" class="form-control">
                    <?php echo $data['detail'];?>
                </textarea>
            </div>
            <div>
                <label for="status">Status</label>
                <select name="status" id="status" class="form-control">
                    <option value="<?php echo $data['status']?>"><?php echo $data ['status']?></option>
                    <?php
                        if($data['status']=='available'){
                    ?>
                            <option value="soldout">Sold Out</option>
                    <?php
                        }else{
                    ?>
                        <option value="available">Available</option>
                    <?php
                        }
                    ?>
                </select>
            </div>
            <div>
                <button type="submit" class="btn btn-primary" name="save">Save</button>
                <button type="submit" class="btn btn-danger" name="delete">Delete</button>
            </div>
            </form>
            <?php
            if(isset($_POST['save'])){
                $nameproduct = htmlspecialchars($_POST['nameproduct']);
                $category = htmlspecialchars($_POST['category']);
                $price = htmlspecialchars($_POST['price']);
                $detail = htmlspecialchars($_POST['detail']);
                $status = htmlspecialchars($_POST['status']);
                $target_dir = "../image/";
                $filename = basename($_FILES["photo"]["name"]);
                $target_file = $target_dir . $filename;
                $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
                $image_size = $_FILES["photo"]["size"];
                $random_name = generateRandomString(20);
                $new_name = $random_name . "." . $imageFileType;

                if($nameproduct=='' || $category=='' || $price==''){
                ?>
                    <div class="alert alert-warning mt-3" role="alert">
                    Required data! Please fill in the data
                    </div>
                <?php
                } else {
                    $queryUpdate = mysqli_query($con, "UPDATE product SET categoryid='$category' ,
                    nameproduct='$nameproduct', price='$price', detail='$detail', status='$status' WHERE idproduct='$idproduct'");

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
                                $queryUpdate = mysqli_query($con, "UPDATE product SET photo='$new_name' WHERE idproduct = '$idproduct'");

                                if($queryUpdate){
                                    ?>
                                    <div class="alert alert-warning mt-3" role="alert">
                                    Product successfully updated!
                                    </div>
                                    <meta http-equiv="refresh" content="1; url=product.php">
                                    <?php
                                } else {
                                    echo mysqli_error($con);
                                }
                            }
                        }
                    }
                }
            }
            if(isset($_POST['delete'])){
                $queryDelete = mysqli_query($con, "DELETE FROM product WHERE idproduct='$idproduct'");
                if($queryDelete){
                    ?> 
                    
                        <div class="alert alert-success mt-3" role="alert">
                           Delete successfull!
                        </div>
                        
                        <meta http-equiv="refresh" content="1; url=product.php">
                    <?php
                } else {
                    echo mysqli_error($con);
                }
            }
            ?>
        </div>
    </div>

    <script src="../bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>