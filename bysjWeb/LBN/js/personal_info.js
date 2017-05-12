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
 		 }else{
 		 	data.value="0";
 		 }
  	});
	//住院开关控制器
  	form.on('switch(is_hospital)',function(data){	
 		 if(data.elem.checked){
 		 	data.value="1";
 		 	$(".hospital_detial").css("display","block");
 		 	$(".hospital_detial").find("input").removeAttr("disabled");
 		 }else{
 		 	data.value="0";
 		 	$(".hospital_detial").css("display","none");
 		 	$(".hospital_detial").find("input").attr("disabled","disabled");
 		 }
  	});
  	form.on('switch(is_smoke)',function(data){	
 		 if(data.elem.checked){
 		 	data.value="1";
 		 	$(".smoke_detial").css("display","block");
 		 	$(".smoke_detial").find("input").removeAttr("disabled");
 		 }else{
 		 	data.value="0";
 		 	$(".smoke_detial").css("display","none");
 		 	$(".smoke_detial").find("input").attr("disabled","disabled");
 		 }
 		 console.log(data.value);
  	});
  	form.on('switch(is_drink)',function(data){	
 		 if(data.elem.checked){
 		 	data.value="1";
 		 	$(".drink_detial").css("display","block");
 		 	$(".drink_detial").find("input").removeAttr("disabled");
 		 }else{
 		 	data.value="0";
 		 	$(".drink_detial").css("display","none");
 		 	$(".drink_detial").find("input").attr("disabled","disabled");
 		 }
 		 console.log(data.value);
  	});
  		 //保存 
	form.on('submit(save1)',function(data){
		form.render(); //更新全部
	  console.log(data.field); //当前容器的全部表单字段，名值对形式：{name: value}
	  //return false; //阻止表单跳转。如果需要表单跳转，去掉这段即可。
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
        $form.find('select[name=area]').html('<option value="">请选择县/区</option>').parent().hide();
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

