<?php
    require "session.php";
    require "../konek.php";

    $queryCategory = mysqli_query($con, "SELECT * FROM category");
    $sumCategory = mysqli_num_rows($queryCategory);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Category</title>
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../fontawesome/css/fontawesome.min.css">
</head>
<style>
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
                    <a href="../admin" class="no-decoration text-muted">
                        <i class="fas fa-home"></i> Home
                    </a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">
                    <i class="fas fa-th-list"></i> Category
                </li>
            </ol>
        </nav>

        <div class="my-5 col-12 col-md-6">
            <h3>Add New Category</h3>
            <form action="" method="post">
                <div>
                    <label for="category">Category</label>
                    <input type="text" id="category" name="category" placeholder="Input Category"
                    class="form-control">
                </div>
                <div class="mt-3">
                    <button class="btn btn-primary" type="submit" name="savecategory">Save</button>
                </div>
            </form>
            
            <?php
            if(isset($_POST['savecategory'])){
                $category = htmlspecialchars($_POST['category']);
                $queryExist = mysqli_query($con, "SELECT namecategory FROM category WHERE namecategory='$category'");
                $sumDataNewCategory = mysqli_num_rows($queryExist);

                if($sumDataNewCategory>0){
                    ?>
                        <div class="alert alert-warning mt-3" role="alert">
                        Category Already Exist!
                        </div>
                    <?php
                } else {
                    $querySave = mysqli_query($con, "INSERT INTO category (namecategory) VALUES ('$category')");
                    if($querySave){
                        ?>
                            
                            <meta http-equiv="refresh" content="1; url=category.php">
                            <div class="alert alert-success mt-3" role="alert">
                            Successfully Added New Category!
                            </div>  
                        <?php
                        
                    }else{
                        echo mysqli_error($con);
                    }

                }
            }
            ?>
        </div>

        <div class="mt-3">
            <h2>Category List</h2>
            <div class="table-responsive mt-5">
                <table class="table">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Category</th>
                            <th>Action</th>
                        </tr>
                        <tbody>
                           <?php
                                if($sumCategory==0){
                            ?>
                                <tr>
                                    <td colspan=3 class="text-center">Category Data is unavailable!</td>
                                </tr>
                            <?php
                                } else {
                                    $sum = 1;
                                    while($data=mysqli_fetch_array($queryCategory)){
                            ?>
                                <tr>
                                    <td><?php echo $sum; ?></td>
                                    <td><?php echo $data['namecategory']; ?></td>
                                    <td>
                                        <a href="category-detail.php?p=<?php echo $data['idcategory']; ?>"
                                        class="btn btn-info"><i class="fas fa-search"></i></a>
                                    </td>
                                </tr>
                            <?php
                                    $sum++;
                                    }
                                }
                           ?>
                        </tbody>
                    </thead>
                </table>
            </div>

        </div>
    </div>


    <script src="../bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../fontawesome/js/all.min.js"></script>
</body>
</html>