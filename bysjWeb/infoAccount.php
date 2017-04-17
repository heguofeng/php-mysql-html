<?php
require_once 'include.php';
checkUserLogined();
if (isset($_SESSION['userId'])) {
	$id=$_SESSION['userId'];
} elseif (isset($_COOKIE['userId'])) {
	$id=$_COOKIE['userId' ];
	}
$userInfo=getUserById($id);
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8"/>
<title>个人中心</title>
<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="css/reset.css"/>
<link rel="stylesheet" type="text/css" href="css/main.css"/>
<script type="text/javascript" src="js/jquery.min.js"></script>

</head>
<body>
	<div class="table_all">
		<div class="info_title">
			<h3>我的账户</h3>
		</div>
		<div class="basicinfo_table">
			<table  cellspacing="0" cellpadding="0">
				<tr><td class="basicinfo_title">充值账号：</td><td ><input type="text" name="u_name" id="u_name" class="txtinput" disabled="true" style="" value="<?php echo $userInfo['u_name']; ?>" /></td></tr>
				<tr><td class="basicinfo_title td_crossline" style="vertical-align: middle;">当前余额：</td>
					<td class="td_crossline">
						<p class="current_balance"><span class="real_balance"><?php echo $userInfo['balance'];?></span><i>.00元</i></p><img id="shuaxin" class="shuaxin" src="images/shuaxin.png"/>
					</td>
				</tr>
					<tr><td class="basicinfo_title" style="vertical-align: middle;">充值金额：</td>
						<td>
							<span class="balance_span redhover">
								<input type="text" name="balance" id="balance" class="balance_input" placeholder="请输入整数" />
								<span class="balance_text">元</span>
							</span>
							<span id="alertText">请输入金额在1~99999元内的整数</span>
						</td>
					</tr>
				<tr><td class="basicinfo_title"><button id="addBalance" class="btn btn-warning" disabled="disabled">充值</button></td><td >		<div><p id="createResult_red"></p></div> <div><p id="createResult_green"></p></div></td></tr>
			</table>
		</div><!--basicinfo_table结束-->	
	</div><!--table_all-->		
		
<script type="text/javascript">
$().ready(function(){
	$(".balance_input").focus();
	$('.balance_input').keyup(function(){  
        var c=$(this);  
        if(/[^\d]/.test(c.val())){//替换非数字字符  
          var temp_amount=c.val().replace(/[^\d]/g,'');  
          $(this).val(temp_amount);  
        }  
        //设置按钮可用性及提醒语句
         if($("#balance").val()*1!=0){
    		$("#addBalance").attr("disabled",false);
    		$("#alertText").css("display","none");
   		 }else{
   		 	$("#addBalance").attr("disabled",true);
   		 	$("#alertText").css("display","inline-block");
   		 }
     });
     //点击充值按钮
    $("#addBalance").click(function(){
    	if($("#balance").val()>0){
    		$("#alertText").css("display","none");
			$.ajax({
				type:"post",
				url:"doUserAction.php?act=addBalance&id=<?php echo $id ?>",
				data:{
					balance:$("#balance").val(),
				},
				dataType:"json",
				success:function(data){
					if(data.success){
						$("#createResult_green").html(data.msg);
						$(".real_balance").html(parseInt($(".real_balance").text())+parseInt(data.banalce));
						$("#createResult_green").css("display","block");
						$("#createResult_red").css("display","none");
						setTimeout(function(){
							$("#createResult_green").css("display","none");
						},2000);
					}
					else{
						$("#createResult_red").html(data.msg);
						$("#createResult_red").css("display","block");
						$("#createResult_green").css("display","none");
					}
				},
				error:function(jqXHR){
					alert("发生错误:"+jqXHR.status);
				},
			});
			}else{
				$("#alertText").css("display","inline-block");
			}
	}); 
	 //点击刷新余额
    $("#shuaxin").click(function(){
    	//添加旋转属性
    	$("#shuaxin").addClass("rotate");
    	//3s后把这个属性撤销掉
    	setTimeout(function(){
    		$("#shuaxin").removeClass("rotate");
    		},3000);
		$.ajax({
			type:"post",
			url:"doUserAction.php?act=shuaxin&id=<?php echo $id ?>",
			dataType:"html",
			success:function(data){
				if(data){
					$(".real_balance").html(data);
				}
				else{
					$(".real_balance").html("刷新失败！");
				}
			},
			error:function(jqXHR){
				alert("发生错误:"+jqXHR.status);
			},
		});
	}); 
}); 
</script>
</body>
</html>
