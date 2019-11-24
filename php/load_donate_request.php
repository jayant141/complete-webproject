<?php
include('./connect.php');
session_start();
if (isset($_SESSION["uid"])) {
    //echo "session in progress";
    // header('location:index.php');
} else {
    header("location:loginf.php");
}
$new_request_count = $_POST['new_request_count'];
$uid = $_SESSION['uid'];
$donate = "SELECT `request_id`, `item_id`, `Requester_id`, `Donater_id`, `confirmation` FROM `donate` WHERE `Donater_id` = '$uid' LIMIT $new_request_count ";
$run = mysqli_query($conn, $donate);
if (mysqli_num_rows($run) > 0) {
    while ($data = mysqli_fetch_assoc($run)) {
        include("./connect.php");
        $item_id = $data['item_id'];
        $query_item = "SELECT * FROM `items` WHERE `Item_id` ='$item_id'";
        $run_item = mysqli_query($conn, $query_item);
        $data_item = mysqli_fetch_assoc($run_item);
        ?>
        <div style=" margin-top:2%; display:grid; grid-template-columns: 50% 50%;">
            <div style=" display:grid; grid-template-columns: 30% 70%; border:1px solid black">
                <form action="./seller_donate.php" method="post">
                    <div style="padding:5%">
                        <img src="../images/<?php echo $data_item["item_img"]; ?>" style="width: 30px; height: 30px;">
                    </div>
                    <div style="padding:5%">
                        <table style="margin-top:2%">
                            <tr>
                                <th>item_id</th>
                                <th>Requester_id</th>
                                <th>Donater_id</th>

                            </tr>
                            <tr>
                                <td><?php echo $data["item_id"]; ?></td>
                                <td><?php echo $data["Requester_id"]; ?></td>
                                <td><?php echo $data["Donater_id"]; ?></td>
                            </tr>
                            <tr>
                                <td><input type="hidden" name="Requester_id" value="<?php echo $data["Requester_id"]; ?>"></td>
                                <td><input type="hidden" name="request_id" value="<?php echo $data["request_id"]; ?>"></td>
                                <td><input type="submit" name="Accept" value="Accept" style="color:white; background-color:green;border:none"></td>
                                <td><input type="submit" name="Reject" value="Reject" style="color:white; background-color:red;border:none"></td>
                            </tr>
                        </table>


                </form>
            </div>
        </div>
        </div>
<?php
    }
} else {
    echo "There are no comments";
} ?>

</div>