<?php
function my_custom_post_portfolio() {
  $labels = array(
    'name'               => _x( '作品', 'post type 名称' ),
    'singular_name'      => _x( '作品', 'post type 单个 item 时的名称，因为英文有复数' ),
    'add_new'            => _x( '添加作品', '添加新内容的链接名称' ),
    'add_new_item'       => __( '添加一个作品' ),
    'edit_item'          => __( '编辑作品' ),
    'new_item'           => __( '新作品' ),
    'all_items'          => __( '所有作品' ),
    'view_item'          => __( '查看作品' ),
    'search_items'       => __( '搜索作品' ),
    'not_found'          => __( '没有找到有关作品' ),
    'not_found_in_trash' => __( '回收站里面没有相关作品' ),
    'parent_item_colon'  => '',
    'menu_name'          => '作品'
  );
  $args = array(
    'labels'        => $labels,
    'description'   => '我们网站的作品信息',
    'public'        => true,
    'menu_position' => 5,
    'supports'      => array( 'title', 'editor', 'thumbnail', 'excerpt', 'comments' ),
    'has_archive'   => true
  );
  register_post_type( 'portfolio', $args );
}
add_action( 'init', 'my_custom_post_portfolio' );

function my_taxonomies_portfolio() {
  $labels = array(
    'name'              => _x( '作品分类', 'taxonomy 名称' ),
    'singular_name'     => _x( '作品分类', 'taxonomy 单数名称' ),
    'search_items'      => __( '搜索作品分类' ),
    'all_items'         => __( '所有作品分类' ),
    'parent_item'       => __( '该作品分类的上级分类' ),
    'parent_item_colon' => __( '该作品分类的上级分类：' ),
    'edit_item'         => __( '编辑作品分类' ),
    'update_item'       => __( '更新作品分类' ),
    'add_new_item'      => __( '添加新的作品分类' ),
    'new_item_name'     => __( '新作品分类' ),
    'menu_name'         => __( '作品分类' ),
  );
  $args = array(
    'labels' => $labels,
    'hierarchical' => true,
  );
  register_taxonomy( 'portfolio_category', 'portfolio', $args );
}
add_action( 'init', 'my_taxonomies_portfolio', 0 );