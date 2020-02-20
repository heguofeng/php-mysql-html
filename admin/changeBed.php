<?php
require_once '../include.php';
$id=$_REQUEST['id'];
/*楼栋*/
$sql="select distinct building_id from bed where is_used =0 order by id asc";
$buildings=fetchAll($sql);
//楼层
$sql="select distinct floor_id from bed where is_used =0 order by id asc";
$floors=fetchAll($sql);
//不同房间
$sql="select distinct room_id from bed where is_used =0 order by id asc";
$rooms=fetchAll($sql);
//床
$sql="select distinct bed_id from bed where is_used =0 order by id asc";
$beds=fetchAll($sql);
//print_r($rooms);
$id=$_REQUEST['id'];
$userInfo=getUserById($id);
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8"/>
<title>个人中心</title>
<link rel="stylesheet" type="text/css" href="css/reset.css"/>
<link rel="stylesheet" type="text/css" href="css/backstage.css"/>
<script type="text/javascript" src="js/jquery.min.js"></script>
</head>
<body>
	<div class="location">
	当前位置:&nbsp;<a id="first" href="main.php">首页</a>&nbsp;&gt;&nbsp;<a>老人管理</a>&nbsp;&gt;&nbsp;<a href="#" id="third">换床</a>
	</div>
	<div class="table_all">
		<div class="info_title">
			<h3>换床<a class="info_title_txt" href="detialUsers.php?id=<?php echo $id ?>" title="点击预览">预览</a></h3>
		</div>
		<div class="basicinfo_table">
			<table  cellspacing="0" cellpadding="0">
				<tr><td class="basicinfo_title">账号：</td><td ><input type="text" disabled="true" name="u_username" id="u_username" class="txtinput" value="<?php echo $userInfo['u_username'] ?>" /></td></tr>
				<tr><td class="basicinfo_title td_crossline">姓名：</td><td class="td_crossline"><input type="text" name="u_name" id="u_name" class="txtinput" value="<?php echo $userInfo['u_name'] ?>" /></td></tr>
				<tr><td class="basicinfo_title td_crossline">床位号：</td>
					<td class="td_crossline">
						<span id="" class="fl">
							楼栋：
						</span>
						<select name="building_id" id="building_id" class="select_small fl">
							<?php foreach ($buildings as $building): ?>
								<option value="<?php echo $building['building_id'] ?>"><?php echo $building['building_id'] ?></option>
							<?php endforeach; ?>
						</select>
						<span id="" class="fl">
							&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;楼层：
						</span>
						<div class="select_floor fl">
							<select name="floor_id" id="floor_id" class="select_small">
								<option value="">请选择</option>
								<?php foreach ($floors as $floor): ?>
									<option value="<?php echo $floor['floor_id'] ?>"><?php echo "第".$floor['floor_id']."层" ?></option>
								<?php endforeach; ?>
							</select>
						</div>
						<span id="" class="fl">
							&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;房间：
						</span>
						<div class="select_room fl">
							<select name="room_id" id="room_id" class="select_small" disabled="disabled">
								<option value="">请选择</option>
								<?php foreach ($rooms as $room): ?>
									<option value="<?php echo $room['room_id'] ?>"><?php echo $room['room_id']."室" ?></option>
								<?php endforeach; ?>
							</select>
						</div>
						<span id="" class="fl">
							&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;空床：
						</span>
						<div class="select_bed fl">
							<select name="bed_id" id="bed_id" class="select_small" disabled="disabled">
								<option value="">请选择</option>
								<?php foreach ($beds as $bed): ?>
									<option value="<?php echo $bed['bed_id'] ?>"><?php echo $bed['bed_id']."号床" ?></option>
								<?php endforeach; ?>
							</select>
						</div>
					</td>
				</tr>				
			</table>
			<button id="btn_save" class="btn_save">保存</button>
		</div><!--basicinfo_table结束-->	
		<div><p id="createResult_red"></p></div>
		<div><p id="createResult_green"></p></div>
	</div><!--table_all-->		
		
<script type="text/javascript">
$().ready(function(){
	$("#floor_id").change(function(){
		$.ajax({
			type:"post",
			url:"doAdminEcho.php?act=select_floor",
			data:{
				floor_id:$("#floor_id").val(),
			},
			dataType:"html",
			success:function(data){
				if(data){
					//设置空床的下拉框不可选，并且值为“请选择”
					$(".select_bed").html('<select name="bed_id" id="bed_id" class="select_small"><option>请选择</option></select>');
					$("#bed_id").attr("disabled","disabled");
					//设置房间下拉框的内容
					$(".select_room").html(data);
					//重载一次房间DOM后，js也加载一遍
					$("#room_id").change(function(){
					$.ajax({
						type:"post",
						url:"doAdminEcho.php?act=select_room",
						data:{
							room_id:$("#room_id").val(),
						},
						dataType:"html",
						success:function(data){
							if(data){
								$(".select_bed").html(data);
							}
							else{
								$(".select_bed").html('<select name="bed_id" id="bed_id" class="select_small"><option>请选择</option></select>');
								$("#bed_id").attr("disabled","disabled");
							}
						},
						error:function(jqXHR){
							alert("发生错误:"+jqXHR.status);
						}
					});
				});
				}
				else{
					//设置空床的下拉框不可选，并且值为“请选择”
					$(".select_bed").html('<select name="bed_id" id="bed_id" class="select_small"><option>请选择</option></select>');
					$("#bed_id").attr("disabled","disabled");
					$(".select_room").html('<select name="room_id" id="room_id" class="select_small"><option>请选择</option></select>');
					$("#room_id").attr("disabled","disabled");
				}
			},
			error:function(jqXHR){
				alert("发生错误:"+jqXHR.status);
			}
		});
	});
	$("#room_id").change(function(){
		$.ajax({
			type:"post",
			url:"doAdminEcho.php?act=select_room",
			data:{
				room_id:$("#room_id").val(),
			},
			dataType:"html",
			success:function(data){
				if(data){
					$(".select_bed").html(data);
				}
				else{
					$(".select_bed").html('<select name="bed_id" id="bed_id" class="select_small"><option>请选择</option></select>');
					$("#bed_id").attr("disabled","disabled");
				}
			},
			error:function(jqXHR){
				alert("发生错误:"+jqXHR.status);
			}
		});
	});
	var u_bed='<?php echo $userInfo['u_bed']; ?>';
	$("#btn_save").click(function(){
		$.ajax({
			type:"post",
			url:"doAdminEcho.php?act=change_bed&id=<?php echo $id; ?>",
			data:{
				building_id:$("#building_id").val(),
				room_id:$("#room_id").val(),
				floor_id:$("#floor_id").val(),
				bed_id:$("#bed_id").val(),
				u_bed:u_bed,
			},
			dataType:"json",
			success:function(data){
				if(data.success){
					$("#createResult_green").html(data.msg);
					$("#createResult_green").css("display","inline");
					$("#createResult_red").css("display","none");
				}else{
					$("#createResult_red").html(data.msg);
					$("#createResult_red").css("display","inline");
					$("#createResult_green").css("display","none");
				}
			},
			error:function(jqXHR){
				alert("发生错误："+jqXHR.status);
			}
		});
	});
});
</script>
</body>
</html>
