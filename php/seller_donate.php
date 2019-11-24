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
$request_id = $_POST['request_id'];
if (isset($_POST['Accept'])) {
    $query_yes = "UPDATE `donate` SET `confirmation`= 1 WHERE `request_id`='$request_id' AND `Donater_id`= '$uid'";
    $run_yes = mysqli_query($conn, $query_yes);
    //$data_yes = mysqli_fetch_assoc($run_yes);
}
if (isset($_POST['Reject'])) {
    $query_no = "UPDATE `donate` SET `confirmation`= 0 WHERE `request_id`='$request_id' AND `Donater_id`= '$uid'";
    $run_no = mysqli_query($conn, $query_no);
    // $data_no = mysqli_fetch_assoc($run_no);
}
