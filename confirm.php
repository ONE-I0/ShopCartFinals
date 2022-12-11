<?php 
    session_start(); 
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
    <title>Confirm</title>
</head>
<body>
    <!--Just the design for the upper part again and the view cart and continue shopping-->
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
        <h2>Product Successfully Added to the Cart, what do you want to do next?</h2>
        <a href="cart.php" class="btn btn-dark btn-lg"><i class="fa fa-shopping-cart"></i> View Cart</a>
        <a href="index.php" class="btn btn-danger btn-lg"><i class="fa fa-shopping-bag"></i> Continue Shopping</a>
    </div>
    
    
</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/js/bootstrap.bundle.min.js" integrity="sha512-wV7Yj1alIZDqZFCUQJy85VN+qvEIly93fIQAN7iqDFCPEucLCeNFz4r35FCo9s6WrpdDQPi80xbljXB8Bjtvcg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</html>