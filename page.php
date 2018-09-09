<?php
/**
 * The template for displaying pages
 */
get_header(); ?>

<div class="top_background" style="padding: 30PX 0; background-image: url(<?php if ( has_post_thumbnail( ) ) { the_post_thumbnail_url('codilight_lite_single_medium' );}?>);">
        <div class="top_cover"></div>
        <div class="article_title">
            <h2><?php the_title(); ?></h2>
            <p><i class="fa fa-clock-o fa-fw fa-spin"></i> <span id="runtime_span"></span></p>
        </div>
    </div>
    <?php if (have_posts()) : the_post(); update_post_caches($posts); ?>
    <div class="container">
        <div class="page_content">
                <?php the_content(); ?>
                <?php if ( comments_open() ) comments_template(); ?>
        </div>
    </div>
    <?php else : ?>
         
    <?php endif; ?>
<script type="text/javascript">
    function show_runtime() {
    window.setTimeout("show_runtime()", 1000);
    X = new Date("10/20/2015 23:21:40");
    Y = new Date();
    T = (Y.getTime() - X.getTime());
    M = 24 * 60 * 60 * 1000;
    a = T / M;
    A = Math.floor(a);
    b = (a - A) * 24;
    B = Math.floor(b);
    c = (b - B) * 60;
    C = Math.floor((b - B) * 60);
    D = Math.floor((c - C) * 60);
    runtime_span.innerHTML = "博客已运行" + A + "天" + B + "小时" + C + "分" + D + "秒"
}
show_runtime(); 
</script>
<?php get_footer(); ?>
