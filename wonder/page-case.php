<?php get_header(); ?>
<div id="page_case">
<?php 
$_terms = get_terms( array('case_archive') );

foreach ($_terms as $term) :

	$term_slug = $term->slug;
	$paged = isset( $_GET[$term_slug] ) ? (int) $_GET[$term_slug] : 1;
	$_posts= new WP_Query( array(
                'post_type'         => 'case',
                'posts_per_page'    => 3, //important for a PHP memory limit warning
                'tax_query' => array(
                    array(
                        'taxonomy' => 'case_archive',
                        'field'    => 'slug',
                        'terms'    => $term_slug,
                    ),
                ),
				'paged' => $paged,
            ));

	if( $_posts->have_posts() && $term_slug != 'project-snapshot' ) : ?>
		<div class="news-session">
		<div class="news-session__title">
			<h2><?php echo $term->name ?></h2>
		</div>
		<div class="news-session__group clearfix">
			<?php while($_posts->have_posts())  : $_posts->the_post(); ?> 
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
    		<?php endwhile;?>
		</div>
	
	<div class="news-session__paging">
	<?php
    $total_pages = $_posts->max_num_pages;

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
<?php	endforeach;
?>
</div>
<?php get_footer(); ?>