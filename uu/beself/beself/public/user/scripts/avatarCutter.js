jQuery.UtrialAvatarCutter = function(config){
	var h,w,x,y;

	var os,oh,ow;

	var api = null;

	var sel = this;

	var img_content_id = config.content;

	var img_id = config.imgid || ("img_"+(Math.random()+"").substr(3,8));
	var purviews = new Array();

	var select_width = null;
	var select_height = null;

	if(config.purviews){
		for(i=0,c=config.purviews.length;i<c;++i){
			purviews[purviews.length] = config.purviews[i];
		}
	}
	
	check_thums_img = function(){
		if(config.purviews){
			for(i=0,c=config.purviews.length;i<c;++i){
				if($('#'+config.purviews[i].id+" img").length==0){
					$('#'+config.purviews[i].id).html("<img src='"+os+"'/>");
				}else{
					$('#'+config.purviews[i].id+" img").attr("src",os);
				}
			}
		}
	}

	/*
	 *	重新加载图片
	 */
	this.reload = function(img_url){
		if(img_url!=null && img_url != ""){
			os = img_url+"?"+Math.random();
			$("#"+img_content_id).html("<img id='"+img_id+"' src='"+os+"'/>");
			$("#"+img_id).bind("load",
				function(){
					check_thums_img();
					sel.init();
				}
			);
		}
	}
	$("#"+img_content_id+" img").attr("id",img_id);

	var preview = function(c) {
		if ( c.w == 0 || c.h == 0 ) {
			api.setSelect([ x, y, x+w, y+h ]);
			api.animateTo([ x, y, x+w, y+h ]);
			return;
		}
		x = c.x;
		y = c.y;
		w = c.w;
		h = c.h;
		//console.log(c);
		if(config.showCoords) {
			config.showCoords.call(this, c);
		}
		for(i=0,c=purviews.length;i<c;++i){
			var purview = purviews[i];
			var rx = purview.width / w;
			var ry = purview.height / h;
			$('#'+purview.id+" img").css({
				width: Math.round(rx * ow) + 'px',
				height: Math.round(ry * oh) + 'px',
				marginLeft: '-' + Math.round(rx * x) + 'px',
				marginTop: '-' + Math.round(ry * y) + 'px'
			});
		}
	}

	this.init = function(){
		if(api!=null){
			api.destroy();
		}
		os = $("#"+img_content_id+" img").attr("src");
		if(os=="")
			return;
		check_thums_img();
		for(i=0,c=purviews.length;i<c;++i){
			var purview = purviews[i];
			var purview_content = $("#"+purview.id);
			purview_content.css({position: "relative", overflow:"hidden", height:purview.height+"px", width:purview.width+"px"});
		}

		oh = $('#'+img_id).height();
		ow = $('#'+img_id).width();
		
		select_width = config.selector.width;
		select_height = config.selector.height;	

		select_width = Math.min(ow,select_width);
		select_height = Math.min(oh,select_height);
		
		x = ((ow - select_width) / 2);
		y = ((oh - select_height) / 2);
		//这是原Jcrop配置,修改此处可修改Jcrop的其它各种功能
		var cropattrs = config.cropattrs || {};
		cropattrs = $.extend(cropattrs, { 
			aspectRatio: 1,
			onChange: preview,
			onSelect: preview
			//setSelect: [ x, y, x+select_width, y+select_height ]
		});
		//console.log(cropattrs);
		api = $.Jcrop($('#'+img_id), cropattrs);
		//console.log(api)
		//设置选择框默认位置
		api.animateTo([ 0, 0, x+select_width, y+select_height ]);
	}

	this.submit = function(){
		return {w:w,h:h,x:x,y:y,s:os};
	}
}

$(function () {

	function getFileSize(fileName) {
		var byteSize = 0;
		//console.log($("#" + fileName).val());
		if($("#" + fileName)[0].files) {
			var byteSize  = $("#" + fileName)[0].files[0].size;
		}else {
		}
		//alert(byteSize);
		byteSize = Math.ceil(byteSize / 1024) //KB
		return byteSize;//KB
	}
	$("#file1").change(function () {
		var allowImgageType = ['jpg', 'jpeg', 'png', 'gif'];
		var file = $("#file1").val();
		//获取大小
		var byteSize = getFileSize('file1');
		//获取后缀
		if (file.length > 0) {
			if(byteSize > 2048) {
				alert("上传的附件文件不能超过2M");
				return;
			}
			var pos = file.lastIndexOf(".");
			//截取点之后的字符串
			var ext = file.substring(pos + 1).toLowerCase();
			//console.log(ext);
			if($.inArray(ext, allowImgageType) != -1) {
				ajaxFileUpload();
			}else {
				alert("请选择jpg,jpeg,png,gif类型的图片");
			}
		}
		else {
			alert("请选择jpg,jpeg,png,gif类型的图片");
		}
	});
	function ajaxFileUpload() {
		$.ajaxFileUpload({
			url: "http://www.25to75.com/public/user/action.php", //用于文件上传的服务器端请求地址
			secureuri: false, //一般设置为false
			fileElementId: 'file1', //文件上传空间的id属性  <input type="file" id="file" name="file" />
			dataType: 'json', //返回值类型 一般设置为json
			success: function (data, status)  //服务器成功响应处理函数
			{
				//var json = eval('(' + data + ')');
				//alert(data);
				$("#picture_original>img").attr({src: data.src, width: data.width, height: data.height});
				$('#imgsrc').val(data.path);
				//alert(data.path);

				//同时启动裁剪操作，触发裁剪框显示，让用户选择图片区域
				var cutter = new jQuery.UtrialAvatarCutter({
						//主图片所在容器ID
						content : "picture_original",
						//缩略图配置,ID:所在容器ID;width,height:缩略图大小
						purviews : [{id:"picture_200",width:200,height:200},{id:"picture_50",width:50,height:50},{id:"picture_30",width:30,height:30}],
						//选择器默认大小
						selector : {width:200,height:200},
						showCoords : function(c) { //当裁剪框变动时，将左上角相对图片的X坐标与Y坐标 宽度以及高度
							$("#x1").val(c.x);
							$("#y1").val(c.y);
							$("#cw").val(c.w);
							$("#ch").val(c.h);
						},
						cropattrs : {boxWidth: 400, boxHeight: 400}
					}
				);
				cutter.reload(data.src);
				$('#div_avatar').show();
			},
			error: function (data, status, e)//服务器响应失败处理函数
			{
				alert(e);
			}
		})
		return false;
	}

	$('#btnCrop').click(function() {
		$.getJSON("http://www.25to75.com/public/user/action2.php", {x: $('#x1').val(), y: $('#y1').val(), w: $('#cw').val(), h: $('#ch').val(), src: $('#imgsrc').val(), username:$('#username').val()}, function(data) {
			$("#tx>img").attr({src: data.xxx});
			alert(data.msg);
		});
		return false;
	});
});