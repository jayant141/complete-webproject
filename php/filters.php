<!DOCTYPE html>
<html>

<head>
    <script src="https://code.jquery.com/jquery-1.10.2.min.js" integrity="sha256-C6CB9UYIS9UJeqinPHWTHVqh/E1uhG5Twh+Y5qFQmYg=" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="https://code.jquery.com/ui/1.10.2/themes/smoothness/jquery-ui.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <style>
        #loading {
            text-align: center;
            background: url('../html_imges/loader.gif') no-repeat center;
            height: 150px;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="row">
            <br />
            <h1></h1>
            <br />
        </div>
        <div class="col-md-3">
            <div class="list-group">
                <h1>price</h1>
                <input type="hidden" id="hidden_minimum_price" value="0">
                <input type="hidden" id="hidden_maximum_price" value="10000">
                <p id="price_show">0-10000</p>
                <div id="price_range"> </div>

            </div>
            <div calss="list-group">
                <h3>Brand</h3>
                <div style="height:180px; overflow-y:auto; overflow-x:hidden;">
                    <?php
                    include('./connect.php');
                    //fetch results+ 
                    $type_name = "SELECT DISTINCT(`type`) FROM `items` ORDER BY `item_id` DESC";
                    $run = mysqli_query($conn, $type_name);
                    while ($row = mysqli_fetch_assoc($run)) {
                        ?>
                        <div class="list-group-item check">
                            <label><input type="checkbox" class="common_selector type" value="<?php echo $row['type']; ?>"><?php echo $row['type']; ?></label>

                        </div>
                    <?php
                    }
                    ?>
                </div>
            </div>
        </div>
        <div class="col-md-9">
            <br />
            <div class="row filter_data">
            </div>
        </div>
        <script>
            $(document).ready(function() {
                filter_data();

                function filter_data() {
                    $('.filter_data').html('<div id="loading" style=""></div>');
                    var action = 'fetch_data';
                    var minimum_price = $('#hidden_minimum_price').val();
                    var maximum_price = $('#hidden_maximum_price').val();
                    var type = get_filter('type');
                    $.ajax({
                        url: "fetch_data.php",
                        method: "post",
                        data: {
                            action: action,
                            minimum_price: minimum_price,
                            maximum_price: maximum_price,
                            type: type
                        },
                        sucess: function(data) {
                            $('.filter_data').html(data);
                        }
                    });
                }


                function get_filter(class_name) {
                    var filter = [];
                    $('.' + class_name + ':checked').each(function() {
                        filter.push($(this).val());
                    });
                    return filter;
                }
                $('.common_selector').click(function() {
                    filter_data();
                });
                $('#price_range').slider({
                    range: true,
                    min: 0,
                    max: 10000,
                    values: [0, 10000],
                    step: 100,
                    stop: function(event, ui) {
                        $('#price_show').html(ui.values[0] + ' - ' + ui.values[1]);
                        $('#hidden_minimum_price').val(ui.values[0]);
                        $('#hidden_maximum_price').val(ui.values[1]);
                        filter_data();
                    }
                });
            });
        </script>
</body>

</html>