<?php

/*
*引入主题管理框架
*/
define( 'OPTIONS_FRAMEWORK_DIRECTORY', get_template_directory_uri() . '/inc/' );
require_once dirname( __FILE__ ) . '/inc/options-framework.php';
$optionsfile = locate_template( 'options.php' );
load_template( $optionsfile );
/*
*主题管理名称
*/
function prefix_options_menu_filter( $menu ) {
  $menu['mode'] = 'menu';
  $menu['page_title'] = 'L-talk 主题设置';
  $menu['menu_title'] = 'L-talk 主题设置';
  $menu['menu_slug'] = 'mindia-options';
  return $menu;
}
add_filter( 'optionsframework_menu', 'prefix_options_menu_filter' );

/*
*注册导航函数
*/
register_nav_menus();

/*
*添加封面图
*/
add_theme_support( 'post-thumbnails' );

/*
*自定义摘要
*/
/*控制摘要字数*/
function new_excerpt_length($length) {
return 50;
}
add_filter("excerpt_length", "new_excerpt_length");

/*
*定义主题路径变量
*/
function limi_def(){  
  $def_bg =  get_template_directory_uri();
  $abc = $de_bg.'/images/bg.jpg';
}
add_filter('limi_def','limi_def');

/*
*显示阅读量
*/   
function get_post_views ($post_id) {   
  
    $count_key = 'views';   
    $count = get_post_meta($post_id, $count_key, true);   
  
    if ($count == '') {   
        delete_post_meta($post_id, $count_key);   
        add_post_meta($post_id, $count_key, '0');   
        $count = '0';   
    }   
  
    echo number_format_i18n($count);   
  
}     
function set_post_views () {   
  
    global $post;   
  
    $post_id = $post -> ID;   
    $count_key = 'views';   
    $count = get_post_meta($post_id, $count_key, true);   
  
    if (is_single() || is_page()) {   
  
        if ($count == '') {   
            delete_post_meta($post_id, $count_key);   
            add_post_meta($post_id, $count_key, '0');   
        } else {   
            update_post_meta($post_id, $count_key, $count + 1);   
        }   
  
    }   
  
}   
add_action('get_header', 'set_post_views');  

/*
*去除wp_head()中无效函数
*/
remove_action( 'wp_head', 'wp_generator' ); 
remove_action( 'wp_head', 'rsd_link' );   
remove_action( 'wp_head', 'wlwmanifest_link'); 
remove_action( 'wp_head', 'index_rel_link' ); // Removes the index link   
remove_action( 'wp_head', 'parent_post_rel_link', 10, 0 ); // Removes the prev link   
remove_action( 'wp_head', 'start_post_rel_link', 10, 0 ); // Removes the start link   
remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0 ); // Removes the relational links for the posts adjacent to the current post. 

/**
 * 去除wp的emoji标签库，脚本之类的，保证头部代码整洁
 */
 function disable_emojis() {
 remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
 remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
 remove_action( 'wp_print_styles', 'print_emoji_styles' );
 remove_action( 'admin_print_styles', 'print_emoji_styles' );
 remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
 remove_filter( 'comment_text_rss', 'wp_staticize_emoji' );
 remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );
 add_filter( 'tiny_mce_plugins', 'disable_emojis_tinymce' );
 }
 add_action( 'init', 'disable_emojis' );
/**
 * Filter function used to remove the tinymce emoji plugin.
 */
 function disable_emojis_tinymce( $plugins ) {
 if ( is_array( $plugins ) ) {
 return array_diff( $plugins, array( 'wpemoji' ) );
 } else {
 return array();
 }
 }

/**
 * 去除wp dns 因为国内无效
 */
function remove_dns_prefetch( $hints, $relation_type ) {
if ( 'dns-prefetch' === $relation_type ) {
return array_diff( wp_dependencies_unique_hosts(), $hints );
}
return $hints;
}
add_filter( 'wp_resource_hints', 'remove_dns_prefetch', 10, 2 );

//禁止加载wp-embeds.mins.js
include (TEMPLATEPATH . '/inc/disable_embeds.php');


/*
*在24小时以内发布的显示为几分钟前或几小时前 
*/
function timeago() { 
 global $post; 
 $date = $post->post_date; 
 $time = get_post_time('G', true, $post); 
 $time_diff = time() - $time; 
 if ( $time_diff > 0 && $time_diff < 24*60*60 ) 
 $display = sprintf( __('%s前'), human_time_diff( $time ) ); 
 else 
 $display = date(get_option('date_format'), strtotime($date) ); 
 
 return $display; 
} 
 
add_filter('the_time', 'timeago');



/**
* Wordpress后台文章列表后面显示特色图像 By ILXTX.COM
* https://www.ilxtx.com/wordpress-featured-image-column.html
*/
if (function_exists( 'add_theme_support' )){
    add_filter('manage_posts_columns', 'my_add_posts_columns', 5);
    add_action('manage_posts_custom_column', 'my_custom_posts_columns', 5, 2);
}
function my_add_posts_columns($defaults){
   $defaults['my_post_thumbs'] = '特色图像';
    return $defaults;
}
function my_custom_posts_columns($column_name, $id){
    if($column_name === 'my_post_thumbs'){
        echo the_post_thumbnail( array(125,80) );
    }
}

/*
*自定义作品集分类
*/
require get_template_directory() . '/inc/limi-portfolio.php';

/*
*自定义分页
*/
require get_template_directory() . '/inc/limi_pagenavi.php';

/*
*自定义点赞
*/
require get_template_directory() . '/inc/limi_zan.php';


/*
*自定义评论列表模板
*/
function limi_comment($comment, $args, $depth) {
   $GLOBALS['comment'] = $comment; ?>
   <li class="comment" id="li-comment-<?php comment_ID(); ?>">
   		<div class="media">
   			<div class="media-left">
        		<?php if (function_exists('get_avatar') && get_option('show_avatars')) { echo get_avatar($comment, 28); } ?>
   			</div>
   			<div class="media-body">
   				<?php printf(__('<p class="author_name">%s</p>'), get_comment_author_link()); ?>
		        <?php if ($comment->comment_approved == '0') : ?>
		            <em>评论等待审核...</em><br />
				<?php endif; ?>
				<?php comment_text(); ?>
				<div class="comment-metadata">
					<span class="comment-pub-time">
						<?php echo get_comment_time('Y-m-d H:i'); ?>
					</span>
					<span class="comment-btn-reply">
						<i class="fa fa-reply"></i> <?php comment_reply_link(array_merge( $args, array('reply_text' => '回复','depth' => $depth, 'max_depth' => $args['max_depth']))) ?> 
					</span>
				</div>
   			</div>
   		</div> 
<?php
}
?>