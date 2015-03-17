<?php

$db = new mysqli("localhost", "root", "123123", "trade");

try {
    // First of all, let's begin a transaction
	// $db->beginTransaction();

    // A set of queries; if one fails, an exception should be thrown
	// $db->query('first query');
	// $db->query('second query');
	// $db->query('third query');
	echo "try!\n";
	$value = rand(1, 100);
	echo "$value\n";
	$result = $db->query("INSERT INTO customers VALUES(null, '$value');");
	// while ($row = $result->fetch_assoc()) {
	// 	echo "result is \$row['id']:{$row['id']}, \$row['is_traded']:{$row['is_traded']}, \$row['ps']:{$row['ps']}, \$row['update_time']:{$row['update_time']}\n";
	// }

    // If we arrive here, it means that no exception was thrown
    // i.e. no query has failed, and we can commit the transaction
	// $db->commit();
} catch (Exception $e) {
    // An exception has been thrown
    // We must rollback the transaction
    echo "Exception!\n";
	// $db->rollback();
}

?>