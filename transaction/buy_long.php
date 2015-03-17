<?php
// useage: php buy.php <user_id>
$user_id = $argv[1];
$stock_id = 1;
exec("echo \"user_id:$user_id, start_time_ms:$(($(date +%s%N)/1000000))\" >> print.log");

mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
$db = new mysqli("localhost", "root", "123123", "trade");

$action = array('user_id' => $user_id, "stock_id" => $stock_id);
$action_record_start_id = save_action_record($db, $action);

$result = $db->query("SELECT * FROM `stock` WHERE id = 1");
$row = $result->fetch_assoc();

try {
	echo "try!\n";
    // First of all, let's begin a transaction
	$db->autocommit(FALSE); // equal START TRANSACTION or BEGIN

    // A set of queries; if one fails, an exception should be thrown

    $db->query("INSERT INTO `trade_record` (`id`, `user_id`, `stock_id`, `action_id`, `new_time`) VALUES (NULL, '$user_id', '$stock_id', '$action_record_start_id', NOW());");

	$db->query("UPDATE stock SET stock=stock-1 WHERE id=1");

	sleep(rand(1,3));

    // If we arrive here, it means that no exception was thrown
    // i.e. no query has failed, and we can commit the transaction
	$db->commit();
} catch (Exception $e) {
    // An exception has been thrown
    // We must rollback the transaction
    echo "Exception!\n";
	$db->rollback();
}

$db->autocommit(TRUE);
$action = array('action_record_start_id' => $action_record_start_id, 'status' => 'END_TRANSACTION');
save_action_record($db, $action);

echo "\n";

function milliseconds() {
    $mt = explode(' ', microtime());
    return $mt[1] * 1000 + round($mt[0] * 1000);
}

function save_action_record($db, $action) {
	$action_json = json_encode($action);
	$ms = milliseconds();
	$sql = "INSERT INTO action_record VALUES (NULL, '$action_json', '$ms', NOW())";
	// echo $sql."\n";
	$db->query($sql);
	return $db->insert_id;
}
?>