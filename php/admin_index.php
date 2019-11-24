<?php
$conn = mysqli_connect("localhost", "root", "", "webproject");
session_start();
if (isset($_SESSION["uid"])) {
    //header("location:admin_index.php");
    $query = "SELECT `Item_id`, `brand_name`, `Item_name`, `item_img`, `item_desc`, `Item_price`, `type`, `date`, `s_id` FROM `items` ORDER BY `Item_id` DESC ";
    $run = mysqli_query($conn, $query);
    function get_recent()
    {
        global $run;
        if ($run == true) {
            while ($data = mysqli_fetch_assoc($run)) {
                ?>
                <div style=" margin-top:2%; border:1px solid black;box-shadow:4px 4px 4px grey;margin-right:4%; display:grid; grid-template-columns: 30% 70%; ">
                    <form action="./index_actions.php" method="post">
                        <div style="padding:5%;">
                            <img src="../images/<?php echo $data["item_img"]; ?>" style="width:250px;height-250px">
                        </div>
                        <div style="padding-left:5%">
                            <table style="margin-top:2%;">
                                <tr>
                                    <th>brand_name</th>
                                    <th>item_name</th>
                                    <th>item_desc</th>
                                    <th>item_price</th>

                                </tr>
                                <tr>
                                    <td><?php echo $data["brand_name"]; ?></td>
                                    <td><?php echo $data["Item_name"]; ?></td>
                                    <td><?php echo $data["item_desc"]; ?></td>
                                    <td><?php echo $data["Item_price"]; ?></td>
                                </tr>
                                <tr>
                                    <td><input type="hidden" name="item_id" value="<?php echo $data["Item_id"]; ?>"></td>
                                    <td><input type="hidden" name="item_name" value="<?php echo $data["Item_name"]; ?>"></td>
                                    <td><input type="hidden" name="item_price" value="<?php echo $data["Item_price"]; ?>"></td>

                                </tr>
                                <tr>
                                    <td><input type="submit" name="add" value="add to cart"></td>
                                    <td><input type="submit" name="order" value="order now"></td>
                                    <td><input type="submit" name="Donate" value="Ask for donation"></td>
                                </tr>
                            </table>
                    </form>
                </div>
                </div>
<?php
            }
        } else {
            echo "error";
        }
    }
} else {
    header('location:admin_login.php');
}
?>
<!DOCTYPE HTML>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>webcart| seller home Page</title>
    <link rel="stylesheet" type="text/css" href="../css/index4-11style.css">
</head>

<body>
    <div class="header">
        <div class="head">
            <h1><a href="z" style="color: rgb(21, 114, 126); text-decoration: none;">Webcart</a></h1>
        </div>
        <div class="head_img">
            <div class="search-bar">
                <input class="search-txt" type="text" name="" placeholder="What are you lookig for">
                <a class="search-btn" href="#">
                    <i class="fas fa-search"></i>
                </a>
            </div>
            <a href="./session_end.php"><img src="../html_imges/user.png" style="height: 25px; width:25px"></a>
            <a href="./cart.php"><img src="../html_imges/shopping-cart.png" style="height: 25px; width:25px"></a>
        </div>
        <div class="sell">
            <a class="sellb" href="sellerindex.php" style="height: 25px; width:25px">
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
            <li><a href="#">Books</a>
            </li>
            <li><a href="#">Engineering</a>
            </li>
            <li><a href="#">Design</a>
            </li>
            <li><a href="#">Design</a>
            </li>
            <li><a href="#">Design</a>
            </li>
        </ul>
    </div>
    <div class="grid" style="display: grid;grid-template-columns: 50% 50%">
        <div style="margin-top: 30%;">

            <a href="./user_details.php"><input type="submit" name="" value="User Details"></a><br></div>
        <div style="margin-top: 30%;">
            <a href="./product_details.php"><input type="submit" name="" value="Items Added"></a>
        </div>
    </div>
    <div style=" margin-top:5%; display:grid; grid-template-columns: 50% 50%;">
        <?php get_recent(); ?>
    </div>
    <style>
        th {
            padding: 15px;
        }
    </style>
</body>

</html>