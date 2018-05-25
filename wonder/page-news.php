<?php get_header(); ?>
    <div id="page_news">
        <div class="news-session1">

            <div class="news-session1__frontnews clearfix  page-container">
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
                    'posts_per_page' => 1
                ));
                foreach ($posts as $post) { ?>
                    <div class="news-session1__frontnews_item">
                         <div class="item__image"
                                 style="background-image: url('<?php echo get_the_post_thumbnail_url($post); ?>')"></div>
                          <div class="item__info">
                              <a href="<?php echo get_permalink($post); ?>">
								  <h3><?php echo get_the_title(); ?></h3>
							  </a>							  
                              <p><?php echo get_post_meta($post->ID, '_news_desc', true); ?></p>
							  <span><a href="<?php echo get_permalink($post); ?>">了解详情 </a></span>
                            </div>
                    </div>
                <?php }; ?>
            </div>
        </div>
		<div class="news-session">
			<div class="news-session__title">
                <h2>基金会新闻</h2>
			</div>
			<div class="news-session__group clearfix  page-container">
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
                    'posts_per_page' => 3
                ));
                foreach ($posts as $post) { ?>
                    <div class="news-session__item">
                         <div class="item__image">
							 <img src="<?php echo get_the_post_thumbnail_url($post); ?>" alt="">
						</div>		
                          <div class="item__info">
                              <a href="<?php echo get_permalink($post); ?>">
								  <h3><?php echo get_the_title(); ?></h3>
							  </a>							  
                              <p><?php echo get_post_meta($post->ID, '_news_desc', true); ?></p>
							  <span><a href="<?php echo get_permalink($post); ?>">阅读更多 </a></span>
                            </div>
                    </div>
                <?php }; ?>
            </div>			
		</div>
		<div class="news-session">
			<div class="news-session__title">
                <h2>媒体新闻</h2>
		</div>
		<div class="news-session__group clearfix  page-container">
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
                    'posts_per_page' => 3
                ));
                foreach ($posts as $post) { ?>
                    <div class="news-session__item">
                         <div class="item__image">
							 <img src="<?php echo get_the_post_thumbnail_url($post); ?>" alt="">
						</div>							
                          <div class="item__info">
                              <a href="<?php echo get_permalink($post); ?>">
								  <h3><?php echo get_the_title(); ?></h3>
							  </a>							  
                              <p><?php echo get_post_meta($post->ID, '_news_desc', true); ?></p>
							  <span><a href="<?php echo get_permalink($post); ?>">阅读更多 </a></span>
                            </div>
                    </div>
                <?php }; ?>
            </div>			
		</div>		
    </div>
<?php get_footer(); ?>