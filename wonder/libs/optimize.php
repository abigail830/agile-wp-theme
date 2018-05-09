<?php
// 禁用日志修订功能
	remove_action ('pre_post_update','wp_save_post_revision');
// 自动保存设置为10个小时
	add_action('wp_print_scripts','disable_autosave');
	function disable_autosave(){  
	    wp_deregister_script('autosave'); 
	}
// 禁用WordPress文章修订版本
	add_filter( 'wp_revisions_to_keep', 'specs_wp_revisions_to_keep', 10, 2 );
	function specs_wp_revisions_to_keep( $num, $post ) {
	    return 0;
	}
// 删除一些没有必要的代码
	remove_action( 'wp_head', 'rest_output_link_wp_head', 10 );
	remove_action( 'wp_head', 'wp_oembed_add_discovery_links', 10 );
	remove_action( 'wp_head', 'wp_generator');                  //删除 head 中的 WP 版本号
	remove_action( 'wp_head', 'rsd_link' );                     //删除 head 中的 RSD LINK
	remove_action( 'wp_head', 'wlwmanifest_link' );             //删除 head 中的 Windows Live Writer 的适配器？ 
	remove_action( 'wp_head', 'feed_links_extra', 3 );          //删除 head 中的 Feed 相关的link
	remove_action( 'wp_head', 'index_rel_link' );               //删除 head 中首页，上级，开始，相连的日志链接
	remove_action( 'wp_head', 'parent_post_rel_link', 10, 0 ); 
	remove_action( 'wp_head', 'start_post_rel_link', 10, 0 ); 
	remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0 );
	remove_action( 'wp_head', 'wp_shortlink_wp_head', 10, 0 );  //删除 head 中的 shortlink
	remove_action( 'template_redirect','wp_shortlink_header', 11, 0 );//删除短链接通知，不知道这个是干啥的。

	remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
	remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
	remove_action( 'wp_print_styles', 'print_emoji_styles' );
	remove_action( 'admin_print_styles', 'print_emoji_styles' );
	remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
	remove_filter( 'comment_text_rss', 'wp_staticize_emoji' );
	remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );
	add_filter( 'tiny_mce_plugins', 'disable_emojis_tinymce' );
	add_filter( 'emoji_svg_url', '__return_false' );
// 屏蔽文章 Embed 功能
	remove_action('rest_api_init', 'wp_oembed_register_route');
	remove_filter('rest_pre_serve_request', '_oembed_rest_pre_serve_request', 10, 4);

	remove_filter('oembed_dataparse', 'wp_filter_oembed_result', 10 );
	remove_filter('oembed_response_data',   'get_oembed_response_data_rich',  10, 4);

	remove_action('wp_head', 'wp_oembed_add_discovery_links');
	remove_action('wp_head', 'wp_oembed_add_host_js');
	add_filter('rest_enabled', '_return_false');
	add_filter('rest_jsonp_enabled', '_return_false');
// 屏蔽登录工具条
	add_filter('show_admin_bar', '__return_false');
// 自动更正上传的媒体库文件名
	add_filter('sanitize_file_name', 'make_filename_hash', 10);
	function make_filename_hash($filename) {
	    $info = pathinfo($filename);
	    $ext = empty($info['extension']) ? ” : '.' . $info['extension'];
		list($usec, $sec) = explode(" ", microtime());  
		$msec = round($usec * 1000);
		$time = date('YmdHis',time());
		$request_id = $time.$msec.rand(1000,9999).rand(1000,9999);
		$id_line = strlen($request_id);
		if($id_line != 25){
			if($id_line < 25){
				$n = 25 - $id_line;
				for ($i = 0; $i < $n; $i++) {
					$request_id .= '0';
				}
			}
		}
	    return $request_id.$ext;
	}
// 后台媒体库尺寸编辑
	add_action('admin_init','n4bm_removedefaultimageSize');
	function n4bm_removedefaultimageSize(){
		if(get_option('thumbnail_size_w') != '0'){
			update_option('thumbnail_size_w','0');
			update_option('thumbnail_size_h','0');
			update_option('thumbnail_crop','0');
			update_option('medium_size_w','0');
			update_option('medium_size_h','0');
			update_option('large_size_w','0');
			update_option('large_size_h','0');
		}
	}
// 一个奇怪的图片生成问题,该函数可以完美解决
	add_filter('intermediate_image_sizes','qiein_Clear_ImageSize',10,1);
	function qiein_Clear_ImageSize($image_sizes){
		return array();
	}