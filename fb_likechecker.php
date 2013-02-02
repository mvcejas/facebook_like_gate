<?php

	$sql = new mysqli('localhost','root','','test');

	if(isset($_GET['fb_id'])){
		$fb_id = $_GET['fb_id'];
		$result = $sql->query("SELECT * FROM fb_likegate WHERE fb_id='$fb_id'");

		if($result->num_rows){
			echo 1;
		}
		else{
			echo 0;
		}
	}
?>