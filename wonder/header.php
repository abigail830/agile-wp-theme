<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width = device-width, initial-scale = 1.0, maximum-scale = 1.0, user-scalable = 0"/>
    <meta name="full-screen" content="yes">
    <meta name="browsermode" content="application">
    <meta name="msapplication-tap-highlight" content="no">
    <meta name="format-detection" content="telephone=no"/>
    <meta name="format-detection" content="email=no"/>
    <meta name="renderer" content="webkit">
    <?php if (is_home()) { ?>
        <title><?php bloginfo('name'); ?></title>
    <?php } else { ?>
        <meta name="title" content="<?php wp_title('|', true, 'right'); ?>">
    <?php } ?>
    <meta name="description" content="<?php bloginfo('description'); ?>"/>
    <link rel="stylesheet" href="<?php echo get_stylesheet_uri(); ?><?php echo the_wonder_version(); ?>"/>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css" />
    <?php wp_head(); ?>
</head>
<body>
<div id="header">
    <div class="header__wrapper page-container clearfix">
        <div class="header__logo">
            <a href="<?php echo esc_url(home_url('/')); ?>">
                <img src="<?php bloginfo('template_url'); ?>/resources/images/logo_dark.png" alt="<?php bloginfo('name'); ?>">
            </a>
        </div>
        <div class="header__menus">
            <div class="min_menus">
                <a href="javascript:;" class="menus_active_btn">
                    <i class="iconfont icon-menus"></i>
                </a>
            </div>
            <ul class="header-menus__ul">
                <?php wp_nav_menu(array('echo' => true, 'container' => false, 'items_wrap' => '%3$s', 'theme_location' => 'Head_Menus', 'depth' => 2)); ?>
            </ul>
        </div>
    </div>
</div>