<div class="col-12 px-0" onload="reee();">
    <div class="row px-4 py-5 chat-box bg-white" id="chatload" style="overflow-y: scroll; height:450px">
        <!-- massage load venne methana -->


        <?php
        session_start();
        require "../connection.php";
        if (isset($_SESSION["a"])) {

            $recever = $_POST["e"];

            $senderrs = Database::search("SELECT * FROM `chat` WHERE `from`='" . $recever . "'  OR `to`='" . $recever . "'");
            // $receverrs =  Database::search("SELECT * FROM `chat` WHERE `from`='".$recever."' OR `to`='".$recever."'");

            $n = $senderrs->num_rows;

            if ($n == 0) {
        ?>

                <!-- empty message -->
                <div class="col-12 mb-3 text-center">
                    <div class="msgbodyimg"></div>
                    <p class="fs-4 mt-3 fw-bold text-black-50">No Messages To Show.</p>
                </div>
                <!-- empty message -->

                <?php
            } else {
                for ($x = 0; $x < $n; $x++) {

                    $f = $senderrs->fetch_assoc();


                    if ($f["from"] == "admin@gmail.com") {
                        // echo "me : ";

                        // echo "<br/>";
                ?>
                        <!-- sender Message-->
                        <div class="col-5"></div>
                        <div class="col-7 media ml-auto mb-3">
                            <div class="media-body">
                                <div class=" rounded py-2 px-3 mb-2" style="background-color: #DAA520;">
                                    <p class="text-small mb-0 text-white"><?php echo $f["content"]; ?></p>
                                </div>
                                <p class="small text-muted"><?php echo $f["date"]; ?></p>
                            </div>
                        </div>
                        <!-- sender Message -->



                    <?php
                    } else {
                        // echo "you :";
                        // echo $f["content"];
                    ?>

                        <!-- receiver message -->
                        <div class="col-7 media mb-3">
                            <div class="media-body ml-3">
                                <div class="bg-light rounded py-2 px-3 mb-2" style="background-color: #F0E68C;">
                                    <p class="text-small mb-0 text-muted"><?php echo $f["content"]; ?></p>
                                </div>
                                <p class="small text-muted"><?php echo $f["date"]; ?></p>
                            </div>
                        </div>
                        <div class="col-5"></div>
                        <!-- reciver message -->

        <?php
                        // $email = $recever;
                    }
                }
            }
        }

        ?>
    </div>
</div>
<div class="col-12">
    <div class="row bg-white">

        <!-- text -->
        <div class="col-12">
            <div class="row">
                <div class="input-group">
                    <input type="text" id="msgtxt" placeholder="Type a message" aria-describedby="button-addon2" class="form-control rounded-0 border-0 py-4 bg-light">
                    <div class="input-group-append">
                        <button style="color: #DAA520;" id="button-addon2" class="btn fs-1" onclick="sendmessage('<?php echo $recever ?>');"> <i class="bi bi-cursor-fill"></i></button>

                    </div>
                </div>
            </div>
        </div>
        <!-- text -->

    </div>
</div>