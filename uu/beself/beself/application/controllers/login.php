<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <script src="<?php echo base_url()?>/public/js/jquery-2.1.4.min.js"></script>
    <script>
        $(document).ready(function(){
            var code = "<?php echo $code?>";
            $.ajax({
                type:'get',
                url:"https://api.weixin.qq.com/sns/oauth2/access_token?appid=wx5d993bddcce4b252&secret=e730bab0dd1f052fd8773b6039939026&grant_type=authorization_code",
                async:true,
                cache:true,
                data:{code:code},
                dataType:'json',
                success:function(result){
                    alert(result);
                }
            });
        });
    </script>
</head>
<body>
<div id="msg"></div>
</body>
</html>