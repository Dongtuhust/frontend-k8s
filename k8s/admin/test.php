<?php
require_once __DIR__ .'/vendor/autoload.php';
use PhpAmqpLib\Connection\AMQPConnection;
use PhpAmqpLib\Message\AMQPMessage;
$connection = new AMQPConnection('35.240.181.251', 31234, 'guest', 'guest');
$channel    = $connection->channel();
$channel->queue_declare('product_queue', false, false, false, false);

$product_item=array(
		"name" => "adsa",
		"description" => "asdasd",
		"price" => "2123",
		"category_id" => "qwe",
		"product_image" => "wqeq",
		"detail_image" => "qweq",
		"distributor" => "DASD",
		"quantity" => "213",
		"status" => "123",
		"update_time" => "3213",
		"created_time" => "21312",
		"purcharse_number" => "132"
);
$data = json_encode($product_item);
// $data = "hello";
$msg = new AMQPMessage($data, array('delivery_mode' => 2));

$channel->basic_publish($msg, '', 'product_queue');
?>
