<?php get_header(); ?>
<!--banner-->
<div id="home-banner">
    <div class="home-banner-wrapper">
        <div class="swiper-container">
            <div class="swiper-wrapper">
                <?php
                $banners = get_posts(array(
                    'post_type' => 'banner',
                    'meta_key' => '_banner_position',
                    'orderby' => 'meta_value_num',
                    'order' => 'DESC',
                    'posts_per_page' => -1
                ));

                foreach ($banners as $post) { ?>
                    <div class="banner__slide swiper-slide"
                         style="background-image: url('<?php echo get_the_post_thumbnail_url($post); ?>')">
                        <?php
                        if (!empty(get_post_meta($post->ID, '_banner_title', true))) { ?>
                            <div class="swiper__buttons">
                                <a href="<?php echo get_post_meta($post->ID, '_banner_link', true); ?>">
                                    <?php echo get_post_meta($post->ID, '_banner_title', true); ?>
                                </a>
                            </div>
                        <?php } ?>
                    </div>
                <?php } ?>
            </div>
            <div class="swiper-pagination"></div>
            <div class="swiper-buttons">
                <div class="swiper-button-prev"></div>
                <div class="swiper-button-next"></div>
            </div>
        </div>
    </div>
</div>

<!--新闻中心-->
<div id="home-news">
    <div class="home-news-wrapper page-container">
        <div class="center green">
            <h2>新闻中心</h2>
        </div>
    </div>
    <div class="home-news__ul page-container">
        <ul>
            <?php
            $posts = get_posts(array(
                'post_type' => 'news',
                'order' => 'DESC',
				'tax_query' => array(
					array(
						'taxonomy' => 'news_archive',
						'field'    => 'slug',
						'terms'    => 'front-news',
					),
				 ),
                'posts_per_page' => -1
            ));
            foreach ($posts as $post) { ?>
            <li>
                <div class="home-news__item">
                    <div class="item__time">
                        <?php echo wonder_get_timeago($post->post_date); ?>
                    </div>
                    <div class="item__post_title">
                        <h3><a href="<?php echo get_permalink($post->ID); ?>"><?php echo $post->post_title; ?></a>
                        </h3>
                    </div>
                    <div class="item__desc">
                        <p><?php echo get_post_meta($post->ID, '_news_desc', true); ?></p>
                    </div>
                </div>
            </li>
        </ul>
        <?php }; ?>
    </div>
</div>
<div id="home-slogon">
	<div class="home-slogon__background white center">
		<h2>致力于公益事业，倡导企业公民责任，推动社会和谐进步</h2>
	</div>
</div>

<!--项目剪影-->
<div id="home-snapshot">
    <div class="home-snapshot-wrapper page-container">
        <div class="center green">
            <h2>项目剪影</h2>
        </div>
        <div class="home-snapshot__group">
            <div class="swiper-container">
                <div class="swiper-wrapper">
                               <?php
            $posts = get_posts(array(
                'post_type' => 'case',
                'order' => 'DESC',
				'tax_query' => array(
					array(
						'taxonomy' => 'case_archive',
						'field'    => 'slug',
						'terms'    => 'project-snapshot',
					),
				 ),
                'posts_per_page' => -1
            ));
                    foreach ($posts as $post) { ?>
                        <div class="swiper-slide">
                            <a href="<?php echo get_permalink($post); ?>">
                                <div class="home-snapshot__item">
                                    <div class="snapshot__avatar"
                                         style="background-image: url('<?php echo get_the_post_thumbnail_url($post); ?>')"></div>
                                    <div class="snapshot__content">
                                        <h3 class="center green"><?php echo $post->post_title; ?></h3>
                                        <p class="left dark_grey"><?php echo get_post_meta($post->ID, '_case_desc', true); ?>
                                        </p>
                                    </div>
                                </div>
                            </a>
                        </div>
                    <?php }; ?>
                </div>
            </div>
        </div>
		<div class="read_more">
			<a href="http://wonder.saraqian.com/case/">查看更多公益项目</a>
		</div>
    </div>
</div>

<!--关于我们-->
<div id="home-about" class="green-background" >
	<div class="map-container">
		<div class="map"></div>
	</div>
    <div class="about__content page-container">
        <h3 class="white">联系我们</h3>
        <div class="info_content">
            <p><i class="fa fa-map-marker"></i>&nbsp;<span> 地址：</span>中国广东省广州市天河区珠江新城华夏路26号雅居乐中心33楼</p>
            <p><i class="fa fa-envelope-o"></i>&nbsp;<span> 邮编：</span>510623</p>
            <p><i class="fa fa-phone"></i> &nbsp;<span> 电话：</span>(020) 8883 9888</p>
            <p><i class="fa fa-fax"></i>&nbsp;<span> 传真：</span>(020) 8883 9566</p>
        </div>
    </div>
    <div id="amap"></div>
</div>
<?php get_footer(); ?>
