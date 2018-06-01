<?php get_header(); ?>
<div id="home-news">
    <div class="home-news-wrapper page-container">
        <div class="center green">
            <h2>基金会新闻汇总</h2>
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
						'terms'    => 'fundation-news',
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
<?php get_footer(); ?>