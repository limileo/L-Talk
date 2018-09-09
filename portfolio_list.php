<?php
/*
 *   Template Name: 作品列表
 *   Description: 【里米说】wordpress主题，轻量简洁，适应于设计师与开发者的轻量内容展示主题.
 *   Version: 1.0
 *   Author: Limi
 *   Author URI: http://www.limiabc.com/
 *  
 */?> 
<?php get_header();?>
 <div class="container">
	<div class="box_title"><h2>{ Deisgn }</h2></div>
	<div class="row">
		<?php 
		  $temp = $wp_query; 
		  $wp_query = null; 
		  $wp_query = new WP_Query(); 
		  $show_posts = 12;  //How many post you want on per page
		  $permalink = 'Post name'; // Default, Post name
		  $post_type = 'portfolio';

		  //Know the current URI
		  $req_uri =  $_SERVER['REQUEST_URI'];  

		  //Permalink set to default
		  if($permalink == 'Default') {
		  $req_uri = explode('paged=', $req_uri);

		  if($_GET['paged']) {
		  $uri = $req_uri[0] . 'paged='; 
		  } else {
		  $uri = $req_uri[0] . '&paged=';
		  }
		  //Permalink is set to Post name
		  } elseif ($permalink == 'Post name') {
		  if (strpos($req_uri,'page/') !== false) {
		  $req_uri = explode('page/',$req_uri);
		  $req_uri = $req_uri[0] ;
		  }
		  $uri = $req_uri . 'page/';

		  }

		  //Query
		  $wp_query->query('showposts='.$show_posts.'&post_type='. $post_type .'&paged='.$paged); 
		  //count posts in the custom post type
		 $count_posts = wp_count_posts('portfolio');

		  while ($wp_query->have_posts()) : $wp_query->the_post(); 
		  ?>
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
					<span><i class="fa fa-heart"></i> <?php echo ($dot_good=get_post_meta($post->ID, 'dotGood', true)) ? $dot_good : '0'; ?></span>
				</div>
			</div>
		</div>
		<?php endwhile;?>
	</div>
	<?php limi_pagenavi();?>
</div>
<?php get_footer();?>