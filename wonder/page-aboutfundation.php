<?php get_header(); ?>

<div id="about-fundation">
    <div>
        <div class="vedio">
            <img src="<?php bloginfo('template_url'); ?>/resources/images/fundationbanner.jpg" alt="" class="pic">
        </div>
        <div class="items center white-background">
            <ul class="container">
                <li>
                    <div class="title">基金会介绍</div>
                    <div class="coverbox white-background">
						<img src="<?php bloginfo('template_url'); ?>/resources/images/index_sec1_p1.jpg" alt="" class="pic">
						<p class="desc">
							2012年11月，广东省雅居乐公益基金会正式注册成立，以致力于公益事业，倡导企业公民责任，推动社会和谐进步为宗旨，成立五年以来一直积极承担社会责任，在弘扬中华文化、赈灾扶贫、环境保护、医疗、教育、文体等领域做出了较大贡献。
						</p>
                    </div>
                </li>
                <li>
                    <div class="title">创办与架构</div>
                    <div class="coverbox white-background">
                        <img src="<?php bloginfo('template_url'); ?>/resources/images/index_sec1_p2.jpg" alt="" class="pic">
						<p class="desc">
							广东省雅居乐公益基金会是雅居乐集团控股有限公司董事局主席陈卓林先生创立的非公募基金会。基金会架构由理事会、监事会、秘书处构成，设理事7名，监事3名，秘书长1名。
						</p>
                    </div>
                </li>
                <li>
                    <div class="title">社会责任</div>
                    <div class="coverbox white-background">
                        <img src="<?php bloginfo('template_url'); ?>/resources/images/index_sec1_p3.jpg" alt="" class="pic">
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
					<div class="single-main">
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
<!--关于我们-->
<div id="home-about" class="green-background" >
	<div class="map-container">
		<div class="map"></div>
	</div>
    <div class="about__content page-container">
        <h3 class="white">联系我们</h3>
        <div class="info_content">
            <p><i class="fa fa-map-marker"></i>&nbsp;<span> 地址：</span>中国广东省广州市天河区珠江新城华夏路26号雅居乐中心33楼</p>
            <p><i class="fa fa-envelope-o"></i>&nbsp;<span> 邮编：</span>510623</p>
            <p><i class="fa fa-phone"></i> &nbsp;<span> 电话：</span>(020) 8883 9888</p>
            <p><i class="fa fa-fax"></i>&nbsp;<span> 传真：</span>(020) 8883 9566</p>
        </div>
    </div>
    <div id="amap"></div>
</div>

<?php get_footer(); ?>