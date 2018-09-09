<?php get_header(); ?>
<?php $def_bg =  get_template_directory_uri();?>
<?php if( have_posts() ): ?>
	<?php while ( have_posts() ): the_post(); ?>
	<div class="top_background" style="background-image: url(<?php if ( has_post_thumbnail( ) ) { the_post_thumbnail_url('codilight_lite_single_medium' );}?>);">
		<div class="top_cover"></div>
		<div class="article_title">
			<h2><?php the_title(); ?></h2>
			<p><?php echo get_the_excerpt(); ?></p>
			<p><i class="fa fa-clock-o fa-fw fa-spin"></i> <?php the_time();?></p>
			<p class="actitle_tags"><?php the_tags('<span>','</span> <span>','</span> '); ?></p>
		</div>
	</div>

	<div class="container">
		<section class="datas-container">
			<article class="ac_container">
				<?php the_content(); ?>
				<div class="article_share">
					<a href="" data-toggle="modal" data-target="#myModal" class="qrcode_arriclle"><i class="fa fa-thumbs-up"></i> 打赏</a>

					<a href="javascript:;" data-action="topTop" data-id="<?php the_ID(); ?>"class="dotGood <?php echo isset($_COOKIE['dotGood_' . $post->ID]) ? 'done' : ''; ?>">
					<i class="fa fa-heart"></i> <span class="count"><?php echo ($dot_good=get_post_meta($post->ID, 'dotGood', true)) ? $dot_good : '0'; ?></span>
					</a>
				</div>

				<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
				    <div class="modal-dialog">
				        <div class="modal-content">
				            <div class="modal-header">
				                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
				                    &times;
				                </button>
				                <h4 class="modal-title" id="myModalLabel">
				                   感谢你的支持！
				                </h4>
				            </div>
				            <div class="modal-body">
								<p>感谢您喜欢我的内容！</p>
								<p>您可以给我买一杯咖啡或一包辣条来支持我：</p>	
				            	<img src="<?php echo limi_get_talk( 'qrcode_uploader',$def_bg.'/images/qrcode.jpg'); ?> ">
				            </div>
				            <div class="modal-footer">
				                <button type="button" class="btn btn-default" data-dismiss="modal">谢谢^_^
				                </button>
				            </div>
				        </div><!-- /.modal-content -->
				    </div><!-- /.modal -->

			</article>
			<?php if ( comments_open() ) comments_template(); ?>	
		</section>
	</div>
	<?php endwhile; ?>
<?php endif; ?>
<script src="https://cdn.bootcss.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<?php get_footer(); ?>