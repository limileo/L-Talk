<?php get_header();?>
<canvas id="matrix"></canvas>
	<div class="container">
		<div class="box_title matrix_title"><h2>{ 标签：<?php echo single_tag_title(); ?>
		 }
		</h2>
		</div>
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
			<?php limi_pagenavi();?>
		<?php endif; ?>
		</ul>
	</div>
	<script src="<?php echo get_template_directory_uri();?>/js/matrix.js"></script>





<?php get_footer();?>