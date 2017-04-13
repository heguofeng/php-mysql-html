<?php
require_once '../include.php';
//查询最后一条数据
$sql = "select * from bed order by id desc limit 1";
$row = fetchOne($sql);
/*每个房间号相同的数量*/
$sql = "select count(*) as room_num from bed where room_id={$row['room_id']}";
$room_num = fetchOne($sql);
/*查询每层所有房间数量*/
$sql = "SELECT count(DISTINCT room_id) AS room_allNum FROM bed where floor_id={$row['floor_id']}";
$room_allNum = fetchOne($sql);

//设置每个房间的床位数
$beds = 4;
//设置每层楼的房间数
$rooms = 3;

?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8"/>
		<title>添加床位</title>
		<link rel="stylesheet" type="text/css" href="css/reset.css"/>
		<link rel="stylesheet" type="text/css" href="css/backstage.css"/>
		<script type="text/javascript" src="js/jquery.min.js"></script>
		<script type="text/javascript" src="js/jquery.validate.min.js"></script>
		<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
		<script type="text/javascript" src="../js/bootstrap.min.js"></script>
	</head>
	<body>
		<div class="location">
			当前位置:&nbsp;
			<a id="first" href="main.php">
				首页
			</a>
			&nbsp;&gt;&nbsp;
			<a>
				床位管理
			</a>
			&nbsp;&gt;&nbsp;
			<a href="#" id="third">
				添加床位
			</a>
		</div>
		<div class="table_all">
			<div class="info_title">
				<h3>添加床位</h3>
			</div>
			<div class="basicinfo_table">
				<form id="formBed" name="formBed" action="doAdminAction.php?act=addBed" method="post">
					<table  cellspacing="0" cellpadding="0">
						<tr>
							<td class="basicinfo_title">编号：</td><td >
								<input type="text"  name="bed_id" id="bed_id" class="txtinput fl" disabled="true" value="<?php echo $row['id']+1; ?>"/>
								<p id="checkname" class="fl"></p></td>
						</tr>
						<tr>
							<td class="basicinfo_title td_crossline">床号：</td><td class="td_crossline">
								<input type="text" name="bed_id" id="bed_id" class="txtinput" value="<?php echo $row['bed_id'] < $beds ? $row['bed_id'] + 1 : 1; ?>" />
							</td>
						</tr>
						<tr>
							<td class="basicinfo_title td_crossline">房间号：</td><td class="td_crossline" >
								<input type="text" name="room_id" id="room_id" class="txtinput" value="<?php
								if ($row['bed_id'] == $beds) { $room_prev= $room_allNum['room_allNum'] == $rooms ? $row['floor_id'] + 1 : $row['floor_id'];
								} else { $room_prev=  $row['floor_id'];
								}
								if ($row['bed_id'] == $beds) {
									if ($room_allNum['room_allNum'] < $rooms) { echo $room_num['room_num'] == $beds ?$row['room_id'] + 1 : $row['room_id'];
									} else {echo $room_prev*100+1;
									}
								} else {echo $row['room_id'];
								}
 ?>" />
							</td>
						</tr>
						<tr>
							<td class="basicinfo_title td_crossline">楼层号：</td><td class="td_crossline">
								<input type="text" name="floor_id" id="floor_id" class="txtinput" value="<?php
								if ($row['bed_id'] == $beds) { echo $room_allNum['room_allNum'] == $rooms ? $row['floor_id'] + 1 : $row['floor_id'];
								} else { echo $row['floor_id'];
								}
 ?>  " />
							</td>
						</tr>
						<tr>
							<td class="basicinfo_title td_crossline">楼栋号：</td><td class="td_crossline">
								<input type="text" name="building_id" id="building_id" class="txtinput" value="1" />
							</td>
						</tr>
						<tr>
							<td class="basicinfo_title td_crossline">床位费：</td><td class="td_crossline">
								<input type="text" name="charge" id="charge" class="txtinput" value="1950" />
							</td>
						</tr>
					</table>
					<button id="btn_add" class="btn btn-primary">
					添加床位
					</button>
				</form>
			</div><!--basicinfo_table结束-->
			<div>
				<p id="createResult_red"></p>
			</div>
			<div>
				<p id="createResult_green"></p>
			</div>
		</div><!--table_all-->

		<script type="text/javascript">
			$("#bed_id").focus();
//			$("#btn_add").click();

		</script>
	</body>
</html>
