<?php
session_start();
if (isset($_SESSION["uid"])) {
    //echo "session in progress";
    // header('location:index.php');
    include('./connect.php');
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
    header("location:loginf.php");
}
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>webcart| Home Page</title>
    <link rel="stylesheet" type="text/css" href="../css/index4-11style.css">
    <script src="https://kit.fontawesome.com/bc2d813b9f.js" crossorigin="anonymous"></script>
    <script type="text/javascript" src="jquery.js"></script>
    <script type="text/javascript" src="login.js"></script>
</head>

<body>
    <div class="header">
        <div class="head">
            <h1><a href="" style="color: rgb(21, 114, 126); text-decoration: none;">Webcart</a></h1>
        </div>
        <div class="head_img">
            <div class="search-bar">
                <input class="search-txt" type="text" name="" placeholder="What are you lookig for">
                <a class="search-btn" href="#">
                    <i class="fas fa-search"></i>
                </a>
            </div>
            <a href="session_end.php"><img src="../html_imges/user.png" title="Logout" style="height: 25px; width:25px"></a>
            <a href="./cart.php"><img src="../html_imges/shopping-cart.png" style="height: 25px; width:25px"></a>
        </div>
        <div class="sell">
            <a class="sellb" href="sellerindex.php" style="height: 25px; width:25px">
                <i class="fas fa-arrow-alt-circle-right">sell</i>
            </a>
        </div>
    </div>
    <div class="categories">
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