<?php
    require "session.php";
    require "../konek.php";

    $idcategory = $_GET['p'];

    $query = mysqli_query($con, "SELECT * FROM category WHERE idcategory='$idcategory'");
    $data = mysqli_fetch_array($query);
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Category</title>
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../fontawesome/css/fontawesome.min.css">
</head>
<body>
    <?php 
    require "navbar.php"; ?>
    
    <div class="container mt-5">
        <h2>Detail Category</h2>
        <div class="col-12 col-md-6">
            <form action="" method="post">
                <div>
                    <label for="category">Category</label>
                    <input type="text" name="category" id="category" class="form-control" value="<?php echo
                    $data['namecategory']; ?>">
                </div>

                <div class="mt-5 d-flex justify-content-between">
                    <button type="submit" class="btn btn-primary" name="btnedit">Edit</button>
                    <button type="submit" class="btn btn-danger" name="btndelete">Delete</button>

                </div>
            </form>
            <?php
                if(isset($_POST['btnedit'])){
                    $category = htmlspecialchars($_POST['category']);
                    if($data['namecategory']==$category){
                        ?>
                        <meta http-equiv="refresh" content="0; url=category.php">
                        <?php
                    } else {
                        $query = mysqli_query($con, "SELECT * FROM category WHERE namecategory = '$category'");
                        $sumData = mysqli_num_rows($query);
                        if($sumData>0){
                            ?>
                            <div class="alert alert-warning mt-3" role="alert">
                                Category Already Exist!
                            </div>
                            <?php
                        } else {
                            $querySave = mysqli_query($con, "UPDATE category SET namecategory='$category' WHERE 
                            idcategory='$idcategory'");
                            if($querySave){
                                ?>
                                    
                                    <meta http-equiv="refresh" content="1; url=category.php">
                                    <div class="alert alert-success mt-3" role="alert">
                                    Successfully Edited The Category!
                                    </div>  
                                <?php
                                
                            }else{
                                echo mysqli_error($con);
                            }
                        }
                    }
                }
                if(isset($_POST['btndelete'])){
                    $queryCheck = mysqli_query($con, "SELECT * FROM product WHERE categoryid='$idcategory'");
                    $dataCount = mysqli_num_rows($queryCheck);
                    
                    if($dataCount>0){
                        ?> 
                        
                            <div class="alert alert-warning mt-3" role="alert">
                               Category cannot delete because product exist!
                            </div>
                            
                        <?php
                        die();
                    }
                    $queryDelete = mysqli_query($con, "DELETE FROM category WHERE idcategory='$idcategory'");
                    if($queryDelete){
                        ?> 
                        
                            <div class="alert alert-success mt-3" role="alert">
                               Delete successfull!
                            </div>
                            
                            <meta http-equiv="refresh" content="1; url=category.php">
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