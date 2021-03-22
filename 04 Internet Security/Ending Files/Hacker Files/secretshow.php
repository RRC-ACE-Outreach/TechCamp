<table border="1">
	<tr>
		<th>Session ID</th>
		<th>IP Address</th>
		<th>Host Address</th>
	</tr>
<?php
	require('connect_db.php');

	$select_sql = "SELECT * FROM secret;";
	$statement = $db->prepare($select_sql);
	$statement->execute();
	$results = $statement->fetchAll();

	foreach ($results as $item) {
?>
	<tr>
		<td><?= $item['phpsession'] ?></td>
		<td><?= $item['ip'] ?></td>
		<td><?= $item['domain'] ?></td>
	</tr>
<?php
	}
?>
</table>
