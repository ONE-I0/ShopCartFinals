<?php
    session_start();
    require_once('product-data.php');
        //unset the selected item cart using the easiest method which is the unset method
        if(isset($_POST['btnProcess'])) {  
            unset($_SESSION['items'][$_POST['indexs']][$_POST['sizes']]);
        
        //this will then decrement the updated cart total quantity
            $_SESSION['totalQuantity'] -= $_POST['quantity'];
            header("location: cart.php");
        }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/css/bootstrap.min.css" integrity="sha512-P5MgMn1jBN01asBgU0z60Qk4QxiXo86+wlFahKrsQf37c9cro517WzVSPPV1tDKzhku2iJ2FVgL67wG03SGnNA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="css/Shopping-Cart.css">
    <title>Remore-Confirm</title>
</head>
<body>
    <form method="post">
        <div class="container">
            <div class="row mt-3">
                <div class="col-10">
                    <h1><i class="fa fa-store"></i>One Piece Clothings</h1>
                </div>
                <div class="col-2 text-right">
                    <a href="cart.php" class="btn btn-primary">
                        <i class="fa fa-shopping-cart">Cart</i> 
                        <span class="badge badge-light">
                            <!-------------------this will print the current incremented cart number throughout the code-------------------->
                            <?php 
                                echo (isset($_SESSION['totalQuantity']) ? $_SESSION['totalQuantity'] : "0"); 
                            ?>
                        </span>
                    </a>
                </div>            
            </div>
        <hr>
            <!--will display the design for the upper part of the program and togther with its working code -->
            <div class="row">
                <?php if(isset($_GET['id']) && isset($arrProducts[$_GET['id']])): ?>
                    <div class="col-md-4 col-sm-6 mb-4">
                        <div class="product-grid2">
                            <div class="product-image2">
                                <a>
                                    <img class="pic-1" src="img/<?php echo $arrProducts[$_GET['id']]['photo1']; ?>">
                                    <img class="pic-2" src="img/<?php echo $arrProducts[$_GET['id']]['photo2']; ?>">
                                </a>                            
                            </div>                        
                        </div>
                    </div>                
                    <div class="col-md-8 col-sm-6 mb-4">                
                        <h3 class="title">
                            <?php 
                                echo $arrProducts[$_GET['id']]['name'];
                             ?>
                            <span class="badge badge-dark">₱ <?php echo $arrProducts[$_GET['id']]['price']; ?></span>
                        </h3>
                        <p><?php 
                            echo $arrProducts[$_GET['id']]['description']; 
                        ?></p>                    
                        <hr>
                        <input type="hidden" name="indexs" value="<?php echo $_GET['id']; ?>">
                        <input type="hidden" name="sizes" value="<?php echo $_GET['siz']; ?>">
                        <input type="hidden" name="quantity" value="<?php echo $_GET['quant']; ?>">

                        <h3 class="title">Size: <?php echo $_GET['siz']; ?></h3>                        
                        <hr>
                        <h3 class="title">Quantity: <?php echo $_GET['quant']; ?></h3>
                        <br>
                        <button type="submit" name="btnProcess" class="btn btn-dark btn-lg"><i class="fa fa-trash"></i> Confirm Product Removal</button>
                        <a href="cart.php" class="btn btn-danger btn-lg"><i class="fa fa-arrow-left"></i> Cancel / Go Back</a>
                    </div>                                
                <?php endif; ?>
            </div>
        </div>
    </form>

    
</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/js/bootstrap.bundle.min.js" integrity="sha512-wV7Yj1alIZDqZFCUQJy85VN+qvEIly93fIQAN7iqDFCPEucLCeNFz4r35FCo9s6WrpdDQPi80xbljXB8Bjtvcg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</html>