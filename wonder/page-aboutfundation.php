<?php get_header(); ?>

<div id="about-fundation">
    <div>
        <div class="vedio">
            <img src="http://wonder.saraqian.com/wp-content/uploads/2018/05/2018051410440960244927248.jpg" alt="" class="pic">
        </div>
        <div class="items">
            <ul class="container">
                <li>
                    <div class="title">基金会介绍</div>
                    <div class="coverbox">
                        <img src="http://wonder.saraqian.com/wp-content/uploads/2018/05/2018051411071584338044493.jpg" alt="">
						<p class="desc">
							2012年11月，广东省雅居乐公益基金会正式注册成立，以致力于公益事业，倡导企业公民责任，推动社会和谐进步为宗旨，成立五年以来一直积极承担社会责任，在弘扬中华文化、赈灾扶贫、环境保护、医疗、教育、文体等领域做出了较大贡献。
						</p>
                    </div>
                </li>
                <li>
                    <div class="title">创办与架构</div>
                    <div class="coverbox">
                        <img src="http://wonder.saraqian.com/wp-content/uploads/2018/05/2018051411071336524829127.jpg" alt="">
						<p class="desc">
							广东省雅居乐公益基金会是雅居乐集团控股有限公司董事局主席陈卓林先生创立的非公募基金会。基金会架构由理事会、监事会、秘书处构成，设理事7名，监事3名，秘书长1名。
						</p>
                    </div>
                </li>
                <li>
                    <div class="title">社会责任</div>
                    <div class="coverbox">
                        <img src="http://wonder.saraqian.com/wp-content/uploads/2018/05/2018051411071164548143308.jpg" alt="">
						<p class="desc">
							截至2017年12月31日，雅居乐及其大股东历年的慈善公益捐款额累计超过人民币15亿元，于2008、2011、2012年荣获中国慈善领域的最高政府奖项——「中华慈善奖」，同时还先后荣获「中华慈善突出贡献企业奖」、「最具社会责任感企业」、「企业社会责任大奖」、「广东扶贫济困红棉杯金杯」等奖项，更连续多年荣登《福布斯》中国慈善榜、《胡润慈善榜》等榜单。
						</p>
                    </div>
                </li>
            </ul>
        </div>

	<div class="timeline_session" id="my-timeline">
        <h2>基金会荣誉</h2>
        <div class="timeline">
			<div class="timeline-inner">
               <?php
                $posts = get_posts(array(
                    'post_type' => 'honors',
                    'order' => 'DESC',
                    'posts_per_page' => -1
                ));
                foreach ($posts as $post) { ?>               
					<div class="single-main wow fadeInLeft" data-wow-delay="0.2s">
						<div class="single-timeline">
								<div class="single-content">
									<div class="date">
										<p><?php echo get_the_title(); ?></p>
									</div>
									<p><?php echo wpautop($post->post_content); ?></p>
								</div>
						</div>
					</div>
				<?php }; ?>
            </div>
        </div>
    </div>

		
		
	</div>
</div>

<?php get_footer(); ?>