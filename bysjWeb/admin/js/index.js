/*侧面菜单来回切换*/
$(".side_menu").on('click', 'li h3', function() {
	var animationSpeed = 300;
	var $this = $(this);
	var checkElement = $this.next();
	//如果菜单为显示
	if(checkElement.is('.menu_item_child') && checkElement.is(':visible')) {
		checkElement.slideUp(animationSpeed);
		$this.find('span').html("+");
	}
	//如果菜单不可见
	else if(checkElement.is('.menu_item_child') && (!checkElement.is('visible'))) {
		checkElement.slideDown(animationSpeed);
		$this.find('span').html("-");
	}
});
$(".menu_item_child").on('click', 'li a', function() {
	var animationSpeed = 300;
	var $this = $(this);
	var checkElement = $this.next();
	//如果菜单为显示
	if(checkElement.is('.menu_item_grandchild') && checkElement.is(':visible')) {
		checkElement.slideUp(animationSpeed);
		$this.find('span').html("+");
	}
	//如果菜单不可见
	else if(checkElement.is('.menu_item_grandchild') && (!checkElement.is('visible'))) {
		checkElement.slideDown(animationSpeed);
		$this.find('span').html("-");
	}
});
/*前进后退*/
$("#goback").click(function(){
	window.history.back();
});
$("#goforward").click(function(){
	window.history.forward();
});

function clock(){
	function double(num){
		if(num<10){
			return "0"+num;
		}else{
			return ""+num;
		}
	}
	var date = new Date();
	var weekday = ["星期日", "星期一", "星期二", "星期三", "星期四", "星期五", "星期六"];
	var nowTime=document.getElementById("clock");
	nowTime.innerHTML=(
	date.getFullYear() + "年 " +
	double(date.getMonth()+1) + " 月 " +
	double(date.getDate()) + " 日 " +
	weekday[date.getDay()]+"&nbsp;&nbsp;"+
	double(date.getHours())+"点"+
	double(date.getMinutes())+"分"+
	double(date.getSeconds())+"秒")
	setTimeout("clock()",1000);
}
$().ready(function(){
	 var Lis = document.getElementsByTagName("li");
    for (i = 0; i < Lis.length; i++) {
        Lis[i].onmouseover = function () {
            this.className = "lihover";
        }
        Lis[i].onmouseout = function () {
            this.className = "";
        }
    }
    //设置当前时间
    setTimeout("clock()");
    
    //自动设置iframe高度
    function autoHeight(){
	    var height1=$(".head").height();
	    var height2=$(".top_user").height();
	    var height3=$(".footer").height();
    	var height4=window.innerHeight?window.innerHeight:document.documentElement.clientHeight;
        var iHeight=height4-height1-height2-height3;
        $("iframe").css("height",iHeight);
    }
  	autoHeight();
  	//当屏幕大小发生改变时，iframe高度再次自动变化
    $(window).resize(function(){
    	autoHeight();
    });
});