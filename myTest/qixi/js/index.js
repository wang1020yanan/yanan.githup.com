/**
 * Created by yanan on 2016/8/10.
 */
function Swipe(container){
    var element=container.find(":first");
    var swipe={};
    var slides=element.find("li");
    var width=container.width();
    var height=container.height();
    element.css({
        width:(slides.length*width)+"px",
        height:height+'px'
    });
    $.each(slides,function(index){
        var slide=slides.eq(index);
        slide.css({ // 设置每一个li的尺寸
            width: width + 'px',
            height: height + 'px'
        });
    });
    swipe.scrollTo=function(x,speed){
        element.css({
            'transition-timing-function': 'ease',
            'transition-duration': speed+'ms',
            'transform': 'translate3d(-' + x + 'px,0px,0px)' //设置页面X轴移动
        });
        return this;
    };
    return swipe;
}
function BoyWalk(){
    var container = $("#content");
    // 页面可视区域
    var visualWidth = container.width();
    var visualHeight = container.height();
    //        小孩
    var getValue=function(className){
        var $elem=$(''+className+'');
        return{
            height:$elem.height()
        }
    };
    var $boy=$("#boy");
    var boyHeight=$boy.height();
    // 设置一下缩放比例与基点位置
    var proportion =  $(document).width() /2100;
    $boy.css({
        bottom: getValue(".content-wrap").height*0.37*proportion,
        transform: 'scale(' + proportion + ')'
    });
    // 暂停走路
    function pauseWalk() {
        $boy.addClass('pauseWalk')
    }
    // 恢复走路
    function restoreWalk() {
        $boy.removeClass('pauseWalk');
    }

// css3的动作变化
    function slowWalk() {
        $boy.addClass('slowWalk');
    }

// 计算移动距离
    function calculateDist(direction, proportion) {
        return (direction == "x" ?
                visualWidth : visualHeight) * proportion;
    }
// 走进商店
    function walkToShop(runTime) {
        var defer = $.Deferred();
        var doorObj = $('.door');
        // 门的坐标
        var offsetDoor = doorObj.offset();
        var doorOffsetLeft = offsetDoor.left;
        // 小孩当前的坐标
        var offsetBoy     = $boy.offset();
        var boyOffetLeft = offsetBoy.left;

        // 当前需要移动的坐标
        instanceX = (doorOffsetLeft + doorObj.width() / 2) - (boyOffetLeft + $boy.width() / 2);

        // 开始走路
        var walkPlay = stratRun({
            transform: 'translateX(' + instanceX + 'px),scale(0.3,0.3)',
            opacity:0.1
        }, 2000);
        console.log(walkPlay);
        // 走路完毕
        walkPlay.done(function() {
            $boy.css({
                opacity: 0
            });
            defer.resolve();
        });
        return defer;
    }

    // 走出店
    function walkOutShop(runTime) {
        var defer = $.Deferred();
        restoreWalk();
//开始走路
        var walkPlay = stratRun({
            transform: 'translateX(' + instanceX + 'px),scale(1,1)',
            opacity: 1
        }, runTime);
//走路完毕

        walkPlay.done(function() {
            defer.resolve();
        });
        return defer;
    }

// 用transition做运动
    function stratRun(options, runTime) {
        var dfdPlay = $.Deferred();
        // 恢复走路
        restoreWalk();
        // 运动的属性
        $boy.animate(
            options,
            runTime,
            'linear',
            function() {
                dfdPlay.resolve();
            });
        return dfdPlay;
    }


// 开始走路
    function walkRun(time, dist, disY) {
        time = time || 3000;
        // 脚动作
        slowWalk();
        // 开始走路
        var d1 = stratRun({
            'left': dist + 'px',
            'top': disY ? disY : undefined
        }, time);
        return d1;
    }
    // 计算移动距离
    function calculateDist(direction, proportion) {
        return (direction == "x" ?
                visualWidth : visualHeight) * proportion;
    }
    // 取花
    function talkFlower() {
        // 增加延时等待效果
        var defer = $.Deferred();
        setTimeout(function() {
            // 取花
            $boy.addClass('slowFlolerWalk');
            defer.resolve();
        }, 1000);
        return defer;
    }
    var $qipao=$(".lt");
    function talk(text){
        var defer = $.Deferred();
        $qipao.fadeIn().html('<h2>'+text+'</h2>');
        setTimeout(function() {
            $qipao.fadeOut().text("");
            defer.resolve();
        }, 1000);
        return defer;
    }
    return {
        // 开始走路
        walkTo: function(time, proportionX, proportionY) {
            var distX = calculateDist('x', proportionX);
            var distY = calculateDist('y', proportionY);
            return walkRun(time, distX, distY);
        },
        // 停止走路
        stopWalk: function() {
            pauseWalk();
        },
        setColoer:function(value){
            $boy.css('background-color',value)
        },
        // 走进商店
        toShop: function() {
            return walkToShop.apply(null, arguments);
        },
        // 走出商店
        outShop: function() {
            return walkOutShop.apply(null, arguments);
        },
        // 取花
        talkFlower: function() {
            return talkFlower();
        },
        //一次气泡
        talk:function(text){
            return talk(text);
        }
    }
}

function DoorRun(){
    function doorAction(left, right, time) {
        var $door = $('.door');
        var doorLeft = $('.door-left');
        var doorRight = $('.door-right');
        var defer = $.Deferred();
        var count = 2;
        // 等待开门完成
        var complete = function() {
            if (count == 1) {
                defer.resolve();
                return;
            }
            count--;
        };
        doorLeft.animate({
            'left': left
        }, time, complete);

        doorRight.animate({
            'left': right
        }, time, complete);

        return defer;
    }
    return{
        // 开门
        openDoor: function () {
        return doorAction('-50%', '100%', 2000);
    },

// 关门
        shutDoor:function () {
        return doorAction('0%', '50%', 2000);
    }
    }
}







