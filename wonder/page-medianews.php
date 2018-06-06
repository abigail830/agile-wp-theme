<?php get_header(); ?>
<div id="home-news">
    <div class="home-news-wrapper page-container">
        <div class="center green">
            <h2>公益项目汇总</h2>
        </div>
    </div>
    <div class="home-news__ul page-container">
            <?php
		    $term_slug = isset( $_GET['slug'] ) ? $_GET['slug'] : 'project-snapshot';
			$paged = isset( $_GET[$term->slug] ) ? (int) $_GET[$term->slug] : 1;
            $posts = new WP_Query(array(
                'post_type' => 'case',
                'order' => 'DESC',
				'tax_query' => array(
					array(
						'taxonomy' => 'case_archive',
						'field'    => 'slug',
						'terms'    => $term_slug,
					),
				 ),
                'posts_per_page' => 8,
				'paged' => $paged,
            ));
		if( $posts->have_posts()): ?>
		    <ul>
            <?php while($posts->have_posts())  : $posts->the_post(); ?>
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
                        <p><?php echo get_post_meta($post->ID, '_case_desc', true); ?></p>
                    </div>
                </div>
            </li>
        <?php endwhile;?>
		</ul>
			<div class="news-session__paging">
	<?php
    $total_pages = $posts->max_num_pages;

    if ($total_pages > 1){

        echo paginate_links(array(
            'format'  => "?$term_slug=%#%",
            'current' => $paged,
            'total' => $total_pages,
            'prev_text'    => __('« prev'),
            'next_text'    => __('next »'),
        ));
    }
   endif; ?>
<?php wp_reset_postdata();?>
		</div>

    </div>
</div>
<?php get_footer(); ?>