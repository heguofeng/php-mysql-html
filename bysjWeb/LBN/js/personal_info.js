//初始化地址数据
var areaData = Area;
var $form;
var form;
var $;
layui.use(['jquery', 'layer', 'form','element','laydate'], function(){//只调用需要的layui模块
	 $ = layui.jquery;
	form = layui.form();
	$form = $('form');
	  var layer = layui.layer,
	  laydate=layui.laydate,
	  element=layui.element();
	  loadProvince();//三级联动地址

  	form.on('switch(work)',function(data){	
 		 if(data.elem.checked){
 		 	data.value="1";
 		 	$("#work").val("1");
 		 }else{
 		 	data.value="0";
 		 	$("#work").val("0");
 		 }
 		 console.log(data.value);
  	 console.log(data.field); 
  	});
	//住院开关控制器
  	form.on('switch(is_hospital)',function(data){	
 		 if(data.elem.checked){
 		 	data.value="1";
 		 	$("#is_hospital").val("1");
 		 	$(".hospital_detial").css("display","block");
 		 	$(".hospital_detial").find("input").removeAttr("disabled");
 		 }else{
 		 	data.value="0";
 		 	$("#is_hospital").val("0");
 		 	$(".hospital_detial").css("display","none");
 		 	$(".hospital_detial").find("input").attr("disabled","disabled");
 		 }
  	});
  	form.on('switch(is_smoke)',function(data){	
 		 if(data.elem.checked){
 		 	data.value="1";
 		 	$("#is_smoke").val("1");
 		 	$(".smoke_detial").css("display","block");
 		 	$(".smoke_detial").find("input").removeAttr("disabled");
 		 }else{
 		 	data.value="0";
 		 	$("#is_smoke").val("0");
 		 	$(".smoke_detial").css("display","none");
 		 	$(".smoke_detial").find("input").attr("disabled","disabled");
 		 }
// 		 console.log(data.value);
  	});
  	form.on('switch(is_drink)',function(data){	
 		 if(data.elem.checked){
 		 	data.value="1";
 		 	$("#is_drink").val("1");
 		 	$(".drink_detial").css("display","block");
 		 	$(".drink_detial").find("input").removeAttr("disabled");
 		 }else{
 		 	data.value="0";
 		 	$("#is_drink").val("0");
 		 	$(".drink_detial").css("display","none");
 		 	$(".drink_detial").find("input").attr("disabled","disabled");
 		 }
// 		 console.log(data.value);
  	});
  		 //保存 
	form.on('submit(btn_save)',function(data){
		form.render(); //更新全部
//	    console.log(data.field); //当前容器的全部表单字段，名值对形式：{name: value}
	    return false; //阻止表单跳转。如果需要表单跳转，去掉这段即可。
	});
});

 //加载省数据
function loadProvince() {
    var proHtml = '';
    for (var i = 0; i < areaData.length; i++) {
        proHtml += '<option value="' + areaData[i].provinceCode + '_' + areaData[i].mallCityList.length + '_' + i + '">' + areaData[i].provinceName + '</option>';
    }
    //初始化省数据
    $form.find('select[name=province]').append(proHtml);
    form.render();//重新渲染数据
    form.on('select(province)', function(data) {
      //  $form.find('select[name=area]').html('<option value="">请选择县/区</option>').parent().hide();//隐藏县
        var value = data.value;
        var d = value.split('_');
        var code = d[0];
        var count = d[1];
        var index = d[2];
        if (count > 0) {
            loadCity(areaData[index].mallCityList);
        } else {
            $form.find('select[name=city]').parent().hide();
        }
    });
}
 //加载市数据
function loadCity(citys) {
    var cityHtml = '';
    for (var i = 0; i < citys.length; i++) {
        cityHtml += '<option value="' + citys[i].cityCode + '_' + citys[i].mallAreaList.length + '_' + i + '">' + citys[i].cityName + '</option>';
    }
    $form.find('select[name=city]').html(cityHtml).parent().show();
    form.render();
    form.on('select(city)', function(data) {
        var value = data.value;
        var d = value.split('_');
        var code = d[0];
        var count = d[1];
        var index = d[2];
        if (count > 0) {
            loadArea(citys[index].mallAreaList);
        } else {
            $form.find('select[name=area]').parent().hide();
        }
    });
}
 //加载县/区数据
function loadArea(areas) {
    var areaHtml = '';
    for (var i = 0; i < areas.length; i++) {
        areaHtml += '<option value="' + areas[i].areaCode + '">' + areas[i].areaName + '</option>';
    }
    $form.find('select[name=area]').html(areaHtml).parent().show();
    form.render();
    form.on('select(area)', function(data) {
        //console.log(data);
    });
}

//左侧导航宽度变换
function resize_l(){
	$("#p_main_left").height(($(window).height()-80)*0.87);
}
$(document).ready(function(){
	//更新左右框位置
	resize_l();
	$(window).resize(resize_l);
	$(".p_main").height($("#p_main_right").height()+20);
	$(window).scroll(function(){
		var top=$(document).scrollTop();
		if(top>=60){
			$("#p_main_left").removeClass("p_main_left");
			$("#p_main_left").addClass("p_main_left_fixed");
		}else{
			$("#p_main_left").removeClass("p_main_left_fixed");
			$("#p_main_left").addClass("p_main_left");
		}
	});
	//点击导航跳转至锚点
	function navTo(name){
		var aa=document.getElementById(name);
		$("html,body").animate({scrollTop:aa.offsetTop},500);
	}
	$("#p_main_left ul li a").click(function(){
		var now=$(this).attr("anchor");
		navTo(now);
	});
	
	//保存事件
	$("#btn_save").on("click",function(){
		/*以下是将json里的地址代码转换成中文名*/
		var province=$("#province").val().substr(0,6),
			city=$("#city").val().substr(0,6),
			area=$("#area").val(),
			new_province,new_city,new_area;
		for(var i=0;i<Area.length;i++){
			if(Area[i].provinceCode==province){
				new_province=Area[i].provinceName;
				for(var j=0;j<Area[i].mallCityList.length;j++){
					if(Area[i].mallCityList[j].cityCode==city){
						new_city=Area[i].mallCityList[j].cityName;
						for(var k=0;k<Area[i].mallCityList[j].mallAreaList.length;k++){
							if(Area[i].mallCityList[j].mallAreaList[k].areaCode==area){
								new_area=Area[i].mallCityList[j].mallAreaList[k].areaName;
							}
						}
					}
				}
			}
		}
//		console.log(new_province+new_city+new_area);
		$.ajax({
			type:"post",
			url:"doUserAction.php?act=save_pi&id=1",
			data:{
				realname:$("#realname").val(),
				birth:$("#birth").val(),
				province:new_province,
				city:new_city,
				area:new_area,
				address:$("#address").val(),
				sex:$("input[name='sex']:checked").val(),
				educational_level:$("#educational_level").val(),
				work:$("#work").val(),
				care_form:$("#care_form").val(),
				id_card:$("#id_card").val(),
				phone_num:$("#phone_num").val(),
				tel_num:$("#tel_num").val(),
				height:$("#height").val(),
				weight:$("#weight").val(),
				bmi:$("#bmi").val(),
				is_hospital:$("#is_hospital").val(),
				hospital_num:$("#hospital_num").val(),
				hospital_department:$("#hospital_department").val(),
				hospital_bed:$("#hospital_bed").val(),
				patient_num:$("#patient_num").val(),
				is_smoke:$("#is_smoke").val(),
				smoke_count:$("#smoke_count").val(),
				smoke_time:$("#smoke_time").val(),
				nosmoke_time:$("#nosmoke_time").val(),
				is_drink:$("#is_drink").val(),
				drink_count:$("#drink_count").val(),
				drink_time:$("#drink_time").val(),
				nodrink_time:$("#nodrink_time").val(),
			},
			dataType:"json",
			success:function(date){
				if(date.success){
					alert(date.msg);
				}
				else{
					alert(date.msg);
				}
			},
			error:function(jqXHR){
				alert("发生错误"+jqXHR.status);
			}
		});
	});
});
