<?php
$connect = mysqli_connect("localhost", "root", "", "webproject");
session_start();

if (isset($_SESSION["uid"])) {
    //header("location:admin_index.php");
} else {
    header('location:admin_login.php');
}
if (isset($_POST['delete'])) {
    $user_id = $_POST['user_id'];
    $query_user = "SELECT `user_id`, `Fname`, `Lname`, `Email`, `P_number` FROM `user` WHERE 'user_id' ='$user_id'";
    $run_user = mysqli_query($connect, $query_user);
    $data = mysqli_fetch_assoc($run_user);
    $item_id = $data['user_id'];
    $query_delete = "DELETE FROM `user` WHERE `user_id` ='$user_id'";
    $run_delete = mysqli_query($connect, $query_delete);
    //header('location:User_details.php');
    echo "Succesfully deleted....!!";
    header("location:user_details.php");
}
