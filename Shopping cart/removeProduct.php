<?php
include ("config.php");

//Delete product from cart
if ($_REQUEST['rev_prod_id'] != "")
	{
	mysqli_query($db_connection, "delete from basket where shp_basket_id='" . $_REQUEST['rev_prod_id'] . "'");
	header("location:view_cart.php?remove=success");
	exit();
	}
  else
	{
	header("location:view_cart.php?msg=fail");
	exit();
	}

?>