/**
 * Created by yanan on 2016/1/7.
 */
//身份认证
function ys(){
    var tempdz=$("#file").val();
    if(tempdz!=""){
        ajaxfile();
    }
}
function ajaxfile(){
    $.ajaxFileUpload
    (
        {
            url: '../TeacherCenter/setVerifyPic', //用于文件上传的服务器端请求地址
            secureuri: false,
            fileElementId: 'file', //文件上传域的ID
            dataType: 'txt',

            success: function (data, status)
            {
                //alert(data);
                //$("#image-wrap img").remove();
                //$("#image-wrap").prepend("<img class='ssss' src=''>");
                $("#image-wrap img").attr("src", data + '?' + Math.random());

            },
            error: function (data, status, e)//服务器响应失败处理函数
            {
                alert(e);
            }
        }
    );
}
//学历认证
function ys2(){
    var tempdz=$("#file2").val();
    if(tempdz!=""){
        ajaxfile2();
        return;
        //$("#image-wrap img").remove();
    }
}
function ajaxfile2(){
    $.ajaxFileUpload
    (
        {
            url: '../TeacherCenter/setVerifyPic', //用于文件上传的服务器端请求地址
            secureuri: false,
            fileElementId: 'file2', //文件上传域的ID
            dataType: 'text',
            success: function (data, status)
            {
                $("#image-wrap2 img").attr("src", data + '?' + Math.random());

            },
            error: function (data, status, e)//服务器响应失败处理函数
            {
                alert(e);
            }
        }
    );
}
//(function($) {
//    $.imageFileVisible = function(options) {
//        // Ĭ��ѡ��
//        var defaults = {
//            wrapSelector: null,
//            fileSelector:  null ,
//            width : '444px',
//            height: 'auto',
//            errorMessage: "请选择正确的图片格式"
//        };
//        // Extend our default options with those provided.
//        var opts = $.extend(defaults, options);
//
//        $(opts.fileSelector).on("change",function (){
//            var file = this.files[0];
//            var imageType = /image.*/;
//            if (file.type.match(imageType)) {
//                var reader = new FileReader();
//                reader.onload = function(){
//                    var img = new Image();
//                    img.src = reader.result;
//                    $(img).width( opts.width);
//                    $(img).height( opts.height);
//                    //判断是身份认证还是学校认证
//                    //if(opts.fileSelector=="#file"){
//                    //    var tempdz=$("#file").val();
//                    //    if(tempdz!=""){
//                    //        ajaxfile();
//                    //        $("#image-wrap img").remove();
//                    //    }
//                    //
//                    //}else if(opts.fileSelector=="#file2"){
//                    //    $("#image-wrap2 img").remove();
//                    //}
//                    $( opts.wrapSelector ).append(img);
//                };
//                reader.readAsDataURL(file);
//            }else{
//                alert(opts.errorMessage);
//            }
//        }
//        );
//    };
//})(jQuery);