<?php get_header(); ?>

<div id="about-fundation">
    <div>
        <div class="vedio">
            <img src="<?php bloginfo('template_url'); ?>/resources/images/fundationbanner.jpg" alt="" class="pic">
        </div>
        <div class="description center white-background">
			<div class="title">
				基金会简介
			</div>
			<div class="introduce">
				<p>广东省雅居乐公益基金会（下简称“雅居乐公益基金会”）成立于2012年11月，是雅居乐集团控股有限公司董事局主席陈卓林先生发起创立的非公募基金会。</p>
<p>雅居乐公益基金会以致力于社会公益事业，倡导企业公民责任，推动社会和谐进步为宗旨，自成立以来一直积极承担社会责任，在弘扬中华文化、赈灾救急、扶贫济困、支持教育、医疗卫生、环境保护等方面做出了较大贡献。</p>
<p>截至2017年12月31日，雅居乐及其大股东历年的慈善公益捐款额累计超过人民币15亿元，于2008、2011、2012年荣获中国慈善领域的最高政府奖项——「中华慈善奖」，同时还先后荣获「中华慈善突出贡献企业奖」、「最具社会责任感企业」、「企业社会责任大奖」、「广东扶贫济困红棉杯金杯」等奖项，更连续多年荣登《福布斯》中国慈善榜、《胡润慈善榜》等榜单。
			</p>
			</div>
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
