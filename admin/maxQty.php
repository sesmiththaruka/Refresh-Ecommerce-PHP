<?php
require "../connection.php";
?>
<!DOCTYPE html>
<html>

<head>
    <title>Max Qty</title>
    <link rel="stylesheet" href="../bootstrap.css">
</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="row">
                    <div class="offset-3 col-6">
                        <h3>Max Qty</h3>
                    </div>
                </div>
            </div>
            <div class="col-12">
                <div class="row">
                    <?php
                    $qtyrs =  Database::search("SELECT * FROM `qty`");
                    $qtyr = $qtyrs->fetch_assoc();
                    ?>
                    <div class="col-2">
                        <input id="qty" type="number" value="<?php echo $qtyr["qty"] ?>">
                    </div>
                    <div class="col-12">
                        <button class="btn btn-success" onclick="updatemaxqty();">Update</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="admin.js"></script>
</body>

</html>