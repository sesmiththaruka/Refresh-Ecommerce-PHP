<?php
session_start();

if (isset($_SESSION["a"])) {

?>

    <!DOCTYPE html>

    <html>

    <head>
        <title>Refresh | Messages</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="icon" href="../resources/logo.jpeg" />
        <link rel="stylesheet" href="../bootstrap.css" />
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
        <!-- <link rel="stylesheet" href="style.css"/> -->
    </head>

    <body onload="refresher();">
        <div class="container-fluid">
            <div class="row">
<div class="col-12">
    <div class="row">
        <div class="col-2">
            <a href="adminpanel.php">GoTo Dashboard</a>
        </div>
    </div>
</div>
                <div class="col-12">
                    <hr>
                </div>

                <div class="col-12 py-5 px-4">
                    <div class="row rounded-lg overflow-hidden shadow">
                        <div class="col-5 px-0">
                            <div class="row">
                                <div class="bg-white">
                                    <div class="row">

                                        <div class="col-12 px-4 py-2 bg-light">
                                            <p class="h5 mb-0 py-1">Recent</p>
                                        </div>

                                        <div class="col-12 px-4 py-2 messages-box">
                                            <div class="row" id="rcv">

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- massage box -->
                        <div class="col-7">
                            <div class="row" id="chatrow">

                            </div>
                        </div>




                    </div>
                </div>

            </div>
        </div>



        <script src="admin.js"></script>

    </body>

    </html>

<?php

}

?>