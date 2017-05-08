<?php
	function alertMes($mes,$url){
		echo "<script>
			alert('{$mes}');
			window.location='{$url}';
			</script>";
	}
?>