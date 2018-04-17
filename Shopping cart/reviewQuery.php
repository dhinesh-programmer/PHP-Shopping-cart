<?php
session_start();
include ("config.php");

$sessionID = $_COOKIE['PHPSESSID'];

// Review Query saved in MysQl Database

if ($_POST['shp_product_rating'] != "")
	{
	$rev_product_id = $_POST['productId'];
	$rev_product_rating = $_POST['shp_product_rating'];
	$review_full_name = $_POST['review_full_name'];
	$query = "INSERT INTO reviews (shp_review_product_id, shp_user_name, shp_review_rating, shp_rating_ses) VALUES ('$rev_product_id','$review_full_name','$rev_product_rating','$sessionID')";
	mysqli_query($db_connection, $query);
	header("location:index.php?review=success");
	exit();
	}
  else
	{
	header("location:index.php?msg=fail");
	exit();
	}

?>