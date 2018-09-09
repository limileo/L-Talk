<?php get_header(); ?>
<style type="text/css">.header{display:none;}header{position: relative;z-index: 99;}</style>
	<?php if( have_posts() ): ?>	
	<?php while ( have_posts() ): the_post(); ?>
	<div class="work_bg" style="background-image: url(<?php if ( has_post_thumbnail( ) ) { the_post_thumbnail_url('codilight_lite_single_medium' );}?>);"></div>
	<div class="title_work">
		<h2><?php the_title(); ?></h2>
    	<span><?php echo get_the_excerpt(); ?></span>
		<div class="post-like">
			<a href="javascript:;" data-action="topTop" data-id="<?php the_ID(); ?>"class="dotGood <?php echo isset($_COOKIE['dotGood_' . $post->ID]) ? 'done' : ''; ?>">
			<i class="fa fa-heart"></i><span class="count"><?php echo ($dot_good=get_post_meta($post->ID, 'dotGood', true)) ? $dot_good : '0'; ?></span>
			</a>
		</div>
	</div>
	<div class="mask_work" style="background: transparent url(<?php echo get_template_directory_uri();?>/images/pattern.png) repeat top left;"></div>
	<div class="box_work">
    	<div class="box_work_l">
    		<div class="pad_work">
	    			<?php the_content(); ?>
			</div>
		    <footer class="footer">
			    <p class="touch-me">{ Touch with me through😀 }</p>
			    <div class="social">
			        <a target="_blank" href="https://www.facebook.com/limiZHM">Facebook</a>
			        <a target="_blank" href="https://twitter.com/limiZHM">Twitter</a>
			        <a href="mailto:494378361@qq.com">E-Mail</a>
			        <a target="_blank" href="https://weibo.com/2459706594/">Weibo</a>
			        <a target="_blank" href="https://dribbble.com/limileo">Dribbble</a>
			        <a target="_blank" href="https://github.com/limileo">GitHub</a>
			    </div>
			    <p class="copyright">Copyright © 2018 Limi</p>
			</footer>
			<a class="to-top"><img src="<?php echo get_template_directory_uri();?>/images/top.png"></a>
    	</div>
	</div>
		<?php endwhile; ?>
	<?php endif; ?>	
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
	           $(document).ready(function () {
		       	$(".loading").css("opacity",0);
		       	$(".loading").css("z-index",-99);
		       });
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