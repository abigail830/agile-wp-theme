<!--服务领域-->
<div id="home-service-field">
    <?php
    $terms = get_terms(array(
        'taxonomy' => 'service_archive',
        'hide_empty' => false
    ));
    ?>
    <div class="service-field__box">
        <div class="service-big">
            <a class="service-big__box" href="http://www.wonderlawyer.com/casepage/">
                <div class="big__img"
                     style="background-image:url(<?php bloginfo('template_directory'); ?>/resources/images/icon-bg.jpg);">
                </div>
                <div class="big__title">
                    <h2>蕴德刑辩</h2>
                </div>
            </a>
        </div>
        <ul class="service-small">
            <?php foreach ($terms as $term) { ?>
                <li class="service-small__cell">
                    <a href="<?php echo get_term_link($term->term_id, 'service_archive'); ?>"
                       class="service-small__box">
                        <div class="small__img"
                             style="background-image:url(<?php bloginfo('template_directory'); ?>/resources/images/icon-bg.jpg);">
                        </div>
                        <div class="small__title">
                            <h2>
                                <?php echo $term->name; ?>
                            </h2>
                        </div>
                    </a>
                </li>
            <?php } ?>
        </ul>
    </div>
</div>
<!--刑辩团队-->
<div id="home-debate-team">
    <div class="debate-team_box">
        <div class="debate-team__title">
            <h2>刑辩团队介绍</h2>
        </div>
        <ul class="debate-team__group">
            <?php
            $num = 0;
            $posts = get_posts(array(
                'post_type' => 'team',
                'order' => 'DESC',
                'posts_per_page' => -1
            ));
            foreach ($posts as $post) {
                if ($num % 2 == 0) {
                    ?>
                    <li class="page-container imgleft">
                        <div class="debate-personal__info">
                            <div class="debate-personal__left">
                                <a href="<?php echo get_permalink($post); ?>"><h3><?php echo $post->post_title; ?></h3>
                                </a>
                                <span><?php echo get_post_meta($post->ID, '_team_prefix', true); ?></span>
                                <p>
                                    <?php echo get_post_meta($post->ID, '_team_desc', true); ?>
                                </p>

                            </div>
                        </div>
                        <div class="debate-personal__more">
                            <a href="<?php echo get_permalink($post); ?>">更多详情</a>
                        </div>
                        <div class="debate-personal__img"
                             style="background-image:url(<?php echo get_the_post_thumbnail_url($post); ?> );">

                        </div>
                    </li>
                <?php } else { ?>
                    <li class="page-container">
                        <div class="debate-personal__img"
                             style="background-image:url(<?php echo get_the_post_thumbnail_url($post); ?> );">

                        </div>
                        <div class="debate-personal__info">
                            <div class="debate-personal__left">
                                <a href="<?php echo get_permalink($post); ?>"><h3><?php echo $post->post_title; ?></h3>
                                </a>
                                <span><?php echo get_post_meta($post->ID, '_team_prefix', true); ?></span>
                                <p>
                                    <?php echo get_post_meta($post->ID, '_team_desc', true); ?>
                                </p>

                            </div>
                        </div>
                        <div class="debate-personal__more">
                            <a href="<?php echo get_permalink($post); ?>">更多详情</a>
                        </div>

                    </li>
                <?php }
                $num++;
            }; ?>
        </ul>
    </div>
</div>

<!--案例-->
<div id="home-case">
    <div class="home-case-wrapper page-container">
        <div class="home-case__title">
            <h2>成功案例</h2>
        </div>
        <div class="home-case__nav">
            <ul>
                <?php wp_nav_menu(array('echo' => true, 'container' => false, 'items_wrap' => '%3$s', 'theme_location' => 'Home_Case', 'depth' => 1, 'walker' => new HomeCase_MenusWalker())); ?>
            </ul>
        </div>
        <div class="home-case__content">
            <div class="swiper-container">
                <div class="swiper-wrapper">
                    <?php wp_nav_menu(array('echo' => true, 'container' => false, 'items_wrap' => '%3$s', 'theme_location' => 'Home_Case', 'depth' => 1, 'walker' => new HomeCase_MenusWalker_Swiper())); ?>
                </div>
            </div>
        </div>
    </div>
</div>
<!--荣誉-->
<div id="home-honor">
    <div class="home-honor-wrapper page-container">
        <div class="swiper-container">
            <div class="swiper-wrapper">
                <?php
                $posts = get_posts(array(
                    'post_type' => 'honor',
                    'order' => 'DESC',
                    'posts_per_page' => -1
                ));
                foreach ($posts as $post) { ?>
                    <div class="swiper-slide">
                        <div class="honor__item">
                            <div class="honor__image">
                                <img src="<?php echo get_the_post_thumbnail_url($post); ?>">
                            </div>
                            <div class="honor__content">
                                <p><?php echo get_post_meta($post->ID, '_honor_desc', true); ?></p>
                            </div>
                        </div>
                    </div>
                <?php }; ?>
            </div>
        </div>
    </div>
</div>
