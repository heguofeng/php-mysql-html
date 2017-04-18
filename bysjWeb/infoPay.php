<?php
require_once 'include.php';
checkUserLogined();
$hljbs=getAllhljb();
$row['pay_status']=0;
if (isset($_SESSION['userId'])) {
	$id=$_SESSION['userId'];
}elseif (isset($_COOKIE['userId'])) {
	$id=$_COOKIE['userId' ];
	}
$userInfo=getUserById($id);
//查询该用户护理级别
$sql="select * from dic_hljb where id={$userInfo['u_hljb']}";
if(mysql_query($sql)){
	$user_hljb=fetchOne($sql);
}else{
	 echo "<script>alert('请先选择护理明细级别！');</script>";
}
//查询该用户缴费记录
$sql="select * from pay_records where user_id={$id}";
if(mysql_query($sql)){
	$row=fetchOne($sql);
}
//echo $row['pay_status'];

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
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<style>
	.hljb,.hsf,.cwf,.hlf,.deposit,.allCost2{
		font-size: 16px;
		color: #F06F11;
	}
</style>
</head>
<body>
	<div class="table_all">
		<div class="info_title">
			<h3>缴费情况</h3>
		</div>
		<div class="basicinfo_table">
			<table  cellspacing="0" cellpadding="0">
				<tr><td class="basicinfo_title" style="vertical-align: middle;">选择护理级别：</td>
					<td>
						<select name="u_hljb" class="select_big" id="u_hljb">
							<?php foreach($hljbs as $hljb): ?>
							<option value="<?php echo $hljb['id']; ?>" <?php echo $hyzk['id']==$userInfo['u_hljb']?"selected='selected'":null; ?>>
									<?php echo $hljb['hljb']; ?>
							</option>
							<?php endforeach; ?>
						</select>
						<a tabindex="0" class="btn btn-danger" role="button" data-toggle="popover" title="护理明细说明" data-content="请看收费标准，内有各项护理级别详细信息。">护理级别怎么选？</a>
					</td>
				</tr>
				<tr><td class="basicinfo_title" style="vertical-align: middle;width: 130px;">应缴费用：</td><td ><p class="current_balance allCost"><?php echo $user_hljb['allCost'];?></p><i class="current_balance_after">.00元</i></td></tr>
				<tr><td class="basicinfo_title td_crossline" style="vertical-align: middle;">我的账单详情：</td> <td class="td_crossline">  </td> </tr>
				<tr><td class="basicinfo_title " style="vertical-align: middle;">我的护理级别名称：</td>
					<td class="">
						<p class="hljb"><?php echo $user_hljb['hljb']?></p>
					</td>
				</tr>
				<tr><td class="basicinfo_title " style="vertical-align: middle;">具体费用清单：</td>
					<td class="">
						<p class="fl">伙食费：</p><span class="fl">&nbsp;&nbsp;&yen;&nbsp;</span><p class="fl hsf"><?php echo $user_hljb['hsf']?></p>.00
					</td>
				</tr>
				<tr><td class="basicinfo_title " style="vertical-align: middle;"></td>
					<td class="">
						<p class="fl">床位费：</p><span class="fl">&nbsp;&nbsp;&yen;&nbsp;</span><p class="fl cwf"><?php echo $user_hljb['cwf']?></p>.00
					</td>
				</tr>
				<tr><td class="basicinfo_title " style="vertical-align: middle;"></td>
					<td class="">
						<p class="fl">护理费：</p><span class="fl">&nbsp;&nbsp;&yen;&nbsp;</span><p class="fl hlf"><?php echo $user_hljb['hlf']?></p>.00
					</td>
				</tr>
				<tr><td class="basicinfo_title " style="vertical-align: middle;"></td>
					<td class="">
						<p class="fl">押&nbsp;&nbsp;&nbsp;&nbsp;金：</p><span class="fl">&nbsp;&nbsp;&yen;&nbsp;</span><p class="fl deposit"><?php echo $user_hljb['deposit']?></p>.00
					</td>
				</tr>
				<tr><td class="basicinfo_title " style="vertical-align: middle;"></td>
					<td class="">
						<p class="fl">总&nbsp;&nbsp;&nbsp;&nbsp;计：</p><span class="fl">&nbsp;&nbsp;&yen;&nbsp;</span><p class="fl allCost allCost2"><?php echo $user_hljb['allCost']?></p>.00
					</td>
				</tr>
				<tr><td class="basicinfo_title">
					<?php if($row['pay_status']==0):?>
						<button id="payCharge" class="btn btn-warning">自助缴费</button>
					<?php else:?>
						<button id="payCharge" class="btn btn-warning" style="background-color: #11CD6E;border-color: #11cd6e;" disabled="disabled">已缴费</button>
					<?php endif;?>
					</td><td >
						<span class="fl" id="alertText"></span>
						<span class="fl" id="alertText2"></span>
					</td></tr>
			</table>
			<table  cellspacing="0" cellpadding="0">
				<tr><td class="basicinfo_title td_crossline" style="vertical-align: middle;">缴费记录：</td> <td class="td_crossline">  </td> </tr>
				<tr><td colspan="2" class=""> 
					<table  cellspacing="0" cellpadding="0" style="text-align: center;">
						<tr>
							<td width="5%">缴费订单号</td>
							<td width="15%">缴费时间</td>
							<td width="5%">缴费金额</td>
							<td width="10%">缴费者</td>
						</tr>
						<tr>
							<td><?php echo $row['id'];?></td>
							<td><?php echo $row['pay_time'];?></td>
							<td><?php echo $row['pay_money'].".00 元";?></td>
							<td><?php echo $userInfo['u_name'];?></td>
						</tr>
					</table>
					</td> 
				</tr>
				
			</table>
			
		</div><!--basicinfo_table结束-->	
	</div><!--table_all-->			
<script type="text/javascript">
$().ready(function(){
	$('[data-toggle="popover"]').popover();
		//选择框事件
	    $("#u_hljb").change(function(){
			$.ajax({
				type:"get",
				url:"doUserAction.php?act=hljb_select",
				data:{
					u_hljb:$("#u_hljb").val(),
				},
				dataType:"json",
				success:function(data){
					if(data.success){
						$(".allCost").html(data.allCost);
						$(".hljb").html(data.hljb);
						$(".hsf").html(data.hsf);
						$(".cwf").html(data.cwf);
						$(".hlf").html(data.hlf);
						$(".deposit").html(data.deposit);
					}
					else{
						alert("系统出错!");
					}
				},
				error:function(jqXHR){
					alert("发生错误:"+jqXHR.status);
				},
			});
	}); 
     //点击缴费按钮
    $("#payCharge").click(function(){
    	var user_id=<?php echo $id;?>;
    	var allCost=parseInt($(".allCost2").text());
		$.ajax({
			type:"post",
			url:"doUserAction.php?act=pay",
			data:{
				user_id:user_id,
				pay_money:allCost,
				u_hljb:$("#u_hljb").val(),
			},
			dataType:"json",
			success:function(data){
				if(data.res_id=='1'){
					$("#alertText2").html(data.msg);
					$("#alertText2").css("display","block");
					setTimeout(function(){
							$("#payCharge").attr("disabled","disabled");
							$("#payCharge").css({"background-color":"#11cd6e","border-color":"#11cd6e"});
							$("#payCharge").html("已缴费");
					},2000);
					
				}else{
					$("#alertText").html(data.msg);
					$("#alertText").css("display","block");
					
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
