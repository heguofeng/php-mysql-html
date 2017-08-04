
/*首页脚本程序*/
//myFocus.set({
//	id:'boxID2',//焦点图盒子ID
//	pattern:'mF_expo2010',//风格应用的名称
//	time:5,//切换时间间隔(秒)
//	trigger:'mouseover',//触发切换模式:'click'(点击)/'mouseover'(悬停)
//	width:260,//设置图片区域宽度(像素)
//	height:230,//设置图片区域高度(像素)
//	txtHeight:'default'//文字层高度设置(像素),'default'为默认高度，0为隐藏
//});

window.onload=function(){
	//var clientHeight=document.documentElement.clientHeight;//获取页面可视区域高度	
	//scrollBox文字滚动效果   间歇性滚动
	 var scrollBox = document.getElementById('scrollBox');
	 var iliHeight = 30;//单行滚动的高度
	 var speed = 50;//滚动的速度，50ms一次
	 var time;
	 var time1;
	 var delay= 1000;//延迟时间
	 scrollBox.scrollTop=0;//滚动高度
	 scrollBox.innerHTML+=scrollBox.innerHTML;//克隆一份一样的内容
	 function startScroll(){
	 	 clearInterval(time);
		 time=setInterval(scrollUp,speed);
		 scrollBox.scrollTop++;
		 }
	 function scrollUp(){
		 if(scrollBox.scrollTop % iliHeight==0){
		 	 clearTimeout(myScroll);
			 clearInterval(time);
			 time1=setTimeout(startScroll,delay);//上升一行后，停留一秒，再执行
			 }
		 else{
			 scrollBox.scrollTop++;
			  if(scrollBox.scrollTop >= scrollBox.scrollHeight/2){
				 scrollBox.scrollTop =0;
				 }
			 }
		}
	var myScroll= setTimeout(startScroll,delay);//最初开始计时
	scrollBox.onmouseover=function(){
		 clearInterval(time);
		 clearTimeout(myScroll);
		 clearTimeout(time1);
		 }
	scrollBox.onmouseout = function(){
		 myScroll= setTimeout(startScroll,delay);
		} 
		
	//scrollPic图片一直滚动效果		
	 var scrollPic = document.getElementById('scrollPic');
	 var scrollPic1 = document.getElementById('scrollPic1');
	 var scrollPic2 = document.getElementById('scrollPic2');
	 var speed = 50;
	 scrollPic.scrollLeft = 0;
	 scrollPic2.innerHTML = scrollPic1.innerHTML;
	 function scrollLeft(){
		 if(scrollPic.scrollLeft >= scrollPic1.scrollWidth) {
			 scrollPic.scrollLeft = 0;
			 }else{
			   scrollPic.scrollLeft ++; 
			 } 
	}
	var leftScroll = setInterval(scrollLeft,speed);
	scrollPic.onmouseover = function(){
		 clearInterval(leftScroll);
		}
	scrollPic.onmouseout = function(){
		 leftScroll = setInterval(scrollLeft,speed);
	}
	//在窗口大小变化时更新
	$(window).resize(function(){
		scroll();
	});
	function scroll(){//滚动事件合集
	/*导航条设置fixed效果*/
	var winWidth=$(window).width();
		$(window).scroll(function(){
			var top=$(document).scrollTop();
			var nav=$('.nav');
			if(winWidth>480){
			 	if(top>120){
			 		nav.addClass("wrap_logo_fixed");
			 		nav.removeClass("wrap_logo");
			 	}else{
			 		nav.addClass("wrap_logo");
			 		nav.removeClass("wrap_logo_fixed");
				}
				//设置回到顶部按钮效果
				if(top>=400){
					//$('#to_top').css("display","block");
					$("#to_top").fadeIn("slow");
				}else{
					//$('#to_top').css("display","none");
					$("#to_top").fadeOut("slow");
				}
			}
		});
	}
	scroll();//执行滚动事件
	//回到顶部
	$('#to_top').click(function(){
			$('body,html').animate({scrollTop:0},500);
	});

}
