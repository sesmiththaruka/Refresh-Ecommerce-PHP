<?php

session_start();

require "connection.php";

if (isset($_SESSION["u"])) {

    $recever = $_SESSION["u"]["email"];



    $senderrs = Database::search("SELECT * FROM `chat` WHERE `from`='" . $recever . "' OR `to`='" . $recever . "'");
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


            if ($f["from"] == $recever) {
                // echo "me : ";

                // echo "<br/>";
        ?>
                <!-- sender Message-->
                <div class="col-5"></div>
                <div class="col-7 media ml-auto mb-3">
                    <div class="media-body">
                        <div class="fw-bold rounded py-2 px-3 mb-2" style="background-color: 	#CFB53B;">
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
                        <div class="fw-bold rounded py-2 px-3 mb-2" style="background-color: #EEE8AA;">
                            <p class="text-small mb-0 text-muted"><?php echo $f["content"]; ?></p>
                        </div>
                        <p class="small text-muted"><?php echo $f["date"]; ?></p>
                    </div>
                </div>
                <div class="col-5"></div>
                <!-- reciver message -->

<?php
            }
        }
    }
}

?>