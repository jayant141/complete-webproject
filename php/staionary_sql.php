<?php
include('./connect.php');
session_start();
if (isset($_SESSION["uid"])) {
    //echo "session in progress";
    // header('location:index.php');
} else {
    header("location:loginf.php");
}
$uid = $_SESSION['uid'];
if (isset($_POST['add'])) {
    $Item_id = $_POST['item_id'];
    $Item_name =  $_POST['item_name'];
    $Item_price = $_POST['item_price'];
    $query_add = "INSERT INTO `cart`(`item_id`, `item_name`, `item_price`, `use_id`) VALUES ('$Item_id','$Item_name','$Item_price','$uid')";
    $run_add = mysqli_query($conn, $query_add);
    header('location:stationary.php');
}
if (isset($_POST['order'])) {
    $Item_id = $_POST['item_id'];
    $Item_name =  $_POST['item_name'];
    $Item_price = $_POST['item_price'];
    $query_add = "INSERT INTO `cart`(`item_id`, `item_name`, `item_price`, `use_id`) VALUES ('$Item_id','$Item_name','$Item_price','$uid')";
    $run_add = mysqli_query($conn, $query_add);
    header('location:./cart.php');
}
if (isset($_POST['Donate'])) {
    $Item_id = $_POST['item_id'];
    $Item_name =  $_POST['item_name'];
    $Item_price = $_POST['item_price'];
    $query_req_id = "SELECT `s_id` FROM `items` WHERE `Item_id` ='$Item_id'";
    $run_req_id = mysqli_query($conn, $query_req_id);
    $data_req_id = mysqli_fetch_assoc($run_req_id);
    $req_id = $data_req_id['s_id'];
    $query_add = "INSERT INTO `donate`(`item_id`, `Requester_id`, `Donater_id`) VALUES ('$Item_id','$uid','$req_id')";
    $run_add = mysqli_query($conn, $query_add);
    header('location:stationary.php');
}
