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
					<tr><td class="basicinfo_title td_crossline">护理标准：</td> <td class="td_crossline"><textarea name="hlbz" id="hlbz" class="txtarea"> <?php echo $row['hlbz'] ?></textarea> </td></td> </tr>
					<tr><td class="basicinfo_title td_crossline">伙食费：</td> <td class="td_crossline"><input type="text" name="hsf" id="hsf" class="txtinput" value="<?php echo $row['hsf'] ?>" />&nbsp;元</td> </tr>	
					<tr><td class="basicinfo_title td_crossline">床位费：</td> <td class="td_crossline"><input type="text" name="cwf" id="cwf" class="txtinput" value="<?php echo $row['cwf'] ?>" />&nbsp;元</td> </tr>
					<tr><td class="basicinfo_title td_crossline">护理费：</td> <td class="td_crossline"><input type="text" name="hlf" id="hlf" class="txtinput" value="<?php echo $row['hlf'] ?>" />&nbsp;元</td> </tr>
					<tr><td class="basicinfo_title td_crossline">押金：</td> <td class="td_crossline"><input type="text" name="deposit" id="deposit" class="txtinput" value="<?php echo $row['deposit'] ?>" />&nbsp;元</td> </tr>
					<tr><td class="basicinfo_title td_crossline">共计：</td> <td class="td_crossline"><input type="text" name="allCost" id="allCost" class="txtinput" value="<?php echo $row['allCost'] ?>" />&nbsp;元</td> </tr>
					<tr><td class="basicinfo_title td_crossline">备注：</td> <td class="td_crossline"><textarea name="bz" id="bz" class="txtarea" ><?php echo $row['bz'] ?></textarea></td> </tr>	
				</table>
			</form>
			<button id="btn_edit" class="btn_save">保存</button>
		</div><!--basicinfo_table结束-->	
	</div><!--table_all-->		
<script type="text/javascript" src="../plugins/dialog.js"></script>			
<script type="text/javascript">
	var changeFlag=false;//标识文本框值是否改变，为true，标识已变
	function changeFlagTrue(){
		changeFlag=true;
	}
		//当页面刷新或者离开时，警告提示
	window.onbeforeunload = function(event) {
		if (changeFlag==true) {
		    event.returnValue = "我在这写点东西...";
		}
	}
$().ready(function(){
	$("input[type='text']").change(function(){
		changeFlagTrue()
	});
	$("textarea").change(function(){
		changeFlagTrue()
	});
	$("#btn_edit").click(function(){
		changeFlag=false;//更新标识值
		var flag=$("#formCost").valid();
		if(flag){
			//过渡中的提示框
		    var d1= dialog({
				content:'<span class=\'save_start\'>正在保存您的信息。</span>'
			});
			$(document).ajaxStart(function(){
				d1.show();					 
			});
			$.ajax({
				type:"post",
				url:"doAdminEcho.php?act=editCost&id=<?php echo $id ?>",
				data:{
					hljb:$("#hljb").val(),
					hlbz:$("#hlbz").val(),
					hsf:$("#hsf").val(),
					cwf:$("#cwf").val(),
					hlf:$("#hlf").val(),
					deposit:$("#deposit").val(),
					allCost:$("#allCost").val(),
					bz:$("#bz").val()
				},
				dataType:"json",
				success:function(data){
					if(data.success){
						d1.close().remove();//关闭中间过度动画
						var d= dialog({
							content:'<span class=\'save_success\'>'+data.msg+'</span>'
						});
						d.show();
						setTimeout(function(){
							d.close().remove();
						},2500);
					}
					else{
						d1.close().remove();//关闭中间过度动画
						var d= dialog({
							content:'<span class=\'save_failed\'>'+data.msg+'</span>'
						});
						d.show();
						setTimeout(function(){
							d.close().remove();
						},3000);
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
		$deposit=parseInt($("#deposit").val()?$("#deposit").val():'0');
		$("#allCost").val($hsf+$cwf+$hlf+$deposit);
	});
});
</script>
</body>
</html>
