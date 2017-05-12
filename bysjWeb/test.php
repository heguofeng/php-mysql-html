<html>
	<head>
		<title></title>
	</head>
	<body>
		<script src="js/jquery-1.8.3.min.js"></script>
		<a href="#" id="o">o</a><br />
		<a href="#" id="p">p</a><br />
		<a href="#" id="q">q</a><br />
		<div id="loading" ></div> <div id="content"></div>

		<script>
		 $(document).ready(function(){
		
		  $("#loading").ajaxStart(function(){
		   $(this).show();
		  }).ajaxStop(function(){//ajaxStop改为ajaxComplete也是一样的
		   $(this).hide();
		  });
		  
		  $("#o").click(function(){
		   $.post("for.php?id=o",function(data){
		    $("#content").html(data);
		   });
		  })
		
		  $("#p").click(function(){
		   $.post("for.php?id=p",function(data){
		    $("#content").html(data);
		   });
		  })
		
		  $("#q").click(function(){
		   $.post("for.php?id=q",function(data){
		    $("#content").html(data);
		   });
		  })
		
		 })
		</script>
	</body>
</html>
