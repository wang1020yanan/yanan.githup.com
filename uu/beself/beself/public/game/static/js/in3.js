function Ship(ctx){
	gameMonitor.im.loadImage(['http://www.25to75.com/public/game/static/img/player.png']);
	this.width = 80;
	this.height = 80;
	this.left = gameMonitor.w/2 - this.width/2;
	this.top = gameMonitor.h - 2*this.height;
	this.player = gameMonitor.im.createImage('http://www.25to75.com/public/game/static/img/player.png');

	this.paint = function(){
		ctx.drawImage(this.player, this.left, this.top, this.width, this.height);
	}

	this.setPosition = function(event){
		if(gameMonitor.isMobile()){
			var tarL = event.changedTouches[0].clientX;
			var tarT = event.changedTouches[0].clientY;
		}
		else{
			var tarL = event.offsetX;
			var tarT = event.offsetY;
		}
		this.left = tarL - this.width/2 - 16;
		this.top = tarT - this.height/2;
		if(this.left<0){
			this.left = 0;
		}
		if(this.left>320-this.width){
			this.left = 320-this.width;
		}
		if(this.top<0){
			this.top = 0;
		}
		if(this.top>gameMonitor.h - this.height){
			this.top = gameMonitor.h - this.height;
		}
		this.paint();
	}

	this.controll = function(){
		var _this = this;
		var stage = $('#gamepanel');
		var currentX = this.left,
			currentY = this.top,
			move = false;
		stage.on(gameMonitor.eventType.start, function(event){
			_this.setPosition(event);
			move = true;
		}).on(gameMonitor.eventType.end, function(){
			move = false;
		}).on(gameMonitor.eventType.move, function(event){
			event.preventDefault();
			if(move){
				_this.setPosition(event);	
			}
			
		});
	}

	this.eat = function(foodlist){
		for(var i=foodlist.length-1; i>=0; i--){
			var f = foodlist[i];
			if(f){
				var l1 = this.top+this.height/2 - (f.top+f.height/2);
				var l2 = this.left+this.width/2 - (f.left+f.width/2);
				var l3 = Math.sqrt(l1*l1 + l2*l2);
				if(l3<=this.height/2 + f.height/2){
					foodlist[f.id] = null;
					if(f.type==0){
						gameMonitor.stop();
						$('#gameoverPanel').show();

						setTimeout(function(){
							$('#gameoverPanel').hide();
							$('#resultPanel').show();
							gameMonitor.getScore();
						}, 2000);
					}
					else{
						$('#score').text(++gameMonitor.score);
						$('.heart').removeClass('hearthot').addClass('hearthot');
						setTimeout(function() {
							$('.heart').removeClass('hearthot')
						}, 200);
					}
				}
			}
			
		}
	}
}

function Food(type, left, id){
	this.speedUpTime = 300;
	this.id = id;
	this.type = type;
	this.width = 50;
	this.height = 50;
	this.left = left;
	this.top = -50;
	this.speed = 0.2 * Math.pow(1.35,Math.floor(gameMonitor.time/this.speedUpTime));
	this.loop = 0;

	var p = this.type == 0 ? 'http://www.25to75.com/public/game/static/img/food1.png' : 'http://www.25to75.com/public/game/static/img/food2.png';
	this.pic = gameMonitor.im.createImage(p);
}
Food.prototype.paint = function(ctx){
	ctx.drawImage(this.pic, this.left, this.top, this.width, this.height);
};
Food.prototype.move = function(ctx){
	if(gameMonitor.time % this.speedUpTime == 0){
		this.speed *= 1.2;
	}
	this.top += ++this.loop * this.speed;
	if(this.top>gameMonitor.h){
	 	gameMonitor.foodList[this.id] = null;
	}
	else{
		this.paint(ctx);
	}
};


function ImageMonitor(){
	var imgArray = [];
	return {
		createImage : function(src){
			return typeof imgArray[src] != 'undefined' ? imgArray[src] : (imgArray[src] = new Image(), imgArray[src].src = src, imgArray[src])
		},
		loadImage : function(arr, callback){
			for(var i=0,l=arr.length; i<l; i++){
				var img = arr[i];
				imgArray[img] = new Image();
				imgArray[img].onload = function(){
					if(i==l-1 && typeof callback=='function'){
						callback();
					}
				}
				imgArray[img].src = img
			}
		}
	}
}


var gameMonitor = {
	w : 320,
	h : 568,
	bgWidth : 320,
	bgHeight : 1126,
	time : 0,
	timmer : null,
	bgSpeed : 2,
	bgloop : 0,
	score : 0,
	im : new ImageMonitor(),
	foodList : [],
	bgDistance : 0,//背景位置
	eventType : {
		start : 'touchstart',
		move : 'touchmove',
		end : 'touchend'
	},
	init : function(){
		var _this = this;
		var canvas = document.getElementById('stage');
		var ctx = canvas.getContext('2d');

		//绘制背景
		var bg = new Image();
		_this.bg = bg;
		bg.onload = function(){
          	ctx.drawImage(bg, 0, 0, _this.bgWidth, _this.bgHeight);          	
		};
		bg.src = 'http://www.25to75.com/public/game/static/img/bg.jpg';

		_this.initListener(ctx);


	},
	initListener : function(ctx){
		var _this = this;
		var body = $(document.body);
		$(document).on(gameMonitor.eventType.move, function(event){
			event.preventDefault();
		});
		body.on(gameMonitor.eventType.start, '.replay, .playagain', function(){
			$('#resultPanel').hide();
			var canvas = document.getElementById('stage');
			var ctx = canvas.getContext('2d');
			_this.ship = new Ship(ctx);
      		_this.ship.controll();
      		_this.reset();
			_this.run(ctx);
		});

		body.on(gameMonitor.eventType.start, '#frontpage', function(){
			$('#frontpage').css('left', '-100%');
		});

		body.on(gameMonitor.eventType.start, '#guidePanel', function(){
			$(this).hide();
			_this.ship = new Ship(ctx);
			_this.ship.paint();
      		_this.ship.controll();
			gameMonitor.run(ctx);
		});

		body.on(gameMonitor.eventType.start, '.share', function(){
			$('.weixin-share').show().on(gameMonitor.eventType.start, function(){
				$(this).hide();
			});
		});

		WeixinApi.ready(function(Api) {   
            // 微信分享的数据
            //分享给好友的数据
            var wxData = {
                "appId": "", 
                "imgUrl" : "",
                "link" : "",
                "desc" : "",
                "title" : "“”"
            };

            //朋友圈数据
            var wxDataPyq ={
            	"appId": "",
                "imgUrl" : "http://www.25to75.com/public/game/static/img/icon.png",
                "link" : "",
                "desc" : "“”",
                "title" : ""
            };

            // 分享的回调
            var wxCallbacks = {
                // 分享操作开始之前
                ready : function() {},
                cancel : function(resp) {},
                fail : function(resp) {},
                confirm : function(resp) {},
                all : function(resp) {
                    //location.href=location.href
                }
            };

            // 用户点开右上角popup菜单后，点击分享给好友，会执行下面这个代码
            Api.shareToFriend(wxData, wxCallbacks);
            // 点击分享到朋友圈，会执行下面这个代码
            Api.shareToTimeline(wxDataPyq, wxCallbacks);
            // 点击分享到腾讯微博，会执行下面这个代码
            Api.shareToWeibo(wxData, wxCallbacks);
        });

	},
	rollBg : function(ctx){
		if(this.bgDistance>=this.bgHeight){
			this.bgloop = 0;
		}
		this.bgDistance = ++this.bgloop * this.bgSpeed;
		ctx.drawImage(this.bg, 0, this.bgDistance-this.bgHeight, this.bgWidth, this.bgHeight);
		ctx.drawImage(this.bg, 0, this.bgDistance, this.bgWidth, this.bgHeight);
	},
	run : function(ctx){
		var _this = gameMonitor;
		ctx.clearRect(0, 0, _this.bgWidth, _this.bgHeight);
		_this.rollBg(ctx);

		//绘制独角兽
		_this.ship.paint();
		_this.ship.eat(_this.foodList);


		//产生宝箱
		_this.genorateFood();

		//绘制宝箱
		for(i=_this.foodList.length-1; i>=0; i--){
			var f = _this.foodList[i];
			if(f){
				f.paint(ctx);
				f.move(ctx);
			}
			
		}
		_this.timmer = setTimeout(function(){
			gameMonitor.run(ctx);
		}, Math.round(1000/60));

		_this.time++;
	},
	stop : function(){
		var _this = this;
		$('#stage').off(gameMonitor.eventType.start + ' ' +gameMonitor.eventType.move);
		setTimeout(function(){
			clearTimeout(_this.timmer);
		}, 0);
		
	},
	genorateFood : function(){
		var genRate = 50; //产生宝箱的频率
		var random = Math.random();
		if(random*genRate>genRate-1){
			var left = Math.random()*(this.w - 50);
			var type = Math.floor(left)%2 == 0 ? 0 : 1;
			var id = this.foodList.length;
			var f = new Food(type, left, id);
			this.foodList.push(f);
		}
	},
	reset : function(){
		this.foodList = [];
		this.bgloop = 0;
		this.score = 0;
		this.timmer = null;
		this.time = 0;
		$('#score').text(this.score);
	},
	getScore : function(){
		var time = Math.floor(this.time/60);
		var score = this.score;
		var user = 1;
        if(score<10){
            user = 2;
        }
        else if(score>10 && score<=15){
            user = 10;
        }
        else if(score>15 && score<=20){
            user = 40;
        }
        else if(score>20 && score<=25){
            user = 80;
        }
        else if(score>25 && score<=30){
            user = 92;
        }
        else if(score>30){
            user = 98;
        }
		if(score<30){

//			$('#scorecontent').html('<h3>游戏成绩</h3>真遗憾，您抢到<span id="buzuz"></span>个橘子，超过了<span id="buzuu" class="lighttext">31%</span>的用户！' +
//                '不足<span class="lighttext">30个</span>，没有领取礼物的资格！操作不够好，去<span class="ds">神灯</span>那里试试运气吧');
////            $('#fenxiang').html('真遗憾，您抢到<span id="buzuz"></span>个橘子，超过了超过了<span id="buzuu" class="lighttext">31%</span>的用户！' +
////                '不足<span class="lighttext">30个</span>，没有领取礼物的资格！操作不够好，去<span class="ds">神灯</span>那里试试运气吧');
//            $('#buzuz').text(score);
//            $('#buzuu').text(user+'%');
////			$('.btn1').text('再玩一遍吧').removeClass('share').addClass('playagain');
////			$('#fenghao').removeClass('geili yinhen').addClass('yinhen');
//            $('.lqlu').addClass('yc');
//            $('.sssq').removeClass('sssqyc');

            var urlMobile='http://www.25to75.com/huod/guoguan';//手机跳转的页面//            小于30跳转到微信商城
                window.location.href=urlMobile;
			return;
		}
//        大于等于30显示领取礼物
       else if(score>=30)
        {
//            移除隐藏
//            $("#scorecontent").removeClass("yc");
//            $(".textc").removeClass("yc");
//            //		$('#fenghao').removeClass('geili yinhen').addClass('geili');
//            $('#scorecontent').html('<h3>游戏成绩</h3>您在<span id="stime" class="lighttext">2378</span>秒内抢到了<span id="sscore" class="lighttext">21341</span>个橘子<br>超过了<span id="suser" class="lighttext">31%</span>的用户！去领取礼物吧!');
//            $('#stime').text(time);
//            $('#sscore').text(score);
//            $('#suser').text(user+'%');
//            $('.btn1').text('在朋友圈晒分数').removeClass('playagain').addClass('share');
			alert("第三关通关成功，进入最后一关决定你的奖品");
			window.location.href="http://www.25to75.com/weixin/xyc";
        }
	},
	isMobile : function(){
		var sUserAgent= navigator.userAgent.toLowerCase(),
		bIsIpad= sUserAgent.match(/ipad/i) == "ipad",
		bIsIphoneOs= sUserAgent.match(/iphone os/i) == "iphone os",
		bIsMidp= sUserAgent.match(/midp/i) == "midp",
		bIsUc7= sUserAgent.match(/rv:1.2.3.4/i) == "rv:1.2.3.4",
		bIsUc= sUserAgent.match(/ucweb/i) == "ucweb",
		bIsAndroid= sUserAgent.match(/android/i) == "android",
		bIsCE= sUserAgent.match(/windows ce/i) == "windows ce",
		bIsWM= sUserAgent.match(/windows mobile/i) == "windows mobile",
		bIsWebview = sUserAgent.match(/webview/i) == "webview";
		return (bIsIpad || bIsIphoneOs || bIsMidp || bIsUc7 || bIsUc || bIsAndroid || bIsCE || bIsWM);
     }
}
if(!gameMonitor.isMobile()){
	gameMonitor.eventType.start = 'mousedown';
	gameMonitor.eventType.move = 'mousemove';
	gameMonitor.eventType.end = 'mouseup';
}

gameMonitor.init();
