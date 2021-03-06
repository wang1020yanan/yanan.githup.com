/**
 * Created by yanan on 2016/9/23.
 */

var myApp={
    init:function(){
        window.location.href='#page1';
        this.fullPage();
        this.imgInit();
        var widths=screen.width;
        //if (widths<=768){
        //    alert('请用电脑打开chat.uustudy.com.cn');
        //    window.location.href='http://a.app.qq.com/o/simple.jsp?pkgname=com.example.bob.uuchat'
        //}
    },
    imgInit:function(){
        var that=this;
//                  图片资源
        this.loadImg([
            '1-2.png',
            '1-bg.png',
            '1-font.png',
            '1-interface.png',
            '2-2.png',
            '1-bg.png',
            '2-bg.png',
            'font-1.png',
            'font-2.png',
            'font-all.png'
        ],function(result){
            that.startAni();
        });
    },
    startAni:function(){
        $('#loading').animate({
            top:'0%',opacity: '0'
        }, 500, 'easeOutExpo',function(){$('#loading').fadeOut(0)});
        setTimeout(function(){
            $('#dowebok').fadeIn(800);
            $('#menu').fadeIn(800)
        },200);
        setTimeout(function(){
            $('.section1').find('.s1').fadeIn(300);
            $('.section1').find('.s2').delay(0).animate({
                left: '0'
            }, 1500, 'easeOutExpo');
            $('.section1').find('.s3').delay(0).animate({
                left: '0'
            }, 1900, 'easeOutExpo');
            $('.section1').find('.s4').delay(0).animate({
                right: '0'
            }, 1900, 'easeOutExpo');
        },500)
    },
    fullPage:function(){
        $(function(){
            $('.section1').find('p').animate({
                bottom: '0'
            }, 1500, 'easeOutExpo');
            $('.section1').find('h3').animate({
                bottom: '0'
            }, 1500, 'easeOutExpo');

            $('#dowebok').fullpage({
                sectionsColor: ['#1bbc9b', '#4BBFC3', '#7BAABE', '#f90'],
                anchors: ['page1', 'page2', 'page3', 'page4', 'page5'],
                menu: '#menu',

                //'navigation': true,

                afterLoad: function(anchorLink, index){
                    if(index == 1){
                        $('.section1').find('.s1').fadeIn(300);
                        $('.section1').find('.s2').delay(0).animate({
                            left: '0'
                        }, 1500, 'easeOutExpo');
                        $('.section1').find('.s3').delay(0).animate({
                            left: '0'
                        }, 1900, 'easeOutExpo');
                        $('.section1').find('.s4').delay(0).animate({
                            right: '0'
                        }, 1900, 'easeOutExpo');
                    }
                    if(index == 2){
                        $('.section2').find('.down1').delay(0).animate({
                            left: '0'
                        }, 1500, 'easeOutExpo');
                        $('.section2').find('.down2').delay(0).animate({
                            left: '0'
                        }, 2500, 'easeOutExpo');
                    }
                    if(index == 3){

                    }
                    if(index == 4){
                        $('.section4').find('p').animate({
                            bottom: '0'
                        }, 1500, 'easeOutExpo');
                    }
                    if(index == 5){
                        $('.section5').find('p').animate({
                            bottom: '0'
                        }, 1500, 'easeOutExpo');
                    }
                },
                onLeave: function(index, direction){
                    if(index == 1){
                        $('.section1').find('.s1').fadeOut(300);
                        $('.section1').find('.s2').delay(0).animate({
                            left: '-170%'
                        }, 1500, 'easeOutExpo');
                        $('.section1').find('.s3').delay(0).animate({
                            left: '0'
                        }, 1900, 'easeOutExpo');
                        $('.section1').find('.s4').delay(0).animate({
                            right: '-170%'
                        }, 1500, 'easeOutExpo');
                    }
                    if(index == '2'){
                        $('.section2').find('.down1').delay(0).animate({
                            left: '170%'
                        }, 100, 'easeOutExpo');
                        $('.section2').find('.down2').delay(0).animate({
                            left: '170%'
                        }, 100, 'easeOutExpo');
                    }
                    if(index ==  '3'){
                        $('.section3').find('p').delay(0).animate({
                            left: '120%'
                        }, 1500, 'easeOutExpo');
                    }
                    if(index == '4'){
                        $('.section4').find('p').animate({
                            bottom: '-120%'
                        }, 1500, 'easeOutExpo');
                    }
                    if(index == '5'){
                        $('.section5').find('p').animate({
                            bottom: '-120%'
                        }, 1500, 'easeOutExpo');
                    }
                }
            });
        });
    },
    loadImg:function(arr,callback){
        var result={};
        var iNow=0;
        var per = $("#percents");
        for(var i=0;i<arr.length;i++){
            var oImg=new Image();
            var tmp=arr[i].split('.');
            result[tmp[0]]=oImg;
            oImg.onload=function(){
                iNow++;
                var nowPercent=parseInt(iNow/arr.length*100);
                $("#colors").animate({width:nowPercent+'%'},30,function(){
                    $("#percents").text(nowPercent+"%");
                });
                if(iNow>=arr.length){
                    callback(result);
                }
            };
            oImg.src='img/'+arr[i];
        }
    }
};
myApp.init();
