<?php require "../connection.php";
$id = $_GET["id"];
if($id=="1"){
    ?>
    <!-- //////////// -->

    <div class="row">
    <?php
    $sid = "1";
    $orderrs = Database::search("SELECT * FROM `order` WHERE `status_id` = '" . $sid . "'");
    $order_num = $orderrs->num_rows;
    ?>
    <div id="1" class="active_order  text-center border border-1 border-primary col-2" onclick="searchOrder('1')">
        <span class="fs-6 fw-bolder">Pending </span><br>
        <span class="text-white fw-bold">(<?php echo $order_num ?>)</span>
    </div>
    <?php
    $o = Database::search("SELECT * FROM `order` WHERE `status_id` = '2'");
    $on = $o->num_rows;
    ?>
    <div id="2" class="order  text-center border border-1 border-primary col-2" onclick="searchOrder('2')">
        <span class="fs-6 fw-bolder">Approved </span> <br>
        <span class="text-white fw-bold">(<?php echo $on ?>)</span>
    </div>
    <?php
    $o1 = Database::search("SELECT * FROM `order` WHERE `status_id` = '3'");
    $on1 = $o1->num_rows;
    ?>
    <div id="3" class="order text-center border border-1 border-primary col-2" onclick="searchOrder('3')">
        <span class="fs-6 fw-bolder">processing </span><br>
        <span class="text-white fw-bold">(<?php echo $on1 ?>)</span>
    </div>
    <?php
    $o2 = Database::search("SELECT * FROM `order` WHERE `status_id` = '4'");
    $on2 = $o2->num_rows;
    ?>
    <div id="4" class="order border text-center border-1 border-primary col-2" onclick="searchOrder('4')">
        <span class="fs-6 fw-bolder">Ongoing </span> <br>
        <span class="text-white fw-bold">(<?php echo $on2 ?>)</span>
    </div>
    <?php
    $o3 = Database::search("SELECT * FROM `order` WHERE `status_id` = '5'");
    $on3 = $o3->num_rows;
    ?>
    <div id="5" class="order border text-center border-1 border-primary col-2" onclick="searchOrder('5')">
        <span class="fs-6 fw-bolder">Complete </span><br>
        <span class="text-white fw-bold">(<?php echo $on3 ?>)</span>
    </div>
    <?php
    $o4 = Database::search("SELECT * FROM `order` WHERE `status_id` = '6'");
    $on4 = $o4->num_rows;
    ?>
    <div id="6" class="order border text-center border-1 border-primary col-2" onclick="searchOrder('6')">
        <span class="fs-6 fw-bolder">Cancelled </span><br>
        <span class="text-white fw-bold">(<?php echo $on4 ?>)</span>
    </div>
</div>

    <!-- //////////// -->
    <?php
}else if($id=="2"){
    ?>
     <!-- //////////// -->

     <div class="row">
    <?php
    $sid = "1";
    $orderrs = Database::search("SELECT * FROM `order` WHERE `status_id` = '" . $sid . "'");
    $order_num = $orderrs->num_rows;
    ?>
    <div id="1" class="order  text-center border border-1 border-primary col-2" onclick="searchOrder('1')">
        <span class="fs-6 fw-bolder">Pending </span><br>
        <span class="text-white fw-bold">(<?php echo $order_num ?>)</span>
    </div>
    <?php
    $o = Database::search("SELECT * FROM `order` WHERE `status_id` = '2'");
    $on = $o->num_rows;
    ?>
    <div id="2" class="order active_order text-center border border-1 border-primary col-2" onclick="searchOrder('2')">
        <span class="fs-6 fw-bolder">Approved </span> <br>
        <span class="text-white fw-bold">(<?php echo $on ?>)</span>
    </div>
    <?php
    $o1 = Database::search("SELECT * FROM `order` WHERE `status_id` = '3'");
    $on1 = $o1->num_rows;
    ?>
    <div id="3" class="order text-center border border-1 border-primary col-2" onclick="searchOrder('3')">
        <span class="fs-6 fw-bolder">processing </span><br>
        <span class="text-white fw-bold">(<?php echo $on1 ?>)</span>
    </div>
    <?php
    $o2 = Database::search("SELECT * FROM `order` WHERE `status_id` = '4'");
    $on2 = $o2->num_rows;
    ?>
    <div id="4" class="order border text-center border-1 border-primary col-2" onclick="searchOrder('4')">
        <span class="fs-6 fw-bolder">Ongoing </span> <br>
        <span class="text-white fw-bold">(<?php echo $on2 ?>)</span>
    </div>
    <?php
    $o3 = Database::search("SELECT * FROM `order` WHERE `status_id` = '5'");
    $on3 = $o3->num_rows;
    ?>
    <div id="5" class="order border text-center border-1 border-primary col-2" onclick="searchOrder('5')">
        <span class="fs-6 fw-bolder">Complete </span><br>
        <span class="text-white fw-bold">(<?php echo $on3 ?>)</span>
    </div>
    <?php
    $o4 = Database::search("SELECT * FROM `order` WHERE `status_id` = '6'");
    $on4 = $o4->num_rows;
    ?>
    <div id="6" class="order border text-center border-1 border-primary col-2" onclick="searchOrder('6')">
        <span class="fs-6 fw-bolder">Cancelled </span><br>
        <span class="text-white fw-bold">(<?php echo $on4 ?>)</span>
    </div>
</div>

    <!-- //////////// -->
    <?php
}else if($id=="3"){
    ?>
    <!-- //////////// -->

    <div class="row">
   <?php
   $sid = "1";
   $orderrs = Database::search("SELECT * FROM `order` WHERE `status_id` = '" . $sid . "'");
   $order_num = $orderrs->num_rows;
   ?>
   <div id="1" class="order  text-center border border-1 border-primary col-2" onclick="searchOrder('1')">
       <span class="fs-6 fw-bolder">Pending </span><br>
       <span class="text-white fw-bold">(<?php echo $order_num ?>)</span>
   </div>
   <?php
   $o = Database::search("SELECT * FROM `order` WHERE `status_id` = '2'");
   $on = $o->num_rows;
   ?>
   <div id="2" class="order  text-center border border-1 border-primary col-2" onclick="searchOrder('2')">
       <span class="fs-6 fw-bolder">Approved </span> <br>
       <span class="text-white fw-bold">(<?php echo $on ?>)</span>
   </div>
   <?php
   $o1 = Database::search("SELECT * FROM `order` WHERE `status_id` = '3'");
   $on1 = $o1->num_rows;
   ?>
   <div id="3" class="active_order text-center border border-1 border-primary col-2" onclick="searchOrder('3')">
       <span class="fs-6 fw-bolder">processing </span><br>
       <span class="text-white fw-bold">(<?php echo $on1 ?>)</span>
   </div>
   <?php
   $o2 = Database::search("SELECT * FROM `order` WHERE `status_id` = '4'");
   $on2 = $o2->num_rows;
   ?>
   <div id="4" class="order border text-center border-1 border-primary col-2" onclick="searchOrder('4')">
       <span class="fs-6 fw-bolder">Ongoing </span> <br>
       <span class="text-white fw-bold">(<?php echo $on2 ?>)</span>
   </div>
   <?php
   $o3 = Database::search("SELECT * FROM `order` WHERE `status_id` = '5'");
   $on3 = $o3->num_rows;
   ?>
   <div id="5" class="order border text-center border-1 border-primary col-2" onclick="searchOrder('5')">
       <span class="fs-6 fw-bolder">Complete </span><br>
       <span class="text-white fw-bold">(<?php echo $on3 ?>)</span>
   </div>
   <?php
   $o4 = Database::search("SELECT * FROM `order` WHERE `status_id` = '6'");
   $on4 = $o4->num_rows;
   ?>
   <div id="6" class="order border text-center border-1 border-primary col-2" onclick="searchOrder('6')">
       <span class="fs-6 fw-bolder">Cancelled </span><br>
       <span class="text-white fw-bold">(<?php echo $on4 ?>)</span>
   </div>
</div>

   <!-- //////////// -->
   <?php
}else if($id=="4"){
    ?>
    <!-- //////////// -->

    <div class="row">
   <?php
   $sid = "1";
   $orderrs = Database::search("SELECT * FROM `order` WHERE `status_id` = '" . $sid . "'");
   $order_num = $orderrs->num_rows;
   ?>
   <div id="1" class="order  text-center border border-1 border-primary col-2" onclick="searchOrder('1')">
       <span class="fs-6 fw-bolder">Pending </span><br>
       <span class="text-white fw-bold">(<?php echo $order_num ?>)</span>
   </div>
   <?php
   $o = Database::search("SELECT * FROM `order` WHERE `status_id` = '2'");
   $on = $o->num_rows;
   ?>
   <div id="2" class="order  text-center border border-1 border-primary col-2" onclick="searchOrder('2')">
       <span class="fs-6 fw-bolder">Approved </span> <br>
       <span class="text-white fw-bold">(<?php echo $on ?>)</span>
   </div>
   <?php
   $o1 = Database::search("SELECT * FROM `order` WHERE `status_id` = '3'");
   $on1 = $o1->num_rows;
   ?>
   <div id="3" class="order text-center border border-1 border-primary col-2" onclick="searchOrder('3')">
       <span class="fs-6 fw-bolder">processing </span><br>
       <span class="text-white fw-bold">(<?php echo $on1 ?>)</span>
   </div>
   <?php
   $o2 = Database::search("SELECT * FROM `order` WHERE `status_id` = '4'");
   $on2 = $o2->num_rows;
   ?>
   <div id="4" class="active_order border text-center border-1 border-primary col-2" onclick="searchOrder('4')">
       <span class="fs-6 fw-bolder">Ongoing </span> <br>
       <span class="text-white fw-bold">(<?php echo $on2 ?>)</span>
   </div>
   <?php
   $o3 = Database::search("SELECT * FROM `order` WHERE `status_id` = '5'");
   $on3 = $o3->num_rows;
   ?>
   <div id="5" class="order border text-center border-1 border-primary col-2" onclick="searchOrder('5')">
       <span class="fs-6 fw-bolder">Complete </span><br>
       <span class="text-white fw-bold">(<?php echo $on3 ?>)</span>
   </div>
   <?php
   $o4 = Database::search("SELECT * FROM `order` WHERE `status_id` = '6'");
   $on4 = $o4->num_rows;
   ?>
   <div id="6" class="order border text-center border-1 border-primary col-2" onclick="searchOrder('6')">
       <span class="fs-6 fw-bolder">Cancelled </span><br>
       <span class="text-white fw-bold">(<?php echo $on4 ?>)</span>
   </div>
</div>

   <!-- //////////// -->
   <?php
}else if($id=="5"){
    ?>
    <!-- //////////// -->

    <div class="row">
   <?php
   $sid = "1";
   $orderrs = Database::search("SELECT * FROM `order` WHERE `status_id` = '" . $sid . "'");
   $order_num = $orderrs->num_rows;
   ?>
   <div id="1" class="order  text-center border border-1 border-primary col-2" onclick="searchOrder('1')">
       <span class="fs-6 fw-bolder">Pending </span><br>
       <span class="text-white fw-bold">(<?php echo $order_num ?>)</span>
   </div>
   <?php
   $o = Database::search("SELECT * FROM `order` WHERE `status_id` = '2'");
   $on = $o->num_rows;
   ?>
   <div id="2" class="order  text-center border border-1 border-primary col-2" onclick="searchOrder('2')">
       <span class="fs-6 fw-bolder">Approved </span> <br>
       <span class="text-white fw-bold">(<?php echo $on ?>)</span>
   </div>
   <?php
   $o1 = Database::search("SELECT * FROM `order` WHERE `status_id` = '3'");
   $on1 = $o1->num_rows;
   ?>
   <div id="3" class="order text-center border border-1 border-primary col-2" onclick="searchOrder('3')">
       <span class="fs-6 fw-bolder">processing </span><br>
       <span class="text-white fw-bold">(<?php echo $on1 ?>)</span>
   </div>
   <?php
   $o2 = Database::search("SELECT * FROM `order` WHERE `status_id` = '4'");
   $on2 = $o2->num_rows;
   ?>
   <div id="4" class="order border text-center border-1 border-primary col-2" onclick="searchOrder('4')">
       <span class="fs-6 fw-bolder">Ongoing </span> <br>
       <span class="text-white fw-bold">(<?php echo $on2 ?>)</span>
   </div>
   <?php
   $o3 = Database::search("SELECT * FROM `order` WHERE `status_id` = '5'");
   $on3 = $o3->num_rows;
   ?>
   <div id="5" class="active_order border text-center border-1 border-primary col-2" onclick="searchOrder('5')">
       <span class="fs-6 fw-bolder">Complete </span><br>
       <span class="text-white fw-bold">(<?php echo $on3 ?>)</span>
   </div>
   <?php
   $o4 = Database::search("SELECT * FROM `order` WHERE `status_id` = '6'");
   $on4 = $o4->num_rows;
   ?>
   <div id="6" class="order border text-center border-1 border-primary col-2" onclick="searchOrder('6')">
       <span class="fs-6 fw-bolder">Cancelled </span><br>
       <span class="text-white fw-bold">(<?php echo $on4 ?>)</span>
   </div>
</div>

   <!-- //////////// -->
   <?php
}else if($id=="6"){
    ?>
    <!-- //////////// -->

    <div class="row">
   <?php
   $sid = "1";
   $orderrs = Database::search("SELECT * FROM `order` WHERE `status_id` = '" . $sid . "'");
   $order_num = $orderrs->num_rows;
   ?>
   <div id="1" class="order  text-center border border-1 border-primary col-2" onclick="searchOrder('1')">
       <span class="fs-6 fw-bolder">Pending </span><br>
       <span class="text-white fw-bold">(<?php echo $order_num ?>)</span>
   </div>
   <?php
   $o = Database::search("SELECT * FROM `order` WHERE `status_id` = '2'");
   $on = $o->num_rows;
   ?>
   <div id="2" class="order  text-center border border-1 border-primary col-2" onclick="searchOrder('2')">
       <span class="fs-6 fw-bolder">Approved </span> <br>
       <span class="text-white fw-bold">(<?php echo $on ?>)</span>
   </div>
   <?php
   $o1 = Database::search("SELECT * FROM `order` WHERE `status_id` = '3'");
   $on1 = $o1->num_rows;
   ?>
   <div id="3" class="order text-center border border-1 border-primary col-2" onclick="searchOrder('3')">
       <span class="fs-6 fw-bolder">processing </span><br>
       <span class="text-white fw-bold">(<?php echo $on1 ?>)</span>
   </div>
   <?php
   $o2 = Database::search("SELECT * FROM `order` WHERE `status_id` = '4'");
   $on2 = $o2->num_rows;
   ?>
   <div id="4" class="order border text-center border-1 border-primary col-2" onclick="searchOrder('4')">
       <span class="fs-6 fw-bolder">Ongoing </span> <br>
       <span class="text-white fw-bold">(<?php echo $on2 ?>)</span>
   </div>
   <?php
   $o3 = Database::search("SELECT * FROM `order` WHERE `status_id` = '5'");
   $on3 = $o3->num_rows;
   ?>
   <div id="5" class="order border text-center border-1 border-primary col-2" onclick="searchOrder('5')">
       <span class="fs-6 fw-bolder">Complete </span><br>
       <span class="text-white fw-bold">(<?php echo $on3 ?>)</span>
   </div>
   <?php
   $o4 = Database::search("SELECT * FROM `order` WHERE `status_id` = '6'");
   $on4 = $o4->num_rows;
   ?>
   <div id="6" class="active_order border text-center border-1 border-primary col-2" onclick="searchOrder('6')">
       <span class="fs-6 fw-bolder">Cancelled </span><br>
       <span class="text-white fw-bold">(<?php echo $on4 ?>)</span>
   </div>
</div>

   <!-- //////////// -->
   <?php
}
?>
