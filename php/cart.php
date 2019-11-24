<?php
session_start();
if (isset($_SESSION["uid"])) {
    //echo "session in progress";
    // header('location:index.php');


    $uid = $_SESSION["uid"];
    include("./connect.php");
    $query_cart = "SELECT `cart_item_id`, `item_id`, `item_name`, `item_price`, `use_id` FROM `cart` WHERE `use_id` = '$uid'";
    $run_cart = mysqli_query($conn, $query_cart);


    function get_recent()
    {

        global $run_cart;
        if ($run_cart == true) {
            while ($data = mysqli_fetch_assoc($run_cart)) {
                include("./connect.php");
                $item_id = $data['item_id'];
                $query_item = "SELECT * FROM `items` WHERE `Item_id` ='$item_id'";
                $run_item = mysqli_query($conn, $query_item);
                $data_item = mysqli_fetch_assoc($run_item);
                ?>
                <div style=" margin-top:2%; border:1px solid black;box-shadow:4px 4px 4px grey;margin-right:4%; display:grid; grid-template-columns: 30% 70%; ">
                    <form name="cart" action="cart_delete.php" method="post">
                        <div style="padding:5%">
                            <img src="../images/<?php echo $data_item["item_img"]; ?>" style="width:50px;height:50px">
                        </div>
                        <div style="padding:5%">
                            <table style="margin-top:2%">
                                <tr>
                                    <th>Item_id</th>
                                    <th>item_name</th>
                                    <th>item_price</th>

                                </tr>

                                <tr style="padding:50px;">
                                    <td><?php echo $data["item_id"]; ?></td>
                                    <td><?php echo $data["item_name"]; ?></td>
                                    <td><?php echo $data["item_price"]; ?></td>

                                </tr>
                                <tr>
                                    <input type="hidden" name="cart_item_id" value="<?php echo $data["cart_item_id"]; ?>">
                                    <input type="hidden" name="item_id" value="<?php echo $data["item_id"]; ?>">
                                    <input type="hidden" name="item_name" value="<?php echo $data["item_name"]; ?>">
                                    <input type="hidden" name="item_price" value="<?php echo $data["item_price"]; ?>">
                                </tr>

                                <tr>

                                    <td><input type="submit" name="delete" value="Delete" onclick="on_reset()"></td>
                                    <td><input type="submit" name="order" value="Procced To Pay " onclick="on_reset()"></td>
                                    <td><input type="submit" name="Donate" value="Ask for donation" onclick="on_reset()"></td>
                                </tr>


                            </table>
                            <script>
                                function on_reset() {
                                    document.getElementsByName("cart").resetForm();
                                    //  document.cart.reset();
                                }
                            </script>
                    </form>
                </div>
                </div>
<?php
            }
        }
    }
} else {
    header("location:loginf.php");
}
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>webcart| Cart</title>
    <link rel="stylesheet" type="text/css" href="../css/index4-11style.css">
    <link rel="stylesheet" type="text/css" href="../css/cartstyle.css">
    <script src="https://kit.fontawesome.com/bc2d813b9f.js" crossorigin="anonymous"></script>
    <style>
    </style>
</head>

<body>
    <div class="header">
        <div class="head">
            <h1><a href="./index.php" style="color: rgb(21, 114, 126); text-decoration: none;">Webcart</a></h1>
        </div>
        <div class="head_img">
            <div class="search-bar">
                <input class="search-txt" type="text" name="" placeholder="What are you lookig for">
                <a class="search-btn" href="#">
                    <i class="fas fa-search"></i>
                </a>
            </div>
            <a href="./session_end.php"><img src="../html_imges/user.png" style="height: 25px; width:25px"></a>
            <a href=""><img src="../html_imges/shopping-cart.png" style="height: 25px; width:25px"></a>
        </div>
        <div class="sell">
            <a class="sellb" href="./sellerindex.php" style="height: 25px; width:25px">
                <i class="fas fa-arrow-alt-circle-right">sell</i>
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

    <div style=" margin-top:10%; display:grid; grid-template-columns: 50% 50%;">
        <?php get_recent(); ?>
    </div>
    <style>
        th {
            padding: 15px;
        }
    </style>

</body>

</html>