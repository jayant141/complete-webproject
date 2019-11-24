<?php
$connect = mysqli_connect("localhost", "root", "", "webproject");

if (isset($_POST['delete'])) {
    $item_id = $_POST['item_id'];
    //echo $item_id;
    //$query_item = "SELECT `user_id`, `Fname`, `Lname`, `Email`, `P_number` FROM `user` WHERE 'user_id' ='$user_id'";
    // $run_item = mysqli_query($connect, $query_item);
    //$data = mysqli_fetch_assoc($run_item);
    //$item_id = $data['item_id'];
    $query_delete = "DELETE FROM `items` WHERE `Item_id` ='$item_id'";
    $run_delete = mysqli_query($connect, $query_delete);
    //header('location:User_details.php');
    echo "Succesfully deleted....!!";
    header('location:product_details.php');
}
