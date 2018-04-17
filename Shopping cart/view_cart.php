<?php
   include("config.php");
   $sessionID = $_COOKIE['PHPSESSID'];
                
   ?>
<!DOCTYPE html>
<html>
   <head>
      <title>Shopping cart | View Cart</title>
      <!-- for-mobile-apps -->
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
      <meta name="keywords" content="Shopping cart, buy beer, buy water online, buy cheese online" />
      <!-- //for-mobile-apps -->
      <link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
      <link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
      <!-- font-awesome icons -->
      <link href="css/font-awesome.css" rel="stylesheet" type="text/css" media="all" />
      <!-- //font-awesome icons -->
      <style>
         .alert_shop{
         background:#fff;
         }
      </style>
   </head>
   <body>
      <!-- header -->
      <?php include("include/header.php") ?>
      <!-- banner -->
      <div class="banner view_fulldiv">
         <div class="">
            <!-- about -->
            <div class="about whole_cart">
               <h3 class="title_product shp_cart">My cart</h3>
               <div class="checkout-right">
                  <?php if($select_count_prodt['num'] !='0'){ ?>
                  <h4>Your shopping cart contains: <span><?php echo $select_count_prodt['num']; ?> Products</span></h4>
                  <?php } else{ ?>	
                  <div align="center" class="no_items">
                     <h4 class="cart_empty">No Items in your cart</h4>
                     <a href="index.php" class="btn btn-success">Shop Now <i class="fa fa-shopping-cart"></i></a>
                  </div>
                  <?php } ?>
                  <?php if($select_count_prodt['num'] !='0'){ ?>
                  <table class="timetable_sub">
                     <thead>
                        <tr>
                           <th>SL No.</th>
                           <th>Product</th>
                           <th>Quality</th>
                           <th>Product Name</th>
                           <th>Price</th>
                           <th>Remove</th>
                        </tr>
                     </thead>
                     <?php
                        $query1=mysqli_query($db_connection, "select * from basket where shp_basket_ses='$sessionID'");
                        
                        $i=1;
                        while($result1=mysqli_fetch_array($query1))
                        {
                        $ref_id=$result1['shp_basket_product_id'];
                        
                        $query2=mysqli_query($db_connection, "select * from products where shp_product_delete_status='1' and shp_product_id='$ref_id'");
                        while($result2=mysqli_fetch_array($query2))
                        {
                        $mrpprice=$result2['shp_product_price'];   
                        
                        ?>
                     <tbody>
                        <tr class="rem1">
                           <td class="invert"><?php echo $i; ?></td>
                           <td class="invert-image"><a href="single.html"><img src="images/products/<?php echo $result2['shp_product_image']; ?>" alt=" " class="img-responsive"></a></td>
                           <td class="invert">
                              <!-- <div class="quantity"> 
                                 <div class="quantity-select">                           
                                 	<div class="entry value-minus">&nbsp;</div>
                                 	<div class="entry value"><span>5</span></div>
                                 	<div class="entry value-plus active">&nbsp;</div>
                                 </div>
                                 </div>-->
                              <form name="place_order" id="place_order" method="post" action="updateProduct.php?productId=<?php echo $result2['shp_product_id']; ?>">
                                 <input type="number" class="input-mini" name="quantity" id="quantity" value="<?php echo $result1['shp_product_quantity']; ?>" >
                                 <input type="hidden" name="basketId" id="basketId" value="<?php echo $result1['shp_basket_id']; ?>">
                                 <input type="hidden" name="price" id="price" value="<?php echo $result2['shp_product_price']; ?>">
                                 <input class="cat_refresh" type="submit" name="submit" value="">
                              </form>
                           </td>
                           <td class="invert"><?php echo $result2['shp_product_name']; ?></td>
                           <td class="invert">$<?php echo $result1['shp_basket_product_price']; ?></td>
                           <?php } ?>
                           <td class="invert">
                              <div class="rem">
                                 <a onclick="javascript:return confirm('Are you sure want to delete?')" href="removeProduct.php?rev_prod_id=<?php echo $result1['shp_basket_id']; ?>">
                                    <div class="close1"> </div>
                                 </a>
                              </div>
                           </td>
                           <?php $i++; }  ?>
                        </tr>
                     </tbody>
                  </table>
                  <div class="pull-right but-center"><br>
                     <a href="#proced_pay" class="btn btn-danger scroll">Proceed to pay</a>&nbsp;
                     <a href="index.php" class="btn btn-success">Continue Shopping</a>
                  </div>
                  <br><br><br>
                  <?php 
                     $query=mysqli_fetch_array(mysqli_query($db_connection, "select sum(shp_basket_product_price) as total from basket where shp_basket_ses='$sessionID'"));
                     
                     $total=$query['total'];	
                     $_SESSION['total']=$total;
                     
                     ?>				
                  <div class="total_cart">
                     <p>Total : $<?php echo $total; ?></p>
                  </div>
               </div>
               <div class="checkout-left">
                  <div class="col-md-12 address_form_agile form_pay" id="proced_pay">
                     <h3 class="title_product">Fill to pay</h3>
                     <form action="finalProcess.php" method="post" id="final_pay" class="creditly-card-form agileinfo_form">
                        <section class="creditly-wrapper wthree, w3_agileits_wrapper">
                           <div class="information-wrapper">
                              <div class="first-row form-group">
                                 <div class="controls">
                                    <label class="control-label">Full name: </label>
                                    <input class="billing-address-name form-control" required type="text" name="full_name" placeholder="Full name">
                                    <input class="billing-address-name form-control" type="hidden" value="<?php echo $sessionID; ?>?" name="ses_id" >
                                 </div>
                                 <div class="w3_agileits_card_number_grids">
                                    <div class="w3_agileits_card_number_grid_left">
                                       <div class="controls">
                                          <label class="control-label">Mobile number:</label>
                                          <input name="mobile_user" class="form-control" type="text" placeholder="Mobile number">
                                       </div>
                                    </div>
                                    <div class="w3_agileits_card_number_grid_right">
                                       <div class="controls">
                                          <label class="control-label">E-mail: </label>
                                          <input name="email_user" required class="form-control" type="text" placeholder="E-mail">
                                       </div>
                                    </div>
                                    <div class="w3_agileits_card_number_grid_right">
                                       <div class="controls">
                                          <label class="control-label">Transport type: </label>
                                          <select name="transport_user" required class="form-control" id="select_trans">
                                             <option value="">Select transport type</option>
                                             <option value="pickup">Pick up Cost 0$</option>
                                             <option value="UPSname" name="UPSname">UPS costs 5$ </option>
                                          </select>
                                       </div>
                                    </div>
                                    <div class="w3_agileits_card_number_grid_right total_final" id="totalcost">
                                       <div class="controls">
                                          <label class="control-label">Total Amount: </label>
                                          <input class="form-control" name="tot_value" value="<?php echo $total; ?>" readonly type="text">
                                       </div>
                                    </div>
                                    <input class="form-control" name="tot_value_ups" value="<?php echo $total + 5; ?>" type="hidden">
                                    <input class="form-control" name="tot_value_pick" value="<?php echo $total; ?>" type="hidden">
                                    <div class="w3_agileits_card_number_grid_right total_final" id="totalcostups" style="display:none">
                                       <div class="controls">
                                          <label class="control-label">Total Amount: </label>
                                          <input class="form-control" name="tot_value" value="<?php echo $total + 5; ?>" readonly type="text">
                                       </div>
                                    </div>
                                    <input type="submit" class="btn btn-success" value="Make a Payment" />
                                 </div>
                              </div>
                           </div>
                        </section>
                     </form>
                  </div>
                  <?php } ?>
                  <div class="clearfix"> </div>
               </div>
            </div>
            <!-- //about -->
         </div>
         <div class="clearfix"></div>
      </div>
      <!-- //banner -->
      <!-- footer starts -->
      <?php include("include/footer.php"); ?>
      <!-- footer ends -->
      <!-- js -->
      <script src="js/jquery-1.11.1.min.js"></script>	
      <script src="js/jquery.validate.js"></script>
      <script src="js/custom.js"></script>
      <!-- Bootstrap Core JavaScript -->
      <script src="js/bootstrap.min.js"></script>
      <!-- //js -->
      <script type="text/javascript">
         jQuery(document).ready(function($) {
         	$(".scroll").click(function(event){		
         		event.preventDefault();
         		$('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
         	});
         });
      </script>
      <script>
         $(function() {
             $('#select_trans').change(function(){
                 if($('#select_trans').val() == 'UPSname') {
                     $('#totalcostups').show(); 
         			 $('#totalcost').hide();
                 } else {
                     $('#totalcostups').hide(); 
         			$('#totalcost').show();
                 } 
             });
         });
      </script>
   </body>
</html>