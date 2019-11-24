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
    <title>webcart| product uploaded Page</title>
    <link rel="stylesheet" type="text/css" href="../css/index4-11style.css">
    <script src="https://kit.fontawesome.com/bc2d813b9f.js" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script>
        //jquery
        $(document).ready(function() {
            var request_count = 2;
            $("button").click(function() {
                request_count = request_count + 2;
                $("#donation_request").load("load_donate_request.php", {
                    new_request_count: request_count
                });
            });
        });

        var today = new Date();
        var date = today.getFullYear() + '-' + (today.getMonth() + 1) + '-' + today.getDate();
    </script>
    <style>
        th {
            padding: 15px;
        }
    </style>
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
    <div style="display:grid;grid-template-columns:20% 80%; margin-top:12%;">
        <div>
            <ul>
                <li><a href="">Product uploaded</a></li>
                <li><a href="seller_donation_request.php">Donation Request</a></li>
                <li><a href="product_sold.php">Product Sold</a></li>
            </ul>
        </div>
        <div id="donation_request">
            <?php

            $uid = $_SESSION['uid'];
            $donate = "SELECT * FROM `items` WHERE `s_id`='$uid'";
            $run = mysqli_query($conn, $donate);
            if (mysqli_num_rows($run) > 0) {
                while ($data = mysqli_fetch_assoc($run)) {
                    ?>
                    <div style=" margin-top:2%; display:grid; grid-template-columns: 50% 50%;">
                        <div style="display:grid; grid-template-columns: 40% 60%; border:1px solid black">
                            <form action="#" method="post">
                                <div style="padding:5%">
                                    <img src="../images/<?php echo $data["item_img"]; ?>" style="width:70px; height: 70px;">
                                </div>
                                <div style="padding:5%">
                                    <table style="margin-top:2%">
                                        <tr>
                                            <th>item_id</th>
                                            <th>Item_name</th>
                                            <th>Item_price</th>
                                            <th>date</th>

                                        </tr>
                                        <tr>
                                            <td><?php echo $data["Item_id"]; ?></td>
                                            <td><?php echo $data["Item_name"]; ?></td>
                                            <td><?php echo $data["Item_price"]; ?></td>
                                            <td><?php echo $data["date"]; ?></td>
                                        </tr>
                                        <tr>
                                            <td><input type="hidden" name="Item_id" value="<?php echo $data["Item_id"]; ?>"></td>
                                            <td><input type="hidden" name="date" value="<?php echo $data["date"]; ?>"></td>

                                        </tr>
                                        <tr>
                                            <td><input type="submit" name="update" value="Update" style="color:white; background-color:green;border:none"></td>
                                            <td><input type="submit" name="delete" value="delete" style="color:white; background-color:red;border:none"></td>
                                            <td><input type="submit" name="disable" value="disable" style="color:white; background-color:red;border:none"></td>

                                        </tr>
                                    </table>


                            </form>
                        </div>
                    </div>
        </div>
<?php
    }
} else {
    echo "There are no comments";
}
?>

    </div>
</body>

</html>