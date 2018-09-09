	
	<footer class="footer">
	    <p class="touch-me">{ Touch with me through😀 }</p>
	    <div class="social">
	        <a target="_blank" href="<?php echo limi_get_talk( 'text_facebook','https://www.facebook.com/limiZHM'); ?>">Facebook</a>
	        <a target="_blank" href="<?php echo limi_get_talk( 'text_twitter','https://twitter.com/limiZHM'); ?>">Twitter</a>
	        <a href="mailto:<?php echo limi_get_talk( 'text_email','494378361@qq.com'); ?>">E-Mail</a>
	        <a target="_blank" href="<?php echo limi_get_talk( 'text_weibo','https://weibo.com/2459706594/'); ?>">Weibo</a>
	        <a target="_blank" href="<?php echo limi_get_talk( 'text_dribbble','https://dribbble.com/limileo'); ?>">Dribbble</a>
	        <a target="_blank" href="<?php echo limi_get_talk( 'text_gitHub','https://github.com/limileo'); ?>">GitHub</a>
	    </div>
	    <p class="copyright"><?php echo limi_get_talk( 'text_copyright','Copyright © 2018 Limi'); ?> | <span><i class="fa fa-heart fa-pong"></i> Theme by <a href="http://www.limiabc.com" target="_blank">Limi</a></span></p>
		
	</footer>
	<a class="to-top"><img src="<?php echo get_template_directory_uri();?>/images/top.png"></a>
	<?php wp_footer(); ?>
	<!-- 导航效果 -->
	<script src="<?php echo get_template_directory_uri();?>/js/easing.js"></script>
	<script src="<?php echo get_template_directory_uri();?>/js/moveline.js"></script>
	<script>
		$('.menu').moveline();
	</script>
	<!-- 返回顶部 -->
	<script src="<?php echo get_template_directory_uri();?>/js/toTop.min.js"></script>
	   <script>
	       jQuery(function($){
	           $('.to-top').toTop({
	               autohide: true, 
	               offset: 420, 
	               speed: 500,
	               right: 15, 
	               bottom: 30
	           });
	       });
	       $(document).ready(function () {
	       	$(".loading").css("opacity",0);
	       	$(".loading").css("z-index",-99);
	       });
	       	       $.fn.postLike = function () {
		    if ($(this).hasClass('done')) {
		        alert('点多了伤身体~');
		        return false;
		    } else {
		        $(this).addClass('done');
		        var id = $(this).data("id"),
		            action = $(this).data('action'),
		            rateHolder = $(this).children('.count');
		        var ajax_data = {
		            action: "dotGood",
		            um_id: id,
		            um_action: action
		        };
		        $.post("/wp-admin/admin-ajax.php", ajax_data,
		            function (data) {
		                $(rateHolder).html(data);
		            });
		        return false;
		    }
		};
		$(".dotGood").click(function () {
		    $(this).postLike();
		});
	   </script>
	<!-- 返回顶部 -->
	</body>
</html>