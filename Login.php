<?php 
    require_once('open-connection.php');
    $strsql = "SELECT * FROM user_table";
    if($rs = mysqli_query($con, $strsql)){
        if(mysqli_num_rows($rs) >0 ){
            while($recUsers = mysqli_fetch_array($rs)){
                $username = $recUsers['username'];
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

        if(isset($_POST['btnLogin'])){
            if($_POST['txtusername'] === $username && $_POST['txtpassword'] === $password){
                header("location: dashboard.php");
            }
            else{
                echo '<div class="alert alert-danger alert-dismissible fade show text-center" role="alert">
                        <strong>Wrong Information</strong>Username and Password Invalid
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>';
            }
        }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    <title>Login</title>
</head>
<body>

    <!----------------------------Login in Form design and inputs------------------------------>
    <div class="container bg-white w-25">
        <div class="d-flex justify-content-center">
            <div class="card text-center bg-light shadow mt-5 px-4 py-4">
                <i class="fa-regular fa-user-circle fa-5x "></i>
                <br>
                <form action="" method="post">
                    <label for="txtusername"></label>
                    <input type="text" class="form-control " name="txtusername" id="txtusername" placeholder="Username">
                    <label for="txtpassword"></label>
                    <input type="password" name="txtpassword" class="form-control" id="txtpassword" placeholder="Password">
                    <button type="submit" class="btn btn-primary mt-2 w-100" name="btnLogin">Login</button>
                    <a href="index.php" class="btn btn-danger mt-2 w-100"></i>Cancel</a>
                </form>
            </div>    
         </div>     
     </div>
        
</body>
<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
</html>