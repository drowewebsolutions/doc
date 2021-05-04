<?php
	include'../config/config.php';
 
$post_order = isset($_POST["post_order_ids"]) ? $_POST["post_order_ids"] : [];
$size = count($post_order);
$o = 1;
for ($f = 0; $f < $size; $f++) {
	$orderandid = $post_order[$f][0];
	$order = explode(",", $orderandid)[0];
	$id = explode(",", $orderandid)[1];

	$sql = "UPDATE histy_prescription_drugs SET order_no=".$o." WHERE id=".$id."";
	$stmt = $db->prepare($sql);
	$stmt->execute();
$o++;
};

 
?>