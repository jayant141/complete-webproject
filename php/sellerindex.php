<?php
include('./connect.php');
session_start();
if (isset($_SESSION["uid"])) {
    //echo "session in progress";
    // header('location:index.php');
} else {
    header("location:loginf.php");
}
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>webcart| seller home Page</title>
    <link rel="stylesheet" type="text/css" href="../css/index4-11style.css">
    <script src="https://kit.fontawesome.com/bc2d813b9f.js" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
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
            <a href="./session_end" style="logout" img src="../html_imges/user.png" style="height: 25px; width:25px"></a>
            <a href="./cart.php"><img src="../html_imges/shopping-cart.png" style="height: 25px; width:25px"></a>
        </div>
        <div class="sell">
            <a class="sellb" href="./index2.php" style="height: 25px; width:25px">
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
    <form name="upload" action="./items_upload.php" method="post" enctype="multipart/form-data">
        <div style="display:grid;grid-template-columns:20% 80%; margin-top:12%;">
            <div>
                <ul>
                    <li><a href="product_uploaded.php">Product uploaded</a></li>
                    <li><a href="seller_donation_request.php">Donation Request</a></li>
                    <li><a href="#">Product Sold</a></li>
                </ul>
            </div>
            <div style="border:1px solid black">
                <div style=" padding-left:30px;">
                    <h1 style="text-align: center; color: green">Post Your Ad</h1>
                    <hr>
                    <h2 style="text-align: center; color: green">Enter Details</h2>
                    <label>Brand Name*</label><br>
                    <textarea placeholder="Brand name" name="brand" id="brand" style="width: 600px; height:auto; border:2px solid silver; " required></textarea><br>
                    <label>Product Name*</label><br>
                    <textarea placeholder="Ad Title" name="ad_title" id="ad_title" style="width: 600px; height:auto;" required></textarea><br>
                    <label>Description*</label><br>
                    <textarea placeholder="Add description" name="description" id="description" style="width: 600px; height:auto;"></textarea>
                    <hr>
                    <h2 style="color: green">Set Price</h2>
                    <input type="Price" name="set_price" id="set_price" placeholder="₹ Enter Price" required>
                    <br><br>
                    <input list="categories" name="categories" placeholder="Select the field">
                    <datalist id="categories">
                        <option value="Books">
                        <option value="Electronics">
                        <option value="Tools">
                        <option value="Stationary">

                    </datalist>
                    <br>
                    <input type="hidden" name="date" value="date">
                </div>
                <div style="width:300px;height: 200px;text-align: center; margin-top:2%;margin-left:2%; 
                    padding-top:2%; border: 1px solid black;">
                    <h3 style="text-align: center; color: green">Add Images</h3>
                    <input type="file" name="img1" id="img1" required>
                    <input type="file" name="img2">
                    <input type="file" name="img3">
                    <input type="file" name="img4">
                </div>
                <center style="margin-bottom:1%"><input type="submit" name="add_item" id="submit" onclick="on_reset()" style="border:none; background-color:green;width:75px;height:25px;color:white;">
                    <center>
            </div>
        </div>
        <br>

        <script>
            function on_reset() {
                document.getElementsByName("upload").resetForm();
                //  document.cart.reset();
            }
        </script>
    </form>
</body>

</html>