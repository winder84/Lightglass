<?php
/**
 * Created by JetBrains PhpStorm.
 * User: winder
 * Date: 20.04.13
 * Time: 18:44
 * To change this template use File | Settings | File Templates.
 */
for($i = 1; $i <= 30; $i++) {
	if(file_exists($_SERVER['DOCUMENT_ROOT'] . "/img/pro_{$_REQUEST['pro_id']}_{$i}.jpg")) {
		$file_id = $i + 1;
	}
}
$uploaddir = 'img/';
$file = $uploaddir . 'pro_' . $_REQUEST['pro_id'] . '_' . $file_id . '.jpg';
if (move_uploaded_file($_FILES['uploadfile']['tmp_name'], $file)) {
	echo 'pro_' . $_REQUEST['pro_id'] . '_' . $file_id . '.jpg';
}