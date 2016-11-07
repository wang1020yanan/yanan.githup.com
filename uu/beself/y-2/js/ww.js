/**
 * Created by adc on 2015/12/10.
 */
//        元素内容
function get(){
    var ele=document.getElementsByName("dd");
    var p=ele[2];
    p.innerHTML="ssss"
}
//         获取元素属性
function getAttr(){
    var ele=document.getElementById("aid");
    var  attr=ele.getAttribute('id');
    alert(attr);
}
//         设置元素属性
function setAttr(){
    var ele = document.getElementById('aid2');
    ele.setAttribute('class','aid22');
    var  attr=ele.getAttribute('class');
    alert(attr);
}
//            访问子节点
function getChildNode(){
    var cc =document.getElementsByTagName('ul')[0].childNodes;
    alert(cc.length)
}
//访问父节点
function getParent(){
     var ele=document.getElementById("pid");
     alert(ele.parentNode.nodeName)
}
//创建节点
   function create(){
       var body=document.body;
       var input= document.createElement("input");
       input.type="button";
       input.value="按钮";
       body.appendChild(input);
   }
//     插入节点
     function insert(){
         var div=document.getElementById("pid");
         var node=document.getElementById("pp");
         var newNode =document.createElement("p");
         newNode.innerHTML="这是新加的";
         div.insertBefore(newNode,node);
     }
//     删除节点
     function remove(){
         var div=document.getElementById("pid");
         var p =div.removeChild(div.childNodes[1])
     }
//      获取网页尺寸
     function getSize(){
         var width = document.body.offsetWidth||document.documentElement.offsetWidth;
         var height = document.documentElement.offsetHeight;
         alert(width+','+height);
     }
//异常捕获
      function de(){
          var dddd="sd";
          try{
              alert(dddd)
          }catch(err){
              alert(err);
          }
      }
//创建自定义错误
     function de1(){
         try{
             var e = document.getElementById("tet").value;
             if(e==""){
                 throw "请输入"
             }
         }catch(err){
             alert(err);
         }
     }
//时钟
function startTime(){
    var today = new Date();
    var h = today.getHours();
    var m =today.getMinutes();
    var s =today.getSeconds();
    m = checkTime(m);
    s =checkTime(s);
    $(".time").text(h+":"+m+":"+s);
    var t=setTimeout(
       function(){
           startTime()
       },500
    )
}
//个数前加0
function checkTime(i){
    if (i<10){
        i = "0"+i;
    }
    return i;
}
//鼠标事件
     function mouse1(obj){
         obj.innerHTML="hello"
     }
     function mouse2(obj){
     obj.innerHTML="world"
     }
//数组
function arr(){
    var a=["00","11","22"];
    var b=["33","44","55"];
    var c = a.concat(b);
    //document.write(c);
    document.write(c.sort())
}
//Math对象
 function math(){
     //document.write(parseInt(Math.random()*10))
     //document.write(Math.min(10,20,30,0.5))
     document.write(Math.abs(-19))

 }
//浏览器对象
 function bros(){
     //document.write("宽度："+window.innerWidth)
     //window.open("obl.html","我的","width=200,height=200,top=200,left=200,toolbar=no")
     window.close();
 }
//计时器
function myTime(){
    //setInterval(function(){
    //    alert("d")
    //},1000)
      setTimeout(function(){
          alert("fg")
      },1000)
}
//history对象
function his(){
    history.back();
    history.forward();
    history.go(-1);
}
//location对象
function local(){
    //var x =window.location.href;
    //alert(x)
    location="http://www.baidu.com";
}
//screen对象
function scree(){
    document.write("可用宽度："+ screen.width)
}
//面向对象
// var person={
//     name:"yanan",
//     age:"30",
//     eat:function(){
//         alert("尺")
//     }
// };
//function chi(){
//  document.write(person.name)
//}

////继承
//function person(){
//}
//person.prototype.say=function(){
//    alert("fg")
//};
//function student(){
//
//}
//student.prototype=new person();
//var s=new student();
//s.say();


//闭包
(function(){
    var n="hello";
    function People(name){
        //属性
        this._name=name;
        //方法
        this.say=function(){
            alert(n+this._name+"吃饭咯")
        }
    }
        //闭包和外界接口
    window.People = People;
}());
//var xx = new People("yanan");
//xx.say();

//对象的另外一种书写格式
function Person(){
    var _this ={};
    _this.say= function(){
        alert("ps")
    };
    return _this;
}
function Teacher(){
    var _this =Person();//重要
    var superSay = _this.say();
    _this.say = function(){
        superSay.call(_this);
        alert("ts")
    };
    return _this;
}
//var  t = Teacher();
//t.say();

//js高级函数
//懒函数和懒加载
//级联函数和链式调用


//构造函数模式代码
function zaomen(){
    this.suo = "putong";
    this.huawen = "putong";
    this.creat = function (){
        return "shuo:"+this.suo+"huawen:"+this.huawen;
    }
}
var xiaozhang = new zaomen();
//alert(xiaozhang.creat());

//工厂模式设计
var gongchang={};
gongchang.chanyifu = function(){
    this.gongren = 50;
    alert('我们有'+this.gongren)

};
gongchang.chanxie = function(){
     alert("产鞋子")
};
gongchang.yunshu = function(){
   alert("运输")
};
gongchang.changzhang = function(para){
    return new gongchang[para]();
};
//var me = gongchang.changzhang('chanyifu');
//alert(me.chanyifu);

//代理模式
function maijia(argument){

}
function zhongjie(){
}
zhongjie.prototype.maifang = function(){
         new fangdong(new maijia()).maifang(30)
};
function fangdong(){
      this.maijia_name = maijia.name;
      this.maifang = function(money){
          alert("收到")
      }
}
(new zhongjie()).maifang();




//测试入口

$(function(){
    $('.cs').click(function(){

    })
});
