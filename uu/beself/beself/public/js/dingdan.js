/**
 * Created by Administrator on 2015/8/31.
 */

$(document).ready(
    function(){
        $("#dwfp").click(
            function(){
                $("#dwtt").fadeIn(0)
            }
        );
        $("#grfp").click(
            function(){
                $("#dwtt").fadeOut(0)
            }
        );
        $("#shdztj").click(
            function(){
                var aa =$("#shdz-xm").val();
                var bb=$("#shdz-tel").val();
                var cc=$("#shdz-dz").val();
                var ff=aa+"  "+bb+"  "+cc+"  ";
                $("#shdz").html(ff);
                $("#zzshdz").html(ff);
                $("#myModal").fadeOut(100)
            }
        )

    }
);