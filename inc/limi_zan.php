<?php
/**
 * AJAX点赞
 * by: #fatesinger.com
 * modify: #http://talk.limiabc.com  #Limi
 */

function dotGood()
{
    global $wpdb, $post;
    $id = $_POST["um_id"];
    if ($_POST["um_action"] == 'topTop') {
        $specs_raters = get_post_meta($id, 'dotGood', true);
        $expire = time() + 99999999;
        $domain = ($_SERVER['HTTP_HOST'] != 'localhost') ? $_SERVER['HTTP_HOST'] : false; // make cookies work with localhost
        setcookie('dotGood_' . $id, $id, $expire, '/', $domain, false);
        if (!$specs_raters || !is_numeric($specs_raters)) update_post_meta($id, 'dotGood', 1);
        else update_post_meta($id, 'dotGood', ($specs_raters + 1));
        echo get_post_meta($id, 'dotGood', true);
    }
    die;
}
add_action('wp_ajax_nopriv_dotGood', 'dotGood');
add_action('wp_ajax_dotGood', 'dotGood');