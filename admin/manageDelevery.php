<?php

session_start();


require "../connection.php";
?>

<!DOCTYPE html>
<html>

<head>
    <title>Manage Delevery Cost</title>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="../bootstrap.css">

    <link rel="stylesheet" href="admin.css">
    <link rel="icon" href="../resources/logo.svg">
</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="row">
                    <ul class="nav">
                        <li class="nav-item">
                            <a class="nav-link active" href="adminpanel.php">Dashboard</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="manageDelevery.php">Delevery cost</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-12 mt-5">
                <div class="row">
                    <div class="offset-1 col-6">
                        <div class="row">
                            <div class="col-12">
                                <div class="row">
                                    <div class="text-black-50 col-4">
                                        <h2>Town</h2>
                                    </div>
                                    <div class="col-8 text-black-50 text-end">
                                        <h2>Cost</h2>
                                    </div>
                                </div>
                            </div>


                            <?php
                            $deleveryrs = Database::search("SELECT * FROM `delivery`;");
                            $deleveryn = $deleveryrs->num_rows;
                            // echo $deleveryn;
                            for ($a = 0; $a < $deleveryn; $a++) {
                                $delevery = $deleveryrs->fetch_assoc();
                            ?>
                                <div class="col-12" onclick="updateDelevery(<?php echo $delevery['id']; ?>)">
                                    <div class="row border border-1 border-primary">
                                        <div class="col-4">
                                            <span class="fs-3 fw-bolder"><?php echo $delevery["name"] ?></span>
                                        </div>
                                        <div class="col-8 text-end">
                                            <span class="fs-3"><?php echo $delevery["price"] ?></span>
                                        </div>
                                    </div>
                                </div>

                                <!-- modal -->
                                <div class="modal fade" id="delevery<?php echo $delevery['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Update Delevery Cost</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="col-12">
                                                    <div class="row">
                                                        <div class="col-4">
                                                            <span>Name</span>
                                                        </div>
                                                        <?php
                                                        $namers = Database::search("SELECT * FROM `delivery` WHERE `id`='" . $delevery['id'] . "'");
                                                        $name = $namers->fetch_assoc();
                                                        ?>
                                                        <div class="col-8">
                                                            <input class="col-12" type="text" placeholder="Enter City Name" value="<?php echo $name['name'] ?>">
                                                        </div>
                                                    </div>
                                                    <div class="row mt-3">
                                                        <div class="col-4">
                                                            <span>Cost</span>
                                                        </div>
                                                        <div class="col-8">
                                                            <div class="input-group mb-3">
                                                                <span class="input-group-text">$</span>
                                                                <input type="text" class="form-control" aria-label="Amount (to the nearest dollar)" value="<?php echo $delevery['price'] ?>" id="dcost<?php echo $delevery['id']; ?>" />
                                                                <span class="input-group-text">.00</span>
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                <button type="button" class="btn btn-primary" onclick="uDelevery(<?php echo $delevery['id'] ?>);">Save changes</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- modal -->


                            <?php
                            }
                            ?>
                            <div class="bg-secondary mt-3 col-12 text-center" onclick="addnewDelevery();">
                                <div class="row">
                                    <h5>Add New</h5>
                                </div>
                            </div>
                            <!-- modal -->
                            <div class="modal fade" id="newDelevry" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Add New Delevery Cost</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="col-12">
                                                <div class="row">
                                                    <div class="col-4">
                                                        <span>Name</span>
                                                    </div>

                                                    <div class="col-8">
                                                        <input class="col-12" type="text" placeholder="Enter City Name" id="name">
                                                    </div>
                                                </div>
                                                <div class="row mt-3">
                                                    <div class="col-4">
                                                        <span>Cost</span>
                                                    </div>
                                                    <div class="col-8">
                                                        <div class="input-group mb-3">
                                                            <span class="input-group-text">$</span>
                                                            <input type="text" class="form-control" aria-label="Amount (to the nearest dollar)" id="cost" />
                                                            <span class="input-group-text">.00</span>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            <button type="button" class="btn btn-primary" onclick="AddNew();">Save changes</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- modal -->

                        </div>
                    </div>
                    <div class="col-12">
                        <div class="row">
                            <div class="col-5">

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>





    <script src="../bootstrap.bundle.js"></script>
    <script src="admin.js"></script>
</body>

</html>