<?php get_header();?>
	<?php 
    $posts = get_posts(array(                           
        'numberposts' => '80', //输出的文章数量
        'post_type' => 'portfolio',   //自定义文章类型名称     
        // 'tax_query'=>array(
        //     array(
        //         'taxonomy'=>'portfolio_category', //自定义分类法名称
        //         'terms'=>'2' //id为2的分类。也可是多个分类array(2,3)
        //     )
        // ),
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
						<span><i class="iconfont icon-liuyan"></i>12</span>
						<span style="margin:0 10px"></span>
						<span><i class="iconfont icon-zan"></i>12</span>
					</div>
				</div>
			</div>	
			<?php wp_reset_postdata(); endforeach; endif;?>			
		</div>
	</div>	
<?php get_footer();?>