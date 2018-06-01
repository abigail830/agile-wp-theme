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
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
	<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/swiper.css" type="text/css" media="all" />
	<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/global.css" type="text/css" media="all" />
	<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/single.css" type="text/css" media="all" />
	<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/archive.css" type="text/css" media="all" />
	
	<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/header.css" type="text/css" media="all" />
	<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/footer.css" type="text/css" media="all" />
	<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/home-banner.css" type="text/css" media="all" />
	<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/home-news.css" type="text/css" media="all" />
	<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/home-slogon.css" type="text/css" media="all" />
	<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/home-snapshot.css" type="text/css" media="all" />
	<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/home-about.css" type="text/css" media="all" />
	<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/honor-timeline.css" type="text/css" media="all" />
	<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/page-news.css" type="text/css" media="all" />
	<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/page-publicreport.css" type="text/css" media="all" />
	<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/page-breakdown.css" type="text/css" media="all" />
	<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/page-voluteer.css" type="text/css" media="all" />
	
    <?php wp_head(); ?>
</head>
<body>
<div id="header">
    	<div id="top-header">
			<div class="container clearfix">	
				<div class="translate-menu">
					<?php wpcc_output_navi(); ?>
				</div>
			</div> <!-- .container -->
		</div> <!-- #top-header -->
	
	
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