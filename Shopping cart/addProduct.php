<?php
session_start();
include ("config.php");

$sessionID = $_COOKIE['PHPSESSID'];
$product_id = $_GET['productId'];

//Selecting product to check with basket
$sql_product = mysqli_query($db_connection, "select * from products where shp_product_id='$product_id'");
$row = mysqli_fetch_array($sql_product);
$shp_price_product = $row['shp_product_price'];
$shp_product_id = $row['shp_product_id'];

$quantity = '1';

//selecting basket with product id to check whether to insert or to update
$avail_check = mysqli_fetch_array(mysqli_query($db_connection, "SELECT * FROM basket WHERE shp_basket_product_id='$product_id' AND shp_basket_ses='$sessionID'"));

if (empty($avail_check))
	{
	$query = "INSERT INTO basket (shp_basket_ses, shp_basket_product_id, shp_basket_product_price, shp_product_quantity) VALUES ('$sessionID','$shp_product_id','$shp_price_product','$quantity')";
	}
  else
	{
	$quantity1 = $quantity + $avail_check['shp_product_quantity'];
	$productPrice = $quantity1 * $shp_price_product;
	$query = "UPDATE basket SET shp_product_quantity='$quantity1', shp_basket_product_price='$productPrice' WHERE shp_basket_product_id='$product_id' AND shp_basket_ses='$sessionID'   ";
	}

$add_product_qry = mysqli_query($db_connection, $query);

if ($add_product_qry != "")
	{
	header("Location: index.php?add_product=success");
	exit();
	}
  else
	{
	header("Location: index.php?msg=fail");
	exit();
	}

?>