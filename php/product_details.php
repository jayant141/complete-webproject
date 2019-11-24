<?php
$connect = mysqli_connect("localhost", "root", "", "webproject");
session_start();
if (isset($_SESSION["uid"])) {
    //header("location:admin_index.php");
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
            <h1><a href="./admin_index.php" style="color: rgb(21, 114, 126); text-decoration: none;">Webcart</a></h1>
        </div>
        <div class="head_img">
            <div class="search-bar">
                <input class="search-txt" type="text" name="" placeholder="What are you lookig for">
                <a class="search-btn" href="#">
                    <i class="fas fa-search"></i>
                </a>
            </div>
            <a href="./session_end"><img src="../html_imges/user.png" style="height: 25px; width:25px"></a>
            <a href="./cart.html"><img src="../html_imgess/shopping-cart.png" style="height: 25px; width:25px"></a>
        </div>
        <div class="sell">
            <a class="sellb" href="admin_index.php" style="height: 25px; width:25px">
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

    <div class="grid" style="display: grid;grid-template-columns: 70% 30%">

        <div class="seller" style="margin-top: 20%;">
            <h2 style="color: blue;">Products are</h2>

            <form action="product_admin_actions.php" method="post">
                <input type="text" name="valueToSearch" placeholder="Search by user name"><br><br>
                <input type="submit" name="search" value="Filter"><br><br>

                <table>
                    <tr>
                        <th>Item_Id</th>
                        <th>item_name</th>
                        <th>item_price</th>
                        <th>date</th>
                    </tr>

                    <?php
                    if (isset($_POST['search'])) {
                        $valueToSearch = $_POST['valueToSearch'];
                        $query = "SELECT * FROM `items` WHERE CONCAT(`Item_id`, `brand_name`, `Item_name`, `item_desc`, `Item_price`, `type`, `date`, `s_id`) LIKE '%" . $valueToSearch . "%'";
                        $search_result = filterTable($query);
                    } else {
                        $query = "SELECT * FROM `items`";
                        $search_result = filterTable($query);
                    }
                    // function to connect and execute the query
                    function filterTable($query)
                    {
                        $connect = mysqli_connect("localhost", "root", "", "webproject");
                        $filter_Result = mysqli_query($connect, $query);
                        return $filter_Result;
                    }
                    while ($row = mysqli_fetch_array($search_result)) :

                        ?>
                        <tr>
                            <td><?php echo $row['Item_id']; ?></td>
                            <td><?php echo $row['Item_name']; ?></td>
                            <td><?php echo $row['Item_price']; ?></td>
                            <td><?php echo $row['date']; ?></td>

                            <input type="hidden" name="item_id" value="<?php echo $row["Item_id"]; ?>">
                            <td><input type="submit" name="delete" value="Delete"></td>
                            <td><input type="submit" name="Update" value="Update"></td>
                            <td><input type="submit" name="In-active" value="IN-Active"></td>
                        </tr>
            </form>
        <?php endwhile; ?>
        </table>


        </div>
        <div style="margin-top: 45%;">
            <h2>Filters</h2>
            <form>
                <input list="categories" name="categories" placeholder="Search by Categories" style="margin-bottom:10px;">
                <datalist id="categories">
                    <option value="Books">
                    <option value="Electorinc">
                </datalist><input type="submit" value="Submit"><br>
                <input type="submit" value="Donated items">
                <div>

                    <input type="tect" placeholder="Search by user name">
                    <input type="submit" value="Submit">
                </div>
        </div>

        <style>
            input {
                margin-bottom: 10px;
            }
        </style>
</body>

</html>