<?php 
    session_start();
    require_once('open-connection.php');
    $strsql = "SELECT * FROM user_table";
    if($rs = mysqli_query($con, $strsql)){
        if(mysqli_num_rows($rs) >0 ){
            while($recUsers = mysqli_fetch_array($rs)){
                $password = $recUsers['password'];
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
    <title>Change Password</title>
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
                    <h1>Change Password</h1>
                </div>
                <form method="post">
                    <?php 
                        if(isset($_POST['btnSave'])){
                            if($password == $_POST['txtpassword_current']){
                                if($_POST['txtpassword_new'] == $_POST['txtpassword_confirm']){
                                    $newpassword = $_POST['txtpassword_new'];
    
                                    require('open-connection.php');
    
                                    $strsql = "UPDATE user_table SET password = '$newpassword' WHERE id = 1";
                                    if(mysqli_query($con, $strsql))
                                        header("location: login.php");
                                    else
                                        echo "Error: something is wrong!";
                                        require_once('close-connection.php');
                                }
                                else
                                    echo "Mismatch new password and confirm password!";
                            }
                            else
                                echo "Wrong Current Password";
                        }
                            
                            
                    ?>
                    <div class="col-sm-3 my-1 ">
                        <input class="form-control" type="password" name="txtpassword_current" id="txtpassword_current" placeholder="Current Password" required>
                        <input class="form-control" type="password" name="txtpassword_new" id="txtpassword_new" placeholder="New password" required>
                        <input class="form-control" type="password" name="txtpassword_confirm" id="txtpassword_new" placeholder="Confirm password" required>
                        <button type="submit" class="btn btn-primary mt-2 w-100 " name="btnSave" style="float: right;">Save</button>
                    </div>
                </form>
                
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- /#page-wrapper -->
</div><!-- /#wrapper -->
</body>
<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
</html>