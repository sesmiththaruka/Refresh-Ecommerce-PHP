<?php

session_start();

require "../connection.php";


 

    $chatnrs = Database::search("SELECT DISTINCT `from` FROM `chat` WHERE `to` = 'admin@gmail.com'");
    $chat_num = $chatnrs->num_rows;
    // echo $chat_num;
    for($a=0;$a<$chat_num;$a++){
        $chat = $chatnrs->fetch_assoc();
        
        $sec_chatrs = Database::search("SELECT * FROM `chat` WHERE `from` = '".$chat['from']."'");
        $sec = $sec_chatrs->fetch_assoc();
        // echo $sec["status_id"];

        if($sec["status_id"]=="1"){
            ?>

            <a class="list-group-item text-white " style="background-color: #D4AF37;">
                <div class="col-12" onclick="loadmsges('<?php echo $chat["from"]; ?>');">
                    <div class="row ">
                        <div class="col-12">
                            <h6 class="ms-0"><?php echo $chat["from"]; ?></h6>
                        </div>
                    </div>
                </div>
            </a>
    
    <?php
        }else{
            ?>

            <a class="list-group-item  " >
                <div class="col-12" onclick="loadmsges('<?php echo $chat["from"]; ?>');">
                    <div class="row ">
                        <div class="col-12">
                            <h6 class="ms-0"><?php echo $chat["from"]; ?></h6>
                        </div>
                    </div>
                </div>
            </a>
    
    <?php
        }

       

    }
    



?>
<!-- <script src="admin.js"></script> -->