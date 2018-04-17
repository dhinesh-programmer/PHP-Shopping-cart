<?php
   include("config.php");
   
   $shp_select = "SELECT * from products LIMIT 0,4";
   $shp_select_exe =  mysqli_query($db_connection, $shp_select);
   
   ?>
<!DOCTYPE html>
<html>
   <head>
      <title>Shopping cart | Home</title>
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
      <!-- js -->
      <script src="js/jquery-1.11.1.min.js"></script>
      <!-- //js -->
   </head>
   <body>
      <!-- header start -->
      <?php include("include/header.php") ?>
      <!-- header ends -->
      <!-- Product Grid Start -->
      <div class="top-brands">
         <div class="container">
            <h3 class="title_product">Products</h3>
            <div class="agile_top_brands_grids">
               <?php while($shp_select_exe_fetch = mysqli_fetch_array($shp_select_exe)){ 
                  $select_review = "SELECT avg(shp_review_rating) as avg_rating from reviews WHERE shp_review_product_id ='". $shp_select_exe_fetch['shp_product_id'] ."'";
                  $select_review_exe =  mysqli_fetch_array(mysqli_query($db_connection, $select_review));
                  $rating_avg1 = $select_review_exe['avg_rating'];
                  $rating_avg = round($rating_avg1);
                   
                  ?>
               <div class="col-md-3 top_brand_left">
                  <div class="hover14 column">
                     <div class="agile_top_brand_left_grid">
                        <div class="agile_top_brand_left_grid1">
                           <figure>
                              <div class="snipcart-item block" >
                                 <div class="snipcart-thumb">
                                    <a href="addProduct.php?productId=<?php echo $shp_select_exe_fetch['shp_product_id']; ?>"><img title="<?php echo $shp_select_exe_fetch['shp_product_name']; ?>" alt="<?php echo $shp_select_exe_fetch['shp_product_name']; ?>" src="images/products/<?php echo $shp_select_exe_fetch['shp_product_image']; ?>" /></a>		
                                    <p><?php echo $shp_select_exe_fetch['shp_product_name']; ?></p>
                                    <h4>$<?php echo $shp_select_exe_fetch['shp_product_price']; ?> </h4>
                                 </div>
                                 <div class="snipcart-details top_brand_home_details">
                                    <a href="addProduct.php?productId=<?php echo $shp_select_exe_fetch['shp_product_id']; ?>" class="add_cart_btn">Add to cart</a>
                                 </div>
                                 <div align="center">
                                    <a href="" data-toggle="modal" data-id="<?php echo $shp_select_exe_fetch['shp_product_id']; ?>" data-target="#starRating" class="open-Addproduct">
                                       <div class="rating1">
                                          <input type="radio" id="star6" <?php if($rating_avg == 5){ echo "checked"; } ?>  /><label class = "full" for="star6" title="Awesome - 5 stars"></label>
                                          <input type="radio" id="star7"<?php if($rating_avg == 4){ echo "checked"; } ?> /><label class = "full" for="star7" title="Pretty good - 4 stars"></label>
                                          <input type="radio" id="star8" <?php if($rating_avg == 3){ echo "checked"; } ?> /><label class = "full" for="star8" title="Meh - 3 stars"></label>
                                          <input type="radio" id="star9" <?php if($rating_avg == 2){ echo "checked"; } ?> /><label class = "full" for="star9" title="Kinda bad - 2 stars"></label>
                                          <input type="radio" id="star10" <?php if($rating_avg == 1){ echo "checked"; } ?> /><label class = "full" for="star10" title="Sucks big time - 1 star"></label>
                                       </div>
                                    </a>
                                    <p style="padding-top:8px;padding-right:20px;">(<?php echo $rating_avg; ?>)</p>
                                 </div>
                              </div>
                           </figure>
                        </div>
                     </div>
                  </div>
               </div>
               <?php } ?>
               <div class="clearfix"> </div>
            </div>
         </div>
      </div>
      <!-- Product Grid end -->
      <!-- Modal -->
      <div class="modal fade" id="starRating" role="dialog">
         <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
               <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                  <h4 class="modal-title">Modal Header</h4>
               </div>
               <div class="modal-body">
                  <form action="reviewQuery.php" method="POST" class="creditly-card-form agileinfo_form">
                     <div class="controls">
                        <label class="control-label"> Name: </label>
                        <input class="billing-address-name form-control" required type="text" name="review_full_name" />
                        <input type="hidden" name="productId" id="productId" value="" />
                     </div>
                     <div class="rating rating-starts">
                        <br>
                        <p>Rate Product</p>
                        <input type="radio" id="star5" name="shp_product_rating" value="5"  /><label class = "full" for="star5" title="Awesome - 5 stars"></label>
                        <input type="radio" id="star4" name="shp_product_rating" value="4" /><label class = "full" for="star4" title="Pretty good - 4 stars"></label>
                        <input type="radio" id="star3" name="shp_product_rating" value="3" /><label class = "full" for="star3" title="Meh - 3 stars"></label>
                        <input type="radio" id="star2" name="shp_product_rating" value="2" /><label class = "full" for="star2" title="Kinda bad - 2 stars"></label>
                        <input type="radio" id="star1" name="shp_product_rating" value="1" /><label class = "full" for="star1" title="Sucks big time - 1 star"></label>
                     </div>
                     <div class="review_submit">
                        <input type="submit" class="btn btn-success" value="Post rating" />
                     </div>
                  </form>
               </div>
               <div class="modal-footer">
                  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
               </div>
            </div>
         </div>
      </div>
      <!-- footer -->
      <?php include("include/footer.php"); ?>
      <!-- //footer -->
      <!-- Bootstrap Core JavaScript -->
      <script src="js/bootstrap.min.js"></script>
	  <script src="js/custom.js"></script>
      <script>
         $(document).on("click", ".open-Addproduct", function () {
              var myBookId = $(this).data('id');
              $(".modal-body #productId").val( myBookId );
         
         });
      </script>
   </body>
</html>