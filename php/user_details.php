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
    <title>webcart|user details Page</title>
    <link rel="stylesheet" type="text/css" href="../css/index4-11style.css">
</head>
<style>
    table,
    tr,
    th,
    td {
        border: 1px solid black;
    }
</style>

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
            <a href="./session_end.php"><img src="../html_imges/user.png" style="height: 25px; width:25px"></a>
            <a href="./cart.html"><img src="../html_imges/shopping-cart.png" style="height: 25px; width:25px"></a>
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
    </div>
    <div class="seller" style="margin-top: 20%;">
        <h2 style="color: blue;">Registered customers are</h2>

        <form action="admin_User_action.php" method="post">
            <input type="text" name="valueToSearch" placeholder="Search by user name"><br><br>
            <input type="submit" name="search" value="Filter"><br><br>

            <table>
                <tr>
                    <th>Id</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Phone-Number</th>
                </tr>

                <?php
                if (isset($_POST['search'])) {
                    $valueToSearch = $_POST['valueToSearch'];
                    $query = "SELECT * FROM `user` WHERE `type` is NULL AND CONCAT(`user_id`, `Fname`, `Lname`, `P_number`) LIKE '%" . $valueToSearch . "%'";
                    $search_result = filterTable($query);
                } else {
                    $query = "SELECT * FROM `user` WHERE `type` is NULL";
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
                        <td><?php echo $row['user_id']; ?></td>
                        <td><?php echo $row['Fname']; ?></td>
                        <td><?php echo $row['Lname']; ?></td>
                        <td><?php echo $row['P_number']; ?></td>
                        <input type="hidden" name="user_id" value="<?php echo $row["user_id"]; ?>">

                        <td><input type="submit" name="delete" value="Delete" style="background-color:red;color:white:border:none;border-radius:4px;"></td>
                        <td><input type="submit" name="Update" value="Update" style="background-color:teal;color:white:border:none;border-radius:4px;"></td>
                        <td><input type="submit" name="In-active" value="IN-Active" style="background-color:yellowgreen;color:white:border:none;border-radius:4px;"></td>
                    </tr>
        </form>
    <?php endwhile; ?>
    </table>
    </div>
</body>

</html>