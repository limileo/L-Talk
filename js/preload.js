/*
* @Author: fanqian
* @Date:   2016-06-15 12:34:55
* @Website:   Administrator
* @使用请注明作者和网站
*/
$.QianLoad = {
    PageLoading: function(options) {
        var defaults = {
            delayTime: 500, //页面加载完成后，加载进度条淡出速度
            sleep: 0, //设置挂起,等于0时则无需挂起
            css: '<style>body{margin:0}.load-wrap{width:100%;height:100%;position:absolute;top:0;left:0;background:#ffffff}#pre-load{position:fixed;top:0;height:2px;background:#2085c5;transition:opacity .5s linear}#pre-load span{position:absolute;width:150px;height:2px;-webkit-border-radius:100%;-webkit-box-shadow:#2085c5 1px 0 6px 1px;opacity:1;right:-10px;-webkit-animation:pulse 2s ease-out 0s infinite}@-webkit-keyframes pulse{30%{opacity:.6}60%{opacity:0}to{opacity:.6}}</style>'
            //进度条样式位置可以自己修改
        }
        var options = $.extend(defaults, options);
        //在页面未加载完毕之前显示的loading Html自定义内容
        $('head').append(defaults.css);
        var _LoadingHtml = '<div class="load-wrap"><div id="pre-load">' + '<span></span>' + '</div></div>';
        //呈现loading效果
        $("body").append(_LoadingHtml);
        //监听页面加载状态
        document.onreadystatechange = PageLoaded;
        function PageLoaded() {
            var loadingMask = $('#pre-load');
            $({
                property: 0
            }).animate({
                property: 98
            }, {
                duration: 1000,
                step: function() {
                    var percentage = Math.round(this.property);
                    loadingMask.css('width', percentage + "%");
                    //页面加载后执行
                    if (document.readyState == "complete") {
                        loadingMask.css('width', 100 + "%");
                        setTimeout(function() {
                                loadingMask.animate({
                                        "opacity": 0
                                    },
                                    options.delayTime,
                                    function() {
                                        $(this).remove();
                                        console.log('Loading has been successful');
                                    });
                            },
                            options.sleep);
                    }
                }
            });
        }
    }
}