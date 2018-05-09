<?php get_header(); ?>
    <div id="single">
        <div class="page-container">
            <div class="title-container">
                <h1 class="title"><?php echo $post->post_title; ?></h1>
                <div class="info">
                    <span>发布时间:<?php echo wonder_get_timeago($post->post_date); ?></span>
                </div>
            </div>
            <div class="post-content">
                <?php echo wpautop($post->post_content); ?>
            </div>
        </div>
    </div>
<?php get_footer(); ?>