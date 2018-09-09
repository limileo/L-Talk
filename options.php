<?php
/**
 * A unique identifier is defined to store the options in the database and reference them from the theme.
 */
function optionsframework_option_name() {
	// Change this to use your theme slug
	return 'T-talk';
}

/**
 * Defines an array of options that will be used to generate the settings page and be saved in the database.
 * When creating the 'id' fields, make sure to use all lowercase and no spaces.
 *
 * If you are making your theme translatable, you should replace 'theme-textdomain'
 * with the actual text domain for your theme.  Read more:
 * http://codex.wordpress.org/Function_Reference/load_theme_textdomain
 */

function optionsframework_options() {

$options = array();

/*选项卡组1*/
$options[] = array(
	'name' => __( '基础设置', 'theme-textdomain' ),
	'type' => 'heading'
);

$options[] = array(
	'name' => '网站logo' ,
	'desc' => '上传一个png格式的logo，大小284*80px.',
	'id' => 'logo_uploader',
	'std' => '大小为284*80 px',
	'type' => 'upload'
);

$options[] = array(
	'name' => '主页Bann图er' ,
	'desc' => '请上传主页banner图，大小最好1920*1080px.',
	'id' => 'banner_uploader',
	'std' => '大小最好1920*1080px',
	'type' => 'upload'
);

$options[] = array(
	'name' => 'Banner打印字体效果，内容' ,
	'desc' => '请输入需要显示的内容，格式为：\'内容\'，多段文本用英文逗号分开',
	'id' => 'text_dayin',
	'std' => '\'内容1\',\'内容2\'',
	'type' => 'text'
);

$options[] = array(
	'name' => '底部版权设置' ,
	'desc' => '在这里可以展示你的备案信息，版权系信息等',
	'id' => 'text_copyright',
	'std' => 'Copyright © 2018 Limi',
	'type' => 'text'
);


/*选项卡组2*/
$options[] = array(
	'name' => __( '打赏设置', 'theme-textdomain' ),
	'type' => 'heading'
);
$options[] = array(
	'name' => '打赏二维码' ,
	'desc' => '打赏二维码，宽度 ≥ 568px.',
	'id' => 'qrcode_uploader',
	'std' => '宽度 ≥ 568px',
	'type' => 'upload'
);


/*选项卡组3*/
$options[] = array(
	'name' => __( '社交', 'theme-textdomain' ),
	'type' => 'heading'
);
$options[] = array(
	'name' => 'Facebook' ,
	'desc' => 'Facebook主页链接.',
	'id' => 'text_Facebook',
	'std' => 'https://www.facebook.com/limiZHM',
	'type' => 'text'
);
$options[] = array(
	'name' => 'Twitter' ,
	'desc' => 'Twitter主页链接.',
	'id' => 'text_Twitter',
	'std' => 'https://twitter.com/limiZHM',
	'type' => 'text'
);
$options[] = array(
	'name' => 'E-mail' ,
	'desc' => '邮箱地址.',
	'id' => 'text_email',
	'std' => '494378361@qq.com',
	'type' => 'text'
);
$options[] = array(
	'name' => 'Weibo' ,
	'desc' => 'Weibo主页链接.',
	'id' => 'text_Weibo',
	'std' => 'https://weibo.com/2459706594/',
	'type' => 'text'
);
$options[] = array(
	'name' => 'Dribbble' ,
	'desc' => 'Dribbble主页链接.',
	'id' => 'text_Dribbble',
	'std' => 'https://dribbble.com/limileo',
	'type' => 'text'
);
$options[] = array(
	'name' => 'GitHub' ,
	'desc' => 'GitHub主页链接.',
	'id' => 'text_GitHub',
	'std' => 'https://github.com/limileo',
	'type' => 'text'
);













	return $options;
}