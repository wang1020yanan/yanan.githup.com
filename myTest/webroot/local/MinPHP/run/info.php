<?php defined('API') or exit();?>
<!--接口详情列表与接口管理start-->
<?php
$_VAL = I($_POST);
//操作类型{add,delete,edit}
$op = $_GET['op'];
$type = $_GET['type'];
//if(!is_supper()){die('只有登录才能查看接口');}
//添加接口
if($op == 'add'){
    if($type == 'do'){
        if(!is_supper()){die('只有超级管理员才可对接口进行操作');}
        $aid = I($_GET['tag']);    //所属分类
        if(empty($aid)){
            die('<span class="glyphicon glyphicon-info-sign" aria-hidden="true"></span> 所属分类不能为空');
        }
        $num = htmlspecialchars($_POST['num'],ENT_QUOTES);   //接口编号(为了导致编号的前导0去过滤掉。不用用I方法过滤)
        $name = $_VAL['name'];  //接口名称
        $fid = $_VAL['fid'];  //模块id
        $memo = $_VAL['memo']; //备注
        $des = $_VAL['des'];    //描述
        $type = $_VAL['type'];  //请求方式
        $url = $_VAL['url'];

        $parameter = serialize($_VAL['p']);
        $re = $_VAL['re'];  //返回值
        $lasttime = time(); //最后操作时间
        $lastuid = session('id'); //操作者id
        $isdel = 0; //是否删除的标识
        $sql = "insert into api (
            `aid`,`fid`,`num`,`name`,`des`,`url`,
            `type`,`parameter`,`re`,`lasttime`,
            `lastuid`,`isdel`,`memo`,`ord`
            )values (
            '{$aid}','{$fid}','{$num}','{$name}','{$des}','{$url}',
            '{$type}','{$parameter}','{$re}','{$lasttime}',
            '{$lastuid}','{$isdel}','{$memo}','99999'
            )";
        $re = insert($sql);
        if($re){
            go(U(array('act'=>'api','tag'=>$_GET['tag'])));
        }else{
            echo '<div class="alert alert-danger" role="alert"><span class="glyphicon glyphicon-info-sign" aria-hidden="true"></span> 添加失败</div>';
        }
    }

    $sql = "select * from api where aid = '{$_GET['tag']}' and isdel='0'  and fid=0 order by ord desc,id desc";
    $flist = select($sql);


    include './MinPHP/view/right/add.html';
} //修改接口
else if($op == 'edit')
{
    if(!is_supper()){die('只有超级管理员才可对接口进行操作');}
    //执行编辑
    if($type == 'do'){
        $id = $_VAL['id'];   //接口id
        $name = $_VAL['name'];  //接口名称
        $fid = $_VAL['fid'];  //模块id
        $memo = $_VAL['memo']; //备注
        $des = $_VAL['des'];    //描述
        $type = $_VAL['type'];  //请求方式
        $url = $_VAL['url']; //请求地址

        $parameter = serialize($_VAL['p']);
        $re = $_VAL['re'];  //返回值
        $lasttime = time(); //最后操作时间
        $lastuid = session('id'); //操作者id

        $sql ="update api set name='{$name}',
           des='{$des}',url='{$url}',type='{$type}',
           parameter='{$parameter}',re='{$re}',lasttime='{$lasttime}',lastuid='{$lastuid}',memo='{$memo}',fid='{$fid}'
           where id = '{$id}'";
        $re = update($sql);

        if($re){
            go(U(array('act'=>'api','tag'=>($_GET['tag'].'#info_api_'.md5($id)))));
        }else{
            echo '<div class="alert alert-danger" role="alert"><span class="glyphicon glyphicon-info-sign" aria-hidden="true"></span> 修改失败</div>';
        }
    }
    //编辑界面
    if(empty($id)){$id = I($_GET['id']);}
    $aid = I($_GET['tag']);
    //得到数据的详情信息start
    $sql = "select * from api where id='{$id}' and aid='{$aid}'";
    $info = find($sql);
    //得到数据的详情信息end
    if(!empty($info)){
        $info['parameter'] = unserialize($info['parameter']);
        $count = count($info['parameter']['name']);
        $p = array();
        for($i = 0;$i < $count; $i++){
            $p[$i]['name']=$info['parameter']['name'][$i];
            $p[$i]['paramType']=$info['parameter']['paramType'][$i];
            $p[$i]['type']=$info['parameter']['type'][$i];
            $p[$i]['default']=$info['parameter']['default'][$i];
            $p[$i]['des']=$info['parameter']['des'][$i];
        }
        $info['parameter'] = $info['parameter'];
    }


    $sql = "select * from api where aid = '{$_GET['tag']}' and isdel='0'  and fid=0 order by ord desc,id desc";
    $flist = select($sql);
    include './MinPHP/view/right/edit.html';
}//添加模块
elseif($op == 'edit')
{
    if(!is_supper()){die('只有超级管理员才可对接口进行操作');}
    //执行编辑
    if($type == 'do'){
        $id = $_VAL['id'];   //接口id
        $name = $_VAL['name'];  //接口名称
        $fid = $_VAL['fid'];  //模块id
        $memo = $_VAL['memo']; //备注
        $des = $_VAL['des'];    //描述
        $type = $_VAL['type'];  //请求方式
        $url = $_VAL['url']; //请求地址

        $parameter = serialize($_VAL['p']);
        $re = $_VAL['re'];  //返回值
        $lasttime = time(); //最后操作时间
        $lastuid = session('id'); //操作者id

        $sql ="update api set name='{$name}',
           des='{$des}',url='{$url}',type='{$type}',
           parameter='{$parameter}',re='{$re}',lasttime='{$lasttime}',lastuid='{$lastuid}',memo='{$memo}',fid='{$fid}'
           where id = '{$id}'";
        $re = update($sql);

        if($re){
            go(U(array('act'=>'api','tag'=>($_GET['tag'].'#info_api_'.md5($id)))));
        }else{
            echo '<div class="alert alert-danger" role="alert"><span class="glyphicon glyphicon-info-sign" aria-hidden="true"></span> 修改失败</div>';
        }
    }
    //编辑界面
    if(empty($id)){$id = I($_GET['id']);}
    $aid = I($_GET['tag']);
    //得到数据的详情信息start
    $sql = "select * from api where id='{$id}' and aid='{$aid}'";
    $info = find($sql);
    //得到数据的详情信息end
    if(!empty($info)){
        $info['parameter'] = unserialize($info['parameter']);
        $count = count($info['parameter']['name']);
        $p = array();
        for($i = 0;$i < $count; $i++){
            $p[$i]['name']=$info['parameter']['name'][$i];
            $p[$i]['paramType']=$info['parameter']['paramType'][$i];
            $p[$i]['type']=$info['parameter']['type'][$i];
            $p[$i]['default']=$info['parameter']['default'][$i];
            $p[$i]['des']=$info['parameter']['des'][$i];
        }
        $info['parameter'] = $info['parameter'];
    }


    $sql = "select * from api where aid = '{$_GET['tag']}' and isdel='0'  and fid=0 order by ord desc,id desc";
    $flist = select($sql);
    include './MinPHP/view/right/edit.html';
}//添加模块
else if($op=='addmod')
{
    include './MinPHP/view/right/addmod.html';
}else if($op=='editmod'){
    if(empty($id)){$id = I($_GET['id']);}
    $aid = I($_GET['tag']);
    //得到数据的详情信息start
    $sql = "select * from api where id='{$id}' and aid='{$aid}'";
    $info = find($sql);
    include './MinPHP/view/right/editmod.html';
}else//此分类下的接口列表
{
    $sql = "select api.id,aid,num,url,name,des,parameter,memo,re,lasttime,lastuid,type,login_name
        from api
        left join user
        on api.lastuid=user.id
        where aid='{$_GET['tag']}' and api.isdel=0 and fid>0
        order by ord desc,api.id desc";
    $list = select($sql);

    include './MinPHP/view/right/detail.html';
}
?>
