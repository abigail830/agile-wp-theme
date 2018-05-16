<?php get_header(); ?>
    
<div id="page_case">

<?php
$_terms = get_terms( array('case_archive') );

foreach ($_terms as $term) :

    $term_slug = $term->slug;
    $_posts = new WP_Query( array(
                'post_type'         => 'case',
                'posts_per_page'    => 3, //important for a PHP memory limit warning
                'tax_query' => array(
                    array(
                        'taxonomy' => 'case_archive',
                        'field'    => 'slug',
                        'terms'    => $term_slug,
                    ),
                ),
            ));

    if( $_posts->have_posts() && $term_slug != 'project-snapshot' ) :
		echo '<div class="news-session">';
		echo '<div class="news-session__title">';
        echo '<h2>'. $term->name .'</h2>';
		echo '</div>';
		echo '<div class="news-session__group clearfix">';
        while ( $_posts->have_posts() ) : $_posts->the_post();
        ?>
            <div class="news-session__item">
				<div class="item__image">
					<img src="<?php echo get_the_post_thumbnail_url($post); ?>" alt="">
				</div>
				<div class="item__info">
					<a href="<?php echo get_permalink($post); ?>">
								  <h3><?php the_title(); ?></h3>
					</a>							  
                    <p><?php echo get_post_meta($post->ID, '_case_desc', true); ?></p>
				    <span><a href="<?php echo get_permalink($post); ?>">阅读更多 </a></span>
                </div>
            </div>
        <?php
        endwhile;
		echo '</div>';
    endif;
endforeach;
?>
</div>
<?php get_footer(); ?>