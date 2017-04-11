<?php
	function alertMes($mes,$url){
		echo "<script>alert('{$mes}');</script>";
		echo "<script>window.location='{$url}';</script>";
	}
?>