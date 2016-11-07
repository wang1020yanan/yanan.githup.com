/**
 * Created by yanan on 2016/1/7.
 */
(function($) {
    $.imageFileVisible = function(options) {
        // 默认选项
        var defaults = {
        //包裹图片的元素
            wrapSelector: null,
        //<input type=file />元素
            fileSelector:  null ,
            width : '444px',
            height: 'auto',
            errorMessage: "is not image"
        };
        // Extend our default options with those provided.
        var opts = $.extend(defaults, options);
        $(opts.fileSelector).on("change",function(){
            var file = this.files[0];
            var imageType = /image.*/;
            if (file.type.match(imageType)) {
                var reader = new FileReader();
                reader.onload = function(){
                    var img = new Image();
                    img.src = reader.result;
                    $(img).width( opts.width);
                    $(img).height( opts.height);
                    $( opts.wrapSelector ).append(img);
                };
                reader.readAsDataURL(file);
            }else{
                alert(opts.errorMessage);
            }
        });
    };
})(jQuery);