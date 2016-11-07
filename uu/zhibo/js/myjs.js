/**
 * Created by yanan on 2016/4/8.
 */
    //    自动rem
(function (doc, win) {
    var docEl = doc.documentElement,
        resizeEvt = 'orientationchange' in window ? 'orientationchange' : 'resize',
        recalc = function () {
            var clientWidth = docEl.clientWidth;
            if (!clientWidth) return;
            docEl.style.fontSize = 20 * (clientWidth / 320) + 'px';
        };
    if (!doc.addEventListener) return;
    win.addEventListener(resizeEvt, recalc, false);
    doc.addEventListener('DOMContentLoaded', recalc, false);
})(document, window);
//自定义框架
var yanan=yanan||{};
//tabs切换插件
yanan.tabs=function(tab,bg,tab_index){ //tbs的id和背景的id和内容的id
    var dom= tab.find('ul').find('li');
    dom.click(function(){
        var remove=function (n){
            tab_index.find(".tab_index").addClass("hid").eq(n).removeClass("hid");
            dom.css({"color":"#999999","border-bottom":"none"});
            dom.eq(n).css({"color":"#FF69B4","border-bottom":"1px solid #FF69B4"})
        };
        var j=$(this).index();
        if(j==0){
            //添加图片地址
            bg.css("background-image","url('http://www.pudding.cc/static/img/web/about/img_about.png')");
            remove(0)
        }else if(j==1){
            bg.css("background-image","url('http://www.pudding.cc/static/img/web/about/img_contact.png')");
            remove(1);
        }else if(j==2){
            bg.css("background-image","url('http://www.pudding.cc/static/img/web/about/img_joinus.png')");
            remove(2)
        }
    })
};
//简单tabs
yanan.tab=function(tab,tab_index,index2){ //tbs的id和背景的id和内容的id
    var dom= tab.find('ul').find('li');
    dom.click(function(){
        var remove=function (n){
            tab_index.find(index2).addClass("hid").eq(n).removeClass("hid");
            dom.css({"color":"#999999","border-bottom":"none"});
            dom.eq(n).css({"color":"#FF69B4","border-bottom":"1px solid #FF69B4"})
        };
        var j=$(this).index();
        if(j==0){
            remove(0)
        }else if(j==1){
            remove(1);
        }else if(j==2){
            remove(2)
        }
    })
};
//tips
yanan.tips=function(a,b){
    a.mouseover(function(){
        b.fadeIn(0);
    });
    a.mouseleave(function(){
        b.fadeOut(0);
    })
};
//start tips
yanan.startTips=function(a){
    a.find("a").hover(function(){
            $(this).find(".start_wrap").fadeToggle(100)
    })
};
//回到顶部插件
yanan.backtop=function(a){
    var topbtn = document.getElementById(a);
    var timer = null;
    var pagelookheight = document.documentElement.clientHeight;
    window.onscroll = function(){
        var backtop = document.body.scrollTop;
        if(backtop >=50){
            $(".btnb").addClass("btnb_ani");
            $(".btnb").removeClass("btnb_ani2");
            topbtn.style.display = "block";
        }else if($(".btnb").hasClass("btnb_ani")){
            topbtn.style.display = "block";
            $(".btnb").addClass("btnb_ani2");
            $(".btnb").removeClass("btnb_ani");
        }
    };
    topbtn.onclick = function () {
        timer = setInterval(function () {
            var backtop = document.body.scrollTop;
            var speedtop = backtop/5;
            document.body.scrollTop = backtop -speedtop;
            if(backtop ==0){
                clearInterval(timer);
            }
        }, 30);
    };
};
//基础提示框
yanan.Alert=function(data){
   if(!data){
       return;
   }
    this.content=data.content;
    this.panel=document.createElement('div');
    this.contentNode=document.createElement('p');
    this.confirmBtn=document.createElement('span');
    this.closeBtn=document.createElement('b');
    this.panel.className="alert";
    this.closeBtn.className="a_close";
    this.confirmBtn.className='a_confirm';
    this.confirmBtn.innerHTML=data.confirm||'确认';
    this.contentNode.innerHTML=this.content;
    this.closeBtn.innerHTML=data.closeNode;
    this.success=data.success||function(){};
    this.fail=data.fail||function(){};
};
yanan.Alert.prototype={
    init:function(){
        this.panel.appendChild(this.closeBtn);
        this.panel.appendChild(this.contentNode);
        this.panel.appendChild(this.confirmBtn);
        document.body.appendChild(this.panel);
        this.bindEvent();
        this.show();
    },
    bindEvent:function(){
        var me=this;
        this.closeBtn.onclick=function(){
            me.fail();
            me.hide();
        };
        this.confirmBtn.onclick=function(){
           me.success();
            me.hide();
        }
    },
    hide:function(){
        this.panel.style.display="none"
    },
    show:function(){
        this.panel.style.display="block"
    }
};
$(document).ready(function(){
    //new yanan.Alert({
    //    content:"这是一个提示框",
    //    confirm:"确定",
    //    closeNode:"关闭",
    //    title:"这是一个title"
    //}).init();
    //懒加载
    //$(".home_chunk img").each(function () {
    //    var src=$(this).attr("src");
    //    $(this).attr("original",src).addClass("lazy");
    //});
    //$("img.lazy").lazyload({
    //    effect: "fadeIn",
    //    threshold:"0"
    //});
    //tabs应用
    //yanan.tabs($("#tabs"),$("#tab_bg"),$("#tab_index"));
    yanan.tab($("#tabs2"),$("#tab_index2"),$(".tab_index2"));
    //yanan.tab($("#tabs3"),$("#tab_index3"),$(".tab_index3"));
    //yanan.tab($("#tabs4"),$("#tab_index4"),$(".tab_index4"));
    //yanan.tab($("#tabs5"),$("#tab_index5"),$(".tab_index5"));
    //tips应用
    //yanan.tips($("#weixin"),$("#weixin2"));
    //回到顶部应用
    //yanan.backtop("btnb");
    //播放
    //yanan.startTips($(".myitem"));
    //yanan.startTips($(".myitem2"));
});
//动画菜单