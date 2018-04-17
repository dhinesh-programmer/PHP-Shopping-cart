<?php
   $sessionID = $_COOKIE['PHPSESSID'];
   $select_count_prodt=mysqli_fetch_array(mysqli_query($db_connection, "select COUNT(*) as num from basket where shp_basket_ses='$sessionID'"));
   
   ?>
<div class="header_shop">
   <div class="container">
      <div class="pull-left">
         <h1><a href="index.php" class="logo-cart">Shopping Cart</a></h1>
      </div>
      <div class="pull-right">
         <div class="dropdown">
            <a href="javascript:void(0)" class="dropbtn">
               <p class="view_header">View Cart  <i class="fa fa-shopping-cart"></i></p>
            </a>
            <div class="dropdown-content">
               <?php if($select_count_prodt['num'] !='0'){ ?>
               <a class="cart_details"><?php echo $select_count_prodt['num']; ?> Item added to your cart</a>
               <?php } else{ ?>
               <a class="cart_details"> Your cart is empty</a>
               <?php } ?>
               <a>Your Balance: $<?php echo $initial_balance; ?></a>
               <a href="view_cart.php" class="btn btn-success danger-but">View Basket</a>
            </div>
         </div>
      </div>
   </div>
</div>
<!-- Alert Messages -->
<div class="alert_shop">
   <div class="container" align="center">
      <div class="row">
         <?php
            if($_REQUEST['add_product'] == 'success'){
            	?>
         <div class="alert alert-success alert-dismissable" id="success-alert">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
            <strong>Your Product Added to Your Cart Successfully !! View cart <a href="view_cart.php">Click Here</a></strong>
         </div>
         <?php
            }
            else if($_REQUEST['remove'] == 'success'){
            	?>
         <div class="alert alert-success alert-dismissable" id="success-alert">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
            <strong>Your Product Deleted Successfully !!</strong>
         </div>
         <?php
            }
            else if($_REQUEST['order'] == 'success'){
            	?>
         <div class="alert alert-success alert-dismissable" id="success-alert">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
            <strong><i class="fa fa-hand"></i> &nbsp;Your Order Placed Successfully !! We will get back to you soon.</strong>
         </div>
         <?php
            }
            else if($_REQUEST['order'] == 'insuf'){
            	?>
         <div class="alert alert-danger alert-dismissable" id="danger-alert">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
            <strong>You have Insufficient balance to Shop !!</strong>
         </div>
         <?php
            }
            else if($_REQUEST['review'] == 'success'){
            	?>
         <div class="alert alert-success alert-dismissable" id="success-alert">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
            <strong>Your Rating posted Successfully !! Thanks for your thoughts</strong>
         </div>
         <?php
            }
            else if($_REQUEST['product_update'] == 'success'){
            	?>
         <div class="alert alert-success alert-dismissable" id="success-alert">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
            <strong>Your Product updated Successfully !!</strong>
         </div>
         <?php
            }
            else if($_REQUEST['msg'] == 'fail'){
            	?>
         <div class="alert alert-danger alert-dismissable" id="danger-alert">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
            <strong>There is some problem while processing your request please try after sometime !!</strong>
         </div>
         <?php } ?>
      </div>
   </div>
</div>