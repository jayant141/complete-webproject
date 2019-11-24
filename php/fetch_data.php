<?php
include('./connect.php');
if (isset($_POST['action'])) {
    $query = "SELECT * FROM `items` WHERE 1";
    if (isset($_POST["minimum_price"], $_POST["maximum_price"]) && !empty($_POST['minimum_price']) && !empty($_post['maximun_price'])) {
        $query = "AND `Item_price` BETWEEN '" . $_POST["minimun_price"] . "' AND '" . $_POST["maximum_price"] . "'";
    }
    if (isset($_POST["type"])) {
        $type_filter = implode("','", $_POST["type"]);
        $query = "AND `type` IN('" . $type_filter . "')";
    }
}
$run = mysqli_query($conn, $query);
$row = mysqli_num_rows($run);
if ($row > 1) {
    while ($data = mysqli_fetch_assoc($run)) {
        ?>
        <div class="col-sm-4 col-lg-3 col-md-3">
            <div style="border:1px solid #cqc;border-radius:5px; padding:16px; margin-bottom:16px ">
                <img src="../images/" <?php echo $data['item_img'] ?>>
            </div>
        </div>
<?php

    }
} else {
    echo "No items found";
}

?>