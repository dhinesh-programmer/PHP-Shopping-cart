<?php
session_start();
error_reporting(0);
/* Database Connection */
$db_connection = @new mysqli('localhost', 'root', '', 'shopping_cart');

if ($db_connection->connect_error)
	{
	echo "Error: " . $db_connection->connect_error;
	exit();
	}

// Session balance maintenance

if (isset($_SESSION['my_balance']) != "")
	{
	$initial_balance = $_SESSION['my_balance'];
	}
  else
	{
	$initial_balance = '100.00';
	}

?>