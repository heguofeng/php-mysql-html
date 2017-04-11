<?php
require_once '../include.php';
$id=$_REQUEST['id'];
$sql="select * from dic_hljb where id={$id}";
$row=fetchOne($sql);
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8"/>
<title>修改护理级别</title>
<link rel="stylesheet" type="text/css" href="css/reset.css"/>
<link rel="stylesheet" type="text/css" href="css/backstage.css"/>
<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/jquery.validate.min.js"></script>
</head>
<body>
	<div class="location">
	当前位置:&nbsp;<a id="first" href="main.php">首页</a>&nbsp;&gt;&nbsp;<a>费用管理</a>&nbsp;&gt;&nbsp;<a href="#" id="third">修改护理级别</a>
	</div>
	<div class="table_all">
		<div class="info_title">
			<h3>修改护理级别</h3>
		</div>
		<div class="basicinfo_table">
			<form id="formCost" name="formCost" action="#" method="post">
				<table  cellspacing="0" cellpadding="0">
					<tr><td class="basicinfo_title">编号：</td><td ><input type="text" disabled="true" name="id" id="id" class="txtinput" value="<?php echo $row['id'] ?>" /></td></tr>
					<tr><td class="basicinfo_title td_crossline">护理级别：</td> <td class="td_crossline"><input type="text" name="hljb" id="hljb" class="txtinput fl" value="<?php echo $row['hljb'] ?>" /><p id="checkname" class="fl"></p></td> </tr>
					<tr><td class="basicinfo_title td_crossline">护理标准：</td> <td class="td_crossline"><textarea name="hlbz" id="hlbz" class="txtarea"> <?php echo $row['bz'] ?></textarea> </td></td> </tr>
					<tr><td class="basicinfo_title td_crossline">伙食费：</td> <td class="td_crossline"><input type="text" name="hsf" id="hsf" class="txtinput" value="<?php echo $row['hsf'] ?>" />&nbsp;元</td> </tr>	
					<tr><td class="basicinfo_title td_crossline">床位费：</td> <td class="td_crossline"><input type="text" name="cwf" id="cwf" class="txtinput" value="<?php echo $row['cwf'] ?>" />&nbsp;元</td> </tr>
					<tr><td class="basicinfo_title td_crossline">护理费：</td> <td class="td_crossline"><input type="text" name="hlf" id="hlf" class="txtinput" value="<?php echo $row['hlf'] ?>" />&nbsp;元</td> </tr>
					<tr><td class="basicinfo_title td_crossline">共计：</td> <td class="td_crossline"><input type="text" name="allCost" id="allCost" class="txtinput" value="<?php echo $row['allCost'] ?>" />&nbsp;元</td> </tr>
					<tr><td class="basicinfo_title td_crossline">备注：</td> <td class="td_crossline"><textarea name="bz" id="bz" class="txtarea" ><?php echo $row['bz'] ?></textarea></td> </tr>	
				</table>
			</form>
			<button id="btn_edit" class="btn_save">保存</button>
		</div><!--basicinfo_table结束-->	
		<div><p id="createResult_red"></p></div>
		<div><p id="createResult_green"></p></div>
	</div><!--table_all-->		
		
<script type="text/javascript">
$().ready(function(){
	$("#btn_edit").click(function(){
		var flag=$("#formCost").valid();
		if(flag){
			$.ajax({
				type:"post",
				url:"doAdminEcho.php?act=editCost&id=<?php echo $id ?>",
				data:{
					hljb:$("#hljb").val(),
					hlbz:$("#hlbz").val(),
					hsf:$("#hsf").val(),
					cwf:$("#cwf").val(),
					hlf:$("#hlf").val(),
					allCost:$("#allCost").val(),
					bz:$("#bz").val()
				},
				dataType:"json",
				success:function(data){
					if(data.success){
						$("#createResult_green").html(data.msg);
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
				}
			});
		}
	});
	$("#formCost").validate({
			rules:{
				hljb:{
					required:true
				},
				hlbz:{
					required:true
				},
				hsf:{
					required:true
				},
				cwf:{
					required:true
				},
				hlf:{
					required:true
				}
			},
			messages:{
				hljb:{
						required:"一定要写哦"
					},
					hlbz:{
						required:"一定要写哦"
					},
					hsf:{
						required:"一定要写哦"
					},
					cwf:{
						required:"一定要写哦"
					},
					hlf:{
						required:"一定要写哦"
					}
			}
		});
	$("#hljb").focus();
	$("#hljb").keyup(function(){
		$.ajax({
			type:"post",
			url:"doAdminEcho.php?act=checkCost",
			data:{
				hljb:$("#hljb").val()
			},
			dataType:'json',
			success:function(data){
				if(data.d==1){
					$("#checkname").html("已存在该名称，请更换");
					$("#checkname").css("color","red");
					$("#btn_edit").attr("disabled",true);
				}
				if(data.d==2){
					$("#checkname").html("名称可用");
					$("#checkname").css("color","green");
					$("#btn_edit").attr("disabled",false);
				}
			},
			error:function(jqXHR){
				alert("发生错误"+jqXHR.status);
			}
		});	
	});
	$("#allCost").focus(function(){
		$hsf=parseInt($("#hsf").val()?$("#hsf").val():'0');
		$cwf=parseInt($("#cwf").val()?$("#cwf").val():'0');
		$hlf=parseInt($("#hlf").val()?$("#hlf").val():'0');
		$("#allCost").val($hsf+$cwf+$hlf);
	});
});
</script>
</body>
</html>
