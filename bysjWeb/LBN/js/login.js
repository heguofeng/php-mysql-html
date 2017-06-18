var $form;
var form;
var $;
layui.use(['jquery','layer', 'form','element'], function(){//只调用需要的layui模块
	$=layui.jquery;
	form=layui.form();
	$form=$('form');
  var layer = layui.layer,
  element=layui.element();
  form.on('submit(login_btn)',function(data){
  	return false;
  });
  form.on('switch(autoFlag)',function(data){
  	if(data.elem.checked){
  		data.value="1";
  		$("#autoFlag").val("1");
  	}else{
  		data.value="0";
  		$("#autoFlag").val("0");
  	}
//	 console.log(data.value);
//	 console.log(data.field); 
  });
 });
function openLogin(){
	//获取整个页面的高度与宽度
	var sWidth=document.body.scrollWidth;
	var sHeight=document.body.scrollHeight;
	//获取页面的可视区域高度和宽度
	var cHeight=document.documentElement.clientHeight;
	var cWidth=document.documentElement.clientWidth;
	//设置透明背景层的高宽
	var ologinBg=document.getElementById("loginBg");
	ologinBg.style.width=sWidth+"px";
	ologinBg.style.height=sHeight+'px';
	//当页面大小发生变化时，改变遮罩层大小
	$(window).resize(function(){
		var sHeight=document.body.scrollHeight;
		var sWidth=document.body.scrollWidth;
		ologinBg.style.width=sWidth+"px";
		ologinBg.style.height=sHeight+'px';
	});
}
window.onload=function(){
	openLogin();	
}
/*点击注册*/
$("#btn_reg").on("click",function(){
		$(".loginBg").css("display","block");
 		$("#regBox").css("display","block");
});
/*点击登录*/
$("#btn_login").click(function(){
		$(".loginBg").css("display","block");
 		$("#loginBox").css("display","block");
});
/*点击遮挡层*/
$("#loginBg").click(function(){
		$(".loginBg").css("display","none");
 		$("#loginBox").css("display","none");
 		$("#regBox").css("display","none");
});
/*点击登录框里的注册*/
$("#box_btn_reg").click(function(){
 		$("#loginBox").css("display","none");
 		$("#regBox").css("display","block");
});
/*点击注册框里的登录*/
$("#box_btn_login").click(function(){
 		$("#loginBox").css("display","block");
 		$("#regBox").css("display","none");
});


//注册
	$("#reg_btn").click(function(){
		$.ajax({
			type:"post",
			url:"doUserAction.php?act=reg",
			async:true,
			data:{
				username:$("#reg_username").val(),
				password:$("#reg_password").val(),
				security_code:$("#security_code").val()
			},
			dataType:"json",
			success:function(data){
				if(data.success){
					alert(data.msg);
				}else{
					alert(data.msg);
				}
			},
			error:function(jqXHR){
				alert("发生错误："+jqXHR.status);
			}
		});	
	});
	//获取验证码
$("#btn_code").click(function(){
		$.ajax({
				type:"POST",
				url:"doUserAction.php?act=code",
				data:{
					username:$("#reg_username").val(),
					},
				dataType:"json",
				success:function(data){
					if(data.success){
						var i=60;//60s
						var time2=setInterval(function(){
							i--;
							$("#btn_code").text(i+"秒");
						},1000);
						var time1=setTimeout(function(){
							$("#btn_code").text("获取验证码");
							clearInterval(time2);
							$("#btn_code").css({"pointer-events":"auto","background-color":"rgb(30, 159, 255)"});
						},60000);
						$("#btn_code").css({"pointer-events":"none","background-color":"#ccc"});
					}
				},
				error:function(jqXHR){
					alert("发生错误:"+jqXHR.status);
				},
		});
});
//登录
$("#login_btn").click(function(){
		$.ajax({
				type:"post",
				url:"doUserAction.php?act=login",
				async:true,
				data:{
					username:$("#username").val(),
					password:$("#password").val(),
					autoFlag:$("#autoFlag").val()
				},
				dataType:"json",
				success:function(data){
					if(data.success){
						alert(data.msg);
					}else{
						alert(data.msg);
					}
				},
				error:function(jqXHR){
					alert("发生错误："+jqXHR.status);
				}
		});	
	});