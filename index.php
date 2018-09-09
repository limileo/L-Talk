<?php get_header();?>
	<?php $def_bg =  get_template_directory_uri();?>
	<div class="banner" style="background-image: url(<?php echo limi_get_talk( 'banner_uploader',$def_bg."/images/bg.jpg"); ?>);">
		<div class="banner_cover"></div>
		<div class="limi_type">
			<span id="ityped"></span>
		</div>
	</div>
	<div class="container">
		<div class="box_title"><h2>{ New Blog }</h2></div>
		<ul>
		<?php if( have_posts() ): ?>
			<?php while ( have_posts() ): the_post(); ?>
			<li>
				<div class="post-box">
					<div class="img_box">
						<?php the_post_thumbnail(); ?>
						<span class="tips_box"><?php the_category('|') ?></span>
					</div>
					<div class="intro">
						<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
						<div class="abstract">
							<?php echo get_the_excerpt(); ?>
						</div>
					</div>
					<div class="info">
						<div class="info-list">
							<span><i class="fa fa-clock-o fa-fw fa-spin"></i><?php the_time();?></span><?php the_tags('<span class="l_mate">','</span><span class="l_mate">','</span>'); ?>
						</div>
						<span class="view_box">阅读量：<?php get_post_views($post -> ID); ?></span>
					</div>
				</div>
			</li>
			<?php endwhile; ?>
		<?php endif; ?>
		</ul>
	</div>
	<?php 
    $posts = get_posts(array(                           
        'numberposts' => '8', //输出的文章数量
        'post_type' => 'portfolio',   //自定义文章类型名称
    	)
    );
	?>
	<div class="container">
		<div class="box_title"><h2>{ Deisgn }</h2></div>
		<div class="row">
			<?php if($posts): foreach($posts as $post): ?> 
			<div class="col-md-3">
				<div class=" case_box">
					<a href="<?php the_permalink(); ?>" title="<?php the_title();?>" target="_blank">
					<div class="post-img" style="background-image: url(<?php if ( has_post_thumbnail( ) ) { the_post_thumbnail_url('codilight_lite_single_medium' );} ?>);">
					</div>
					</a>
					<h3><a href="<?php the_permalink(); ?>" title="<?php the_title();?>" target="_blank"><?php the_title();?></a></h3>
					<div class="time_box limi_time"><i class="fa fa-clock-o fa-fw fa-spin"></i> <?php the_time();?></div>
					<div class="time_box limi_zl">
						<span><i class="fa fa-eye"></i> <?php get_post_views($post -> ID); ?></span>
						<span style="margin:0 10px"></span>
						<span><i class="fa fa-heart "></i> <?php echo ($dot_good=get_post_meta($post->ID, 'dotGood', true)) ? $dot_good : '0'; ?></span>
					</div>
				</div>
			</div>
			<?php wp_reset_postdata(); endforeach; endif;?>	
		</div>
	</div>
	<!-- 文字打印效果 -->
	<script src="<?php echo get_template_directory_uri();?>/js/itype.js" type="text/javascript"></script>	
	<script>
	ityped.init('#ityped', {
	strings:[<?php echo limi_get_talk( 'text_dayin','\'L-talk，来自设计师Limi的开源主题！\',\'交流博客：www.limiabc.com\''); ?>],
	startDelay: 200,
	loop: true
	});
	</script>
<?php get_footer();?>