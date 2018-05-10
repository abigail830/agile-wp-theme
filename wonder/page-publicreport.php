<?php get_header(); ?>

<div id="publicreport">
        <div class="page-container">
            <div class="publicreport__title">
                <h2>信息公开</h2>
            </div>
			<div class="publicreport__group clearfix">
                <?php
                $posts = get_posts(array(
                    'post_type' => 'reports',
                    'meta_key' => '_reports_position',
                    'orderby' => 'meta_value_num',
                    'order' => 'DESC',
                    'posts_per_page' => -1				
                ));
                foreach ($posts as $post) { ?>
                    <div class="publicreport_item">                        
                            <div class="item__image"
                                 style="background-image: url('<?php echo get_the_post_thumbnail_url($post); ?>')">
                            <div class="item__info">
                                <h3><?php echo get_post_meta($post->ID, '_reports_title', true); ?></h3>
								<div>
									<p>
										<?php echo get_post_meta($post->ID, '_reports_desc', true); ?>
									</p>
								</div>
                                <div class="item__cta">
									<a class="item__btn" href="<?php echo get_post_meta($post->ID, '_reports_link', true); ?>">下载</a>
                                </div>
                            </div>
							</div>
                    </div>
                <?php }; ?>
            </div>
	</div>
</div>

<?php get_footer(); ?>