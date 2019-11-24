<?php
include('./connect.php');
session_start();
if (isset($_SESSION["uid"])) {
    //echo "session in progress";
    // header('location:index.php');
} else {
    header("location:loginf.php");
}
$uid = $_SESSION["uid"];
if (isset($_POST['wallet'])) {

    $cart_item_id = $_POST['$cart_item_id'];
    $price_qry = "SELECT `cart_item_id`, `item_id`, `item_name`, `item_price`, `use_id` FROM `cart` WHERE `cart_item_id` ='$cart_item_id'";
    $run_pq = mysqli_query($conn, $price_qry);
    $data = mysqli_fetch_assoc($run_pq);
    $item_price = $data['item_price'];
    $item_id = $data['item_id'];

    $wallet = "SELECT `user_id`, `Fname`, `Lname`, `Email`, `P_number`, `passsword`, `wallet`, `type` FROM `user` WHERE `user_id` ='$uid'";
    $run_w = mysqli_query($conn, $wallet);
    $data_w = mysqli_fetch_assoc($run_w);
    $wallet_money = $data_w['wallet'];
    $left_amount = $wallet_money - $item_price;
    $deduct_money = "UPDATE `user` SET `wallet`='$left_amount' WHERE `user_id` ='$uid'";
    $run_dm = mysqli_query($conn, $deduct_money);
    if ($run_dm == true) {
        $query_sid = "SELECT `s_id` FROM `items` WHERE `Item_id` = '$item_id'";
        $run_sid = mysqli_query($conn, $query_sid);
        $data_sid = mysqli_fetch_assoc($run_sid);
        $sid = $data_sid['s_id'];
        $wallet = "SELECT `user_id`, `Fname`, `Lname`, `Email`, `P_number`, `passsword`, `wallet`, `type` FROM `user` WHERE `user_id` ='$sid'";
        $run_w = mysqli_query($conn, $wallet);
        $data_w = mysqli_fetch_assoc($run_w);
        $wallet_money = $data_w['wallet'];
        $gain_amount = $wallet_money + $item_price;

        $add_money = "UPDATE `user` SET `wallet`='$gain_amount' WHERE `user_id` ='$sid'";
        $run_am = mysqli_query($conn, $add_money);
        if ($run_am == true) {
            $fetch_item_id = "SELECT * FROM `cart` WHERE `cart_item_id` = '$cart_item_id'";
            $run_fti = mysqli_query($conn, $fetch_item_id);
            $data_fti = mysqli_fetch_assoc($run_fti);
            $item_id = $data_fti['item_id'];

            $delete_entry_cart = "DELETE FROM `cart` WHERE `cart_item_id` = '$cart_item_id'";
            $run_delete_cart = mysqli_query($conn, $delete_entry_cart);

            $fetch_seller_id = "SELECT * FROM `items` WHERE `Item_id`='$item_id'";
            $run_fsi = mysqli_query($conn, $fetch_seller_id);
            $data_fsi = mysqli_fetch_assoc($run_fsi);
            $seller_id = $data_fsi['Item_price'];

            $delete_entry_item = "DELETE FROM `items` WHERE `Item_id`='$item_id'";
            $run_delete_item = mysqli_query($conn, $delete_entry_item);

            $query_payment = "INSERT INTO `payment`(`Payment_amt`, `item_id`, `payment_date`, `Us_id`, `seller_id`) VALUES ('$item_price','$item_id',CURRENT_DATE(),'$uid','$seller_id')";
            echo $query_payment;
            $run_payment = mysqli_query($conn, $query_payment);

            $fetch_payment = "SELECT * FROM `payment` WHERE `Us_id` ='$uid'";
            $run_fp = mysqli_query($conn, $fetch_payment);
            $data_fp = mysqli_fetch_assoc($run_fp);
            echo "payment sucessfull";
            ?>
            <center>
                <table>
                    <tr>
                        <th>transaction-date</th>
                        <th>transaction_amount</th>
                        <th>Item_name</th>
                        <th>seller</th>
                    </tr>
                    <tr>
                        <td> <?php echo $data_fp['payment_date'] ?></td>
                        <td> <?php echo $data_fp['Payment_amount'] ?></td>
                        <td> <?php echo $data_fsi['Item_name'] ?></td>
                        <td> <?php echo $data_fp['payment_date'] ?></td>
                    </tr>
                    <tr>
                        <td><a href="#"><input type="submit" value="Print"></a></td>
                        <td><a href="index2.php"><input type="submit" value="Back"></a></td>
                    </tr>
                </table>
            </center>
<?php
        }
    } else {
        echo "payment unsucessful";
        header('location:cart.php');
    }
}
