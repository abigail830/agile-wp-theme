<?php get_header(); ?>
    <div id="archive">
        <div class="page-container">
            <h1 class="postsby">
                <span><?php echo single_cat_title('', false); ?></span>
            </h1>
            <ul>
                <?php if (have_posts()) :while (have_posts()) : the_post(); ?>
                    <li>
                        <?php if (!empty(get_the_post_thumbnail_url($post))) { ?>
                            <a class="block-image" href="<?php echo get_permalink($post->ID); ?>"
                               style="background-image: url(<?php echo get_the_post_thumbnail_url($post); ?>)"></a>
                        <?php }; ?>
                        <h2>
                            <a href="<?php echo get_permalink($post->ID); ?>"><?php echo $post->post_title; ?></a>
                        </h2>
                        <div class="desc">
                            <?php echo get_post_meta($post->ID,'_case_desc',true); ?>
                        </div>
                        <div class="info">
                            <span>发布时间:<?php echo wonder_get_timeago($post->post_date); ?></span>
                        </div>
                    </li>
                <?php endwhile; endif; ?>
            </ul>
        </div>
    </div>
<?php get_footer(); ?>