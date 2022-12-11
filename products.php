<?php 
    session_start();
    require_once('open-connection.php');
    $strsql = "SELECT * FROM user_table";
    if($rs = mysqli_query($con, $strsql)){
        if(mysqli_num_rows($rs) >0 ){
            while($recUsers = mysqli_fetch_array($rs)){
                $name = $recUsers['name'];
            }
            mysqli_free_result($rs);
        }
        else
            echo 'No Record';
    }
    else
        echo 'ERROR: Could not connect';

        require_once('open-connection.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link rel="stylesheet" href="/css/style.css">
    <title>Document</title>
</head>
<body>
<div id="throbber" style="display:none; min-height:120px;"></div>
<div id="noty-holder"></div>
<div id="wrapper">
    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
        <a href="" class="navbar-brand">
            <i class="fa-solid fa-store"></i>One Piece Clothings
        </a>
        </div>
        <!-- Top Menu Items -->
        <ul class="nav navbar-right top-nav">   
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Profile<b class="fa fa-angle-down"></b></a>
                <ul class="dropdown-menu">
                    <li><a href="changepassword.php"><i class="fa-solid fa-gear"></i> Change Password</a>
                    <li class="divider"></li>
                    <li><a href="logout.php"><i class="fa-light fa-right-from-bracket"></i></i> Logout</a>
                </ul>
            </li>
        </ul>
        <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
        <div class="collapse navbar-collapse navbar-ex1-collapse">
            <ul class="nav navbar-nav side-nav">
                <li>
                    <a href="dashboard.php"><i class="fa-solid fa-gauge"></i> Dashboard</a>
                </li>
                <li>
                    <a href="products.php"><i class="fa-solid fa-store"></i> Products</a>
                </li>
            </ul>
        </div>
        <!-- /.navbar-collapse -->
    </nav>

    <div id="page-wrapper">
        <div class="container-fluid">
            <!-- Page Heading -->
            <div class="row" id="main" >
                <div class="col-sm-12 col-md-12 well" id="content">
                    <h1>Add Products</h1>
                </div>
                <?php 
                    if(isset($_POST['btnSave'])){
                        $product_name = $_POST['productname'];
                        $product_description = $_POST['description'];
                        $product_prices = $_POST['prices'];

                        if(isset($_FILES['picture_photo1'])){
                            $arrERRORphoto1 = array();
                            $filenamePhoto1 = $_FILES['picture_photo1']['name'];
                            $filesizePhoto1 = $_FILES['picture_photo1']['size'];
                            $filetempPhoto1 = $_FILES['picture_photo1']['tmp_name'];
                            $filetypePhoto1 = $_FILES['picture_photo1']['type'];

                            $fileTempext = explode('.', $filenamePhoto1);
                            $fileExt = strtolower(end($fileTempext));

                            $fileAllow = array('jpg', 'jpeg', 'png');
                            $fileupload = 'Image1/';

                            if(in_array($fileExt,$fileAllow) === false)
                                $arrERRORphoto1 = "Extension file is not compatible use only jpg,jpeg,png";
                            if($filesizePhoto1 > 10000000);
                                $arrERRORphoto1 = "10mb is the maximum, please use another photo";  
                            if(empty($arrERRORphoto1)){
                                move_uploaded_file($filetempPhoto1, $fileupload . $filenamePhoto1);
                                echo 'File Succesfully uploaded';
                            }  
                        }

                            if(isset($_FILES['picture_photo2'])){
                                $arrERRORphoto2 = array();
                                $filenamePhoto2 = $_FILES['picture_photo2']['name'];
                                $filesizePhoto2 = $_FILES['picture_photo2']['size'];
                                $filetempPhoto2 = $_FILES['picture_photo2']['tmp_name'];
                                $filetypePhoto2 = $_FILES['picture_photo2']['type'];

                                $fileTempext2 = explode('.', $filenamePhoto2);
                                $fileEx2 = strtolower(end($fileTempext2));

                                $fileAllo2 = array('jpg', 'jpeg', 'png');
                                $fileupload2 = 'Image1/';

                                if(in_array($fileEx2,$fileAllo2) === false)
                                    $arrERRORphoto2 = "Extension file is not compatible use only jpg,jpeg,png";
                                if($filesizePhoto2 > 10000000);
                                    $arrERRORphoto2 = "10mb is the maximum, please use another photo";  
                                if(empty($arrERRORphoto2)){
                                    move_uploaded_file($filetempPhoto2, $fileupload2 . $filenamePhoto2);
                                    echo 'File Succesfully uploaded';
                                }  
                            }
                        
                                    require('open-connection.php');
                                    $strsql = "INSERT INTO products_table (name,description,price,photo1,photo2)VALUES('$product_name','$product_description','$product_prices','$filenamePhoto1','$filenamePhoto2')";

                                    if(mysqli_query($con, $strsql)){
                                        header("location:");
                                    }
                                    require_once('close-connection.php');
                    }
                ?>
                <form method="post" enctype="multipart/form-data">
                    <div class="col-sm-5 my-1 ">
                        <label for="productname">Product Name: </label>
                        <input class="form-control" type="text" name="productname" id="productname" required>
                        <hr>
                        <label for="description">Product Description: </label>
                        <input class="form-control" type="text" name="description" id="description" required>
                        <hr>
                        <label for="prices">Prices: </label>
                        <input class="form-control" type="number" name="prices" id="prices" required>
                        <hr>
                        <label for="picture_photo1">Product Picture 1: </label>
                        <input type="file" name="picture_photo1" id="picture_photo1" required>
                        <label for="picture_photo2">Product Picture 2: </label>
                        <input type="file" name="picture_photo2" id="picture_photo2" required>
                        <button type="submit" class="btn btn-primary mt-2 w-100 " name="btnSave" style="float: right;">Add product</button>
                        <hr>
                    </div>
                </form>
            </div>
            <div class="col-sm-12 col-md-12 well" id="content">
                <table class="table table-striped table-bordered">
                    <thead>
                        <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Product Name</th>
                        <th scope="col">Description</th>
                        <th scope="col">Price</th>
                        <th scope="col">Product Picture 1</th>
                        <th scope="col">Product Picture 2</th>
                        <th scope="col">Edit</th>
                        <th scope="col">Delete</th>
                        </tr>

                        <?php 
                            require('open-connection.php');
                            $strsql = "SELECT * FROM products_table";
                            if($rs = mysqli_query($con, $strsql)){
                                if(mysqli_num_rows($rs) > 0){
                                    while($recProducts = mysqli_fetch_array($rs)){
                                       echo '<tr>';
                                           echo '<td>' . $recProducts['id'] .'</th>';
                                           echo '<td>' . $recProducts['name'] .'</td>';
                                           echo '<td>' . $recProducts['description'] .'</td>';
                                           echo '<td>' . $recProducts['price'] .'</td>';
                                           echo '<td>' . $recProducts['photo1'] .'</td>';
                                           echo '<td>' . $recProducts['photo2'] .'</td>';
                                           echo '<td><a href=update.php?k=' . $recProducts['id'] .'>Edit</td></a>';
                                           echo '<td><a href=delete.php?k=' . $recProducts['id'] .'>Delete</td></a>';
                                       echo '</tr>';
                                    }
                                }
                            }
                        ?>
                    </thead>
                </table>
            </div>
        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- /#page-wrapper -->
</div><!-- /#wrapper -->
</body>
<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
</html>