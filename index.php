<?php
    session_start();
    require_once('product-data.php');

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
    <title>Index</title>
</head>
<body>
    <div class="container">
        <div class="row mt-5">
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
                    <a href="Login.php" class="btn btn-secondary">
                    <i class="fa-solid fa-right-to-bracket"></i>Login
                </a>
            </div>            
        </div>
        <hr>

        <div class="row">
            <?php if(isset($arrProducts)): ?>
                <?php foreach($arrProducts as $proKey => $proValue): ?>
                    <div class="col-md-3 col-sm-6">
                        <div class="product-grid2">
                            <div class="product-image2">
                                <a href="details.php?id=<?php echo $proKey; ?>">
                                    <img class="pic-1" src="img/<?php echo $proValue['photo1']; ?>">
                                    <img class="pic-2" src="img/<?php echo $proValue['photo2']; ?>">
                                </a>                        
                                <a class="add-to-cart" href="details.php?id=<?php echo $proKey; ?>"><i class="fa-solid fa-cart-shopping"></i></a>
                            </div>
                            <div class="product-content">
                                <h3 class="title">
                                    <?php echo $proValue['name']; ?>
                                    <span class="badge badge-dark">₱ <?php echo $proValue['price']; ?></span>
                                </h3>
                            </div>
                        </div>
                    </div>
                <?php endforeach; 
           endif; ?>
        </div>
    </div>
    <?php 
        
    
    ?>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/js/bootstrap.bundle.min.js" integrity="sha512-wV7Yj1alIZDqZFCUQJy85VN+qvEIly93fIQAN7iqDFCPEucLCeNFz4r35FCo9s6WrpdDQPi80xbljXB8Bjtvcg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</body>
</html>