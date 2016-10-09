<!--导航-->
<?php defined('API') or exit('http://gwalker.cn');?>
<?php if($act != 'api' && $act != 'sort'){
    $list = select('select * from cate where isdel=0 order by addtime desc');
    include './MinPHP/view/left/cate.html';
} else{
    $sql = "select * from api where aid = '{$_GET['tag']}' and isdel='0'  and fid=0 order by name desc,ord desc,id desc";
    $list = select($sql);

    for($i=0;$i<count($list);$i++){
        $sql = "select * from api where aid = '{$_GET['tag']}' and isdel='0'  and fid={$list[$i]['id']} order by name desc,ord desc,id desc";
        $list[$i]["list"]=select($sql);
    }
    include './MinPHP/view/left/api.html';
} ?>
