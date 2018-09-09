// by  Ifmiss
// github: https://github.com/IFmiss/moveline
// 菜单鼠标悬浮移动效果

(function(){
	//底部的菜单移动效果
	$.fn.moveline = function(options,callback){
		var _this = this;
		var $this = $(this);
		var defaultValue = {
			height:2,						//高度
			position:'', 					//线条是显示在内部    inner是在内部
			color:'#FFC107',				//颜色
			animateTime:500,   				//毫秒
			animateType:'easeOutBack',   	//动画效果     //没有引用jquery.easing.js  的话  为''就行。
			zIndex:'1', 					//层级
			top:0, 							//自定义top
			customTop:false, 				//是否自定义top
			randomColor:false, 				//是否显示随机色线条
			randomOpacity:1, 				//透明度
			click:function(){}, 			//点击菜单触发的效果
		}

		var opt = $.extend(defaultValue,options || {});
		$this.css({
			position:'relative',
		});

		//li的margin 宽
		var li_width = $this.children().outerWidth();

		//li的margin 高  也是之后滚动线条的top值
		var li_height = opt.position === 'inner'? $this.children().outerHeight() - opt.height : $this.children().outerHeight();

		//红线的left位置
		var li_left = $this.children().position().left;

		//li的margin left
		var li_marginLeft = Number($this.children().css('margin-left').replace(/[^0-9]+/g, ''));

		//是否显示随机颜色
		var randomColor = function(){
		    var opacity = opt.randomOpacity || 1;
		    var r=Math.floor(Math.random()*256);
		    var g=Math.floor(Math.random()*256);
		    var b=Math.floor(Math.random()*256);
		    return "rgba("+r+','+g+','+b+','+opacity+")";
		};

		var color = opt.randomColor? randomColor() : opt.color;

		if(opt.customTop) li_height = opt.top;

		var zIndex = opt.height > 5 ? '-1':opt.zIndex;

		// 定义底部滚动线条
		_this.moveLineDiv = $('<div class="nav_line"></div>').css({
			'position': 'absolute',
	    	'height': opt.height,
	    	'background': color,
	    	'top':li_height,
	    	'z-index':zIndex,
		}).appendTo($this);


		//判断li中有active 的索引 并获取其left的值
		for(var i  = 0; i<$this.children().length;i++){
			if ($this.children().eq(i).hasClass('current-menu-item')) {
				li_left = $this.children().eq(i).position().left;
				li_width = $this.children().eq(i).outerWidth();
			}
		}

		// 初始化红线进去
		_this.moveLineDiv.stop().animate({
			width:li_width,
			left:li_left + li_marginLeft
		}, opt.animateTime,opt.animateType);

		//红线的hover效果
		$this.children().hover(function(){
			var li_marginLeft = Number($this.children().css('margin-left').replace(/[^0-9]+/g, ''));
			var li_width = $(this).outerWidth();
			var li_left = $(this).position().left;

			_this.moveLineDiv.stop().animate({
				width:li_width,
				left:li_left + li_marginLeft
				}, opt.animateTime,opt.animateType);
			},function(){

			for(var i  = 0; i<$this.children().length;i++){
				if ($this.children().eq(i).hasClass('current-menu-item')) {
					li_left = $this.children().eq(i).position().left;
					li_width = $this.children().eq(i).outerWidth();
				}
			}

			_this.moveLineDiv.stop().animate({
				width:li_width,
				left:li_left + li_marginLeft
			}, opt.animateTime);
		});

		$this.children().on('click',function(){
			var ret = {
				ele:$(this),
				index:$(this).index(),
			}
			opt.click(ret);

			//未写回调函数则不会有效果
			// if(typeof(callback) === 'function'){
			// 	callback(ret);
			// }else{
			// 	console.error('You need a click event callback function, which needs to be written in the callback after defining the plugin!');
			// }
		});

		return _this;
	}
})(jQuery)