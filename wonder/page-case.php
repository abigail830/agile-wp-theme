<?php get_header(); ?>
<div id="page_case">
<?php 
$_terms = get_terms('case_archive', array(
    'orderby' => 'slug'
) );

foreach ($_terms as $term) :

	$term_slug = $term->slug;
	$_posts= new WP_Query( array(
                'post_type'         => 'case',
                'posts_per_page'    => 1, //important for a PHP memory limit warning
		         'order' => 'DESC',
				 'post_status' => 'publish',
    			 'meta_key' => '_case_position',
                 'orderby' => 'meta_value_num',
                  'order' => 'DESC',
                'tax_query' => array(
                    array(
                        'taxonomy' => 'case_archive',
                        'field'    => 'slug',
                        'terms'    => $term_slug,
                    ),
                ),				
            ));

	if( $_posts->have_posts() && $term_slug != 'project-snapshot' ) : ?>
		<div class="news-session" id="<?php echo $term_slug; ?>">
		<div class="news-session__title">
			<h2><?php echo $term->name ?></h2>
		</div>
		<div class="new-session__description">
			<p>
				<?php echo term_description($term->term_id, 'case_archive') ?>
			</p>
						<div class="read_more">
				<a href="<?php echo site_url();?>/medianews/?slug='<?php echo $term_slug ?>'">浏览更多公益项目内容</a>
			</div>
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
				    <span><a href="<?php echo get_permalink($post); ?>">阅读详情 </a></span>
                </div>
            </div>		
    		<?php endwhile;?>
		</div>
						
			</div>	
   <?php endif; 
	endforeach; ?>
</div>
<?php get_footer(); ?>
