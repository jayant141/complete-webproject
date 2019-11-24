<?php
session_start();
if (isset($_SESSION["uid"])) {
    //echo "session in progress";
    // header('location:index.php');
    include('./connect.php');
} else {
    header("location:loginf.php");
}
$uid = $_SESSION['uid'];
$cart_item_id = $_POST['cart_item_id'];
setcookie("c_id", "$cart_item_id");
if (isset($_POST['delete'])) {
    $query_cart = "SELECT `cart_item_id`, `item_id`, `item_name`, `item_price`, `use_id` FROM `cart` WHERE `use_id` ='$uid'";
    $run_cart = mysqli_query($conn, $query_cart);
    // while ($data = mysqli_fetch_assoc($run_cart)) {
    //   $cart_item_id = $data['cart_item_id'];
    //}
    $query_delete = "DELETE FROM `cart` WHERE `cart_item_id` ='$cart_item_id'";
    $run_delete = mysqli_query($conn, $query_delete);
    header('location:cart.php');

    echo "Succesfully deleted....!!";
}
if (isset($_POST['order'])) {
    //$cart_item_id = $_POST['cart_item_id'];
    //$price_query = "SELECT `cart_item_id`, `item_id`, `item_name`, `item_price`, `use_id` FROM `cart` WHERE `use_id` ='$uid' AND `cart_item_id` = '$cart_item_id'";
    header('location:./payment_options.php');
}
