<?php
session_start();
if (isset($_SESSION["uid"])) {
    //echo "session in progress";
    // header('location:index.php');
    include('./connect.php');
} else {
    header("location:loginf.php");
}
?>
<!DOCTYPE HTML>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>webcart| seller home Page</title>
    <link rel="stylesheet" type="text/css" href="../css/index4-11style.css">
    <link rel="stylesheet" type="text/css" href="../css/payment_options.css">
    <script src="https://kit.fontawesome.com/bc2d813b9f.js" crossorigin="anonymous"></script>
</head>

<body>
    <div class="header">
        <div class="head">
            <h1><a href="./index2.php" style="color: rgb(21, 114, 126); text-decoration: none;">Webcart</a></h1>
        </div>
        <div class="head_img">
            <div class="search-bar">
                <input class="search-txt" type="text" name="" placeholder="What are you lookig for">
                <a class="search-btn" href="#">
                    <i class="fas fa-search"></i>
                </a>
            </div>
            <a href="./loginf.php"><img src="../html_imges/user.png" title="login" style="height: 25px; width:25px"></a>
            <a href="./cart.php"><img src="../html_imges/shopping-cart.png" style="height: 25px; width:25px"></a>
        </div>
        <div class="sell">
            <a class="sellb" href="INDEX4-11.html" style="height: 25px; width:25px">
                <i class="fas fa-arrow-circle-left">Buy</i>
            </a>
        </div>
    </div>
    <div class="categories">
        <a class="sellb" style="height: 25px; width:25px; 
                padding-left:15px; padding-top:5px">
            <button type="button" name="" value="Back" onclick="history.go(-1)" style="height: 25px; width:45px; 
                padding-left:5px; padding-top:5px;border: none; background-color:transparent"><i class="fas fa-arrow-alt-circle-left">Back</i></button>
        </a>
        <ul>
            <li><a href="books.php">Books</a>
            </li>
            <li><a href="engineering.php">Electronics</a>
            </li>
            <li><a href="Tools.php">Tools</a>
            </li>
            <li><a href="stationary.php">Stationary</a>
            </li>
            <li><a href="#">More</a>
            </li>
        </ul>
    </div>
    <div style="margin-top:10%">
        <?php
        $uid = $_SESSION['uid'];
        $cart_item_id = $_COOKIE["c_id"];
        $price_query = "SELECT `cart_item_id`, `item_id`, `item_name`, `item_price`, `use_id` FROM `cart` WHERE `use_id` ='$uid' AND `cart_item_id` = '$cart_item_id'";
        $run = mysqli_query($conn, $price_query);
        if ($run == true) {
            global $run;
            while ($data = mysqli_fetch_assoc($run)) {
                echo "item_name" . $data['item_name'];
            }
        }
        ?>
    </div>
    <div style="margin_top:1%">
        <form action="./payment.php" method="post">
            <input type="submit" name="wallet" value="wallet">
            <input type="hidden" name="item_price" value=<?php echo $data['item_price']; ?>>
            <input type="hidden" name="$cart_item_id" value=<?php echo $cart_item_id; ?>>
        </form>
    </div>
    <div class="row" style="margin-top:1%">
        <div class="col-75">
            <div class="container">
                <form action="./payment.php" method="post">
                    <div style="display: grid; grid-template-columns: 50% 50% ;">
                        <div class="row" style="margin-right: 20%; margin-top: 10%;">
                            <div class="col-50">
                                <h2>Billing Address</h2>
                                <label for="fname"><i class="fa fa-user"></i> Full Name</label>
                                <input type="text" id="fname" name="firstname" placeholder="Mr. Aditya Sharma" required="">
                                <label for="email"><i class="fa fa-envelope"></i> Email</label>
                                <input type="text" id="email" name="email" placeholder="abc@gmail.com" required="">
                                <label for="adr"><i class="fa fa-address-card-o"></i> Address</label>
                                <input type="text" id="adr" name="address" placeholder="43, Kamla Nehru Marg, Freeganj" required="">
                                <label for="city"><i class="fa fa-institution"></i> City</label>
                                <input type="text" id="city" name="city" placeholder="Ujjain" required=" ">

                                <div class="row">
                                    <div class="col-50">
                                        <label for="state">State</label>
                                        <input type="text" id="state" name="state" placeholder="M.P" required="">
                                    </div>
                                    <div class="col-50">
                                        <label for="zip">PIN CODE</label>
                                        <input type="text" id="zip" name="Zip" placeholder="456006" required=" ">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div style="margin-top: 10%;">
                            <div class="col-50">
                                <h2>Payment</h2>
                                <div class="Wallet" style="">
                                    <input type="submit" name="wallet" value="wallet">
                                    <input type="hidden" name="item_price" value=<?php echo $data['item_price']; ?>></div> <label for="fname">Accepted Cards</label>
                                <div class="icon-container">
                                    <img src="visa.jpg" style="width: 50px;height: auto;">
                                    <img src="pay.jpg" style="width: 50px;height: auto;">
                                    <img src="ru.png" style="width: 65px;height: auto;">
                                    <img src="master.png" style="width: 50px;height: auto;">
                                    <i class="fa fa-cc-visa" style="color:navy;"></i>
                                    <i class="fa fa-cc-amex" style="color:blue;"></i>
                                    <i class="fa fa-cc-mastercard" style="color:red;"></i>
                                    <i class="fa fa-cc-discover" style="color:orange;"></i>
                                </div>
                                <label for="cname">Name on Card</label>
                                <input type="text" id="cname" name="cardname" placeholder="Jayant Choudhary" required="">
                                <label for="ccnum">Credit card number</label>
                                <input type="text" id="ccnum" name="cardnumber" placeholder="1234-5678-1234-5678" required="">
                                <label for="expmonth">Exp Month</label>
                                <input type="text" id="expmonth" name="expmonth" placeholder="September" required="">

                                <div class="row">
                                    <div class="col-50">
                                        <label for="expyear">Exp Year</label>
                                        <input type="text" id="expyear" name="expyear" placeholder="2022" required="">
                                    </div>
                                    <div class="col-50">
                                        <label for="cvv">CVV</label>
                                        <input type="password" id="cvv" name="cvv" placeholder="541" required="">
                                    </div>
                                    <div class="UPI" style="float: left">
                                        <br>
                                        <hr style="color: black">
                                        <B style="text-align: left;">UPI</B>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
            </div>

            <label>
                <input type="checkbox" checked="checked" name="sameadr"> Shipping address same as billing
            </label>
            <input type="submit" value="Continue to checkout" class="btn">
            </form>

        </div>
    </div>