<?php
    session_start();
    require_once('product-data.php');

    if(isset($_POST['btnProcess'])) {

        if(isset($_SESSION['items'][$_POST['index']][$_POST['sizes']]))
            $_SESSION['items'][$_POST['index']][$_POST['sizes']] += $_POST['quantity']; // this code will increment the cart if already purchase the item
        else
            $_SESSION['items'][$_POST['index']][$_POST['sizes']] = $_POST['quantity']; // code for first time purchase

        $_SESSION['totalQuantity'] += $_POST['quantity']; // this will compute the total quantity of the new purchased order
        header("location: confirm.php"); // will then proceed to confirm if you want to continue shopping or view cart
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
    <title>Details</title>
</head>
<body>
    <!-------------------Design for the upper top part------------------------------>
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
 <!--------------------------Display the pictures,Names,and descriptions-------------------------------->
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
                            <?php echo $arrProducts[$_GET['id']]['name']; ?>
                            <span class="badge badge-dark">₱ <?php echo $arrProducts[$_GET['id']]['price']; ?></span>
                        </h3>
                        <p><?php echo $arrProducts[$_GET['id']]['description']; ?></p>                    
                        <hr>
                        <input type="hidden" name="index" value="<?php echo $_GET['id']; ?>">
 <!--------------------------Display Radio button sizes----------------->
                        <h3 class="title">Select Size:</h3>
                        
                        <input type="radio" name="sizes" id="XS" value="XS" checked>
                        <label for="XS" class="pr-3">XS</label>
                        <input type="radio" name="sizes" id="SM" value="SM">
                        <label for="SM" class="pr-3">SM</label>
                        <input type="radio" name="sizes" id="MD" value="MD">
                        <label for="MD" class="pr-3">MD</label>
                        <input type="radio" name="sizes" id="LG" value="LG">
                        <label for="LG" class="pr-3">LG</label>
                        <input type="radio" name="sizes" id="XL" value="XL">
                        <label for="XL" class="pr-3">XL</label> 
                        <input type="radio" name="sizes" id="XXL" value="XXL">
                        <label for="XXL" class="pr-3">XXL</label> 
                        <input type="radio" name="sizes" id="XXXL" value="XXXL">
                        <label for="XXXL" class="pr-3">XXXL</label>        
                        <hr>
    <!--------------------Design for the quantity input and button------------------------------------------->
                        <h3 class="title">Enter Quantity:</h3>
                        <input type="number" name="quantity" id="quantity" class="form-control" placeholder="0" min="1" max="100" required>
                        <br>
                        
                        <button class="btn btn-dark btn-lg" type="submit" name="btnProcess"><i class="fa fa-check-circle"> </i> Confirm Product Purchase</button>
                        

                        <a href="index.php" class="btn btn-danger btn-lg"></i> Cancel / Go Back</a>
                    </div>                                
                
                <?php endif; ?>
            </div>
        </div>
    </form>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/js/bootstrap.bundle.min.js" integrity="sha512-wV7Yj1alIZDqZFCUQJy85VN+qvEIly93fIQAN7iqDFCPEucLCeNFz4r35FCo9s6WrpdDQPi80xbljXB8Bjtvcg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</body>
</html>