<?php
include ("config.php");

//checking quantity for update
if ($_POST['quantity'] == 0)
	{
	$update_product = mysqli_query($db_connection, "delete from basket where shp_basket_id='" . $_POST['basketId'] . "'");
	}
  else
	{
	$update_product = mysqli_query($db_connection, "UPDATE basket SET shp_product_quantity='" . $_POST['quantity'] . "', shp_basket_product_price='" . $_POST['quantity'] * $_POST['price'] . "' WHERE shp_basket_id='" . $_POST['basketId'] . "'");
	}

if ($update_product != "")
	{
	header("location:view_cart.php?product_update=success");
	exit();
	}
  else
	{
	header("location:view_cart.php?msg=fail");
	exit();
	}

?>