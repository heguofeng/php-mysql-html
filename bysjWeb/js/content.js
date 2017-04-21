
window.onload=function(){	
	/*导航条固定位置*/
	$(window).scroll(function(){
		var top=$(this).scrollTop();
		var nav=$('.nav');
		var navTop=nav.offset().top;
		if(top>110){
			nav.addClass("wrap_logo_fixed");
			nav.removeClass("wrap_logo");
		}else{
			nav.addClass("wrap_logo");
			nav.removeClass("wrap_logo_fixed");
		}
	});	
	//封装一个ajax异步更新按钮事件			
	function btnClick(btn,newhtml){
		$(btn).on("click",function(){
			$(".content_right").load(newhtml);
		})
	}
	//左侧按钮事件
	btnClick("#charges","c_charges.php");
	btnClick("#about","c_about.php");
	btnClick("#services","c_services.php");
	btnClick("#joinUs","c_services.php");

	/*个人信息页面的按钮*/
	btnClick(".info_title_txt","infoEdit.php");
	btnClick("#editmsg","infoEdit.php");
	btnClick("#editpwd","infoEditPwd.php");	
	btnClick("#editTx","infoEditTx.php");	
	btnClick("#account","infoAccount.php");
	btnClick("#pay","infoPay.php");

}
