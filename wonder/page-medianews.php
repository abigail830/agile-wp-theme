<?php get_header(); ?>
    <div id="news_breakdown">
        <div class="news-detail__box page-container">
            <div class="news-detail__title">
                <h2>媒体报道</h2>
            </div>
            <div class="home-news__group clearfix">
                <?php
                $posts = get_posts(array(
                    'post_type' => 'news',
                    'order' => 'DESC',
					'tax_query' => array(
					array(
						'taxonomy' => 'news_archive',
						'field'    => 'slug',
						'terms'    => 'media-report',
					),
				 ),
                    'posts_per_page' => -1
                ));
                foreach ($posts as $post) { ?>
                    <div class="home-news_item">
                        <a href="<?php echo get_permalink($post); ?>">
                            <div class="item__image"
                                 style="background-image: url('<?php echo get_the_post_thumbnail_url($post); ?>')"></div>
                            <div class="item__info">
                                <h3><?php echo get_the_title(); ?></h3>
                                <p>
                                    <?php echo get_post_meta($post->ID, '_news_desc', true); ?>
                                </p>
                            </div>
                        </a>
                    </div>
                <?php }; ?>
            </div>
        </div>
    </div>
<?php get_footer(); ?>