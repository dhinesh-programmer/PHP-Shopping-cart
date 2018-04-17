<?php
include ("config.php");

$sessionID = $_COOKIE['PHPSESSID'];

if ($_POST['transport_user'] != "" && $_POST['full_name'] != "")
	{

	// Checking for the transport type

	if ($_POST['transport_user'] == 'UPSname')
		{
		$tot_value = $_POST['tot_value_ups'];
		}
	  else
	if ($_POST['transport_user'] == 'pickup')
		{
		$tot_value = $_POST['tot_value_pick'];
		}

	// Checking whether the total amount is less than user amount

	if ($initial_balance > $tot_value)
		{
		$your_bal = $initial_balance - $tot_value;
		$_SESSION['my_balance'] = $your_bal;
		mysqli_query($db_connection, "INSERT INTO manage_order (user_name, user_mobile, user_email, user_transport_type, total_amount) VALUES ('" . $_POST['full_name'] . "', '" . $_POST['mobile_user'] . "', '" . $_POST['email_user'] . "', '" . $_POST['transport_user'] . "', '$tot_value')");
		mysqli_query($db_connection, "delete from basket where shp_basket_ses='$sessionID'");
		header("location:view_cart.php?order=success");
		exit();
		}
	  else
		{
		header("location:view_cart.php?order=insuf");
		exit();
		}
	}
  else
	{
	header("location:view_cart.php?msg=fail");
	exit();
	}

?>