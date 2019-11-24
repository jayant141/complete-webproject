<?php
session_start();
if (isset($_SESSION["uid"])) {
    //echo "session in progress";
    // header('location:index.php');
    $uid = $_SESSION["uid"];
    include("./connect.php");
    $query = "SELECT `Item_id`, `brand_name`, `Item_name`, `item_img`, `item_desc`, `Item_price`, `type`, `date`, `s_id` FROM `items` WHERE `type` = 'Books' AND `s_id` = '$uid'";
    $run = mysqli_query($conn, $query);
    function get_recent()
    {
        global $run;
        if ($run == true) {
            while ($data = mysqli_fetch_assoc($run)) {
                ?>
                <div>
                    <form action="books_display_sql.php" method="post">

                        <table style="border:1px solid black;margin-top:2%">
                            <tr>
                                <td><img src="../images/<?php echo $data["item_img"]; ?>" style="width: 70%; height: 70%;"></td>
                            </tr>
                            <tr>
                                <th>Item_id</th>
                                <th>item_name</th>
                                <th>item_desc</th>
                                <th>item_price</th>

                            </tr>

                            <tr style="padding:50px;">
                                <td><?php echo $data["Item_id"]; ?></td>

                                <td><?php echo $data["Item_name"]; ?></td>
                                <td><?php echo $data["item_desc"]; ?></td>
                                <td><?php echo $data["Item_price"]; ?></td>

                            </tr>


                            <tr>
                                <input type="hidden" name="item_id" value="<?php echo $data["Item_id"]; ?>">
                                <input type="hidden" name="item_name" value="<?php echo $data["Item_name"]; ?>">
                                <input type="hidden" name="item_price" value="<?php echo $data["Item_price"]; ?>">
                                <td><input type="submit" name="add" value="add to cart"></td>
                                <td><input type="submit" name="order" value="order now"></td>
                                <td><input type="submit" name="Donate" value="Ask for donation"></td>
                            </tr>


                        </table>
                    </form>
                </div>
    <?php
                }
            } else {
                echo "error";
            }
        }
        ?>
    <html>

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>webcart| Home Page</title>
        <link rel="stylesheet" type="text/css" href="../css/index4-11style.css">
        <script src="https://kit.fontawesome.com/bc2d813b9f.js" crossorigin="anonymous"></script>
        <style>
            th {
                border: 1px solid black;
            }

            tr td {
                padding: 0 30px;
                text-align: center;
                border: 1px solid black;
            }
        </style>
    </head>

    <body>
        <div style="margin-top:5%">
            <?php get_recent(); ?>
        </div>
    </body>

    </html>
<?php }
