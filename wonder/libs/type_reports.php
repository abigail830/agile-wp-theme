<?php
/**
 * 注册文章类型
 */
function wonder_reports_create_post_type()
{
    register_post_type('reports', array(
        'labels' => array(
            'name' => "信息公开",
            'add_new' => "添加报告",
            'add_new_item' => '添加新报告',
            'edit_item' => '编辑报告',
            'new_item' => '添加新报告',
            'view_item' => '查看',
            'search_items' => '搜索报告',
            'not_found' => '还没有发布过报告,点击添加报告,添加一个新报告',
            'not_found_in_trash' => '没有被删除的报告内容',
            'featured_image' => '报告封面设置',
            'set_featured_image' => '设置报告封面',
            'remove_featured_image' => '移除报告封面',
            'use_featured_image' => '选择一张图片作为报告封面'
        ),
        'public' => true,
        'menu_icon' => 'dashicons-align-center',
        'menu_position' => 10,
        'supports' => array('title', 'thumbnail'),
		'capability_type' => array('public_report','public_reports'),
        'map_meta_cap' => true,
    ));

    add_theme_support('post-thumbnails', array('reports'));
	
    register_taxonomy('reports_archive', 'reports', array(
        'label' => '公开报告分类',
        'hierarchical' => true,
        'query_var' => 'reports_archive',
        'public' => true,
        'show_ui' => true,
        'has_archive' => true,
		'capabilities' => array (
                'manage_terms' => 'manage_categories', //by default only admin
                'edit_terms' => 'manage_reports',
                'delete_terms' => 'manage_reports',
                'assign_terms' => 'edit_reports' 
                ),
    ));
	
}
add_action('init', 'wonder_reports_create_post_type');


/**
 * 添加模块
 */
function wonder_reports_register_menu_meta_box()
{
    global $wp_meta_boxes;
    $wp_meta_boxes['reports']['normal']['high']['postimagediv'] = $wp_meta_boxes['reports']['side']['low']['postimagediv'];
    unset($wp_meta_boxes['reports']['side']['low']['postimagediv']);
    add_meta_box('reports_link', '报告设置', 'wonder_reports_box', 'reports', 'normal', 'high');
}

add_action('add_meta_boxes', 'wonder_reports_register_menu_meta_box');

/**
 * 模块内容
 */
function wonder_reports_box()
{
    ?>
    <style>
        table.reports {
            width: 100%;
        }

        #edit-slug-box {
            display: none;
        }

        input[name="reports_position"], input[name="reports_desc"], input[name="reports_link"], input[name="reports_title"]  {
            padding: 3px 8px;
            margin-top: 8px;
            font-size: 14px;
            line-height: 30px;
            height: 30px;
            width: 100%;
            outline: 0;
            background-color: #fff;
        }
    </style>
    <table class="reports">
        <tr>
            <td>
                <label for="reports_position">报告显示位置</label>
                <input type="number" name="reports_position" size="30" id="reports_position"
                       value="<?php echo get_post_meta(get_the_ID(), '_reports_position', true); ?>" spellcheck="true"
                       autocomplete="off"
                       placeholder="数字越大,位置越靠前,建议不要设置连续数字以免中间插入不便,可设置为例如100,200,300...">
            </td>
        </tr>
        <tr>
            <td>
                <label for="reports_title">报告名称</label>
                <input type="text" name="reports_title" size="30" id="reports_title"
                       value="<?php echo get_post_meta(get_the_ID(), '_reports_title', true); ?>" spellcheck="true"
                       autocomplete="off"
                       placeholder="报告封面图上显示的报告名称">
            </td>
        </tr>
		<tr>
            <td>
                <label for="reports_desc">报告简述</label>
                <input type="text" name="reports_desc" size="30" id="reports_desc"
                       value="<?php echo get_post_meta(get_the_ID(), '_reports_desc', true); ?>" spellcheck="true"
                       autocomplete="off"
                       placeholder="报告简述">
            </td>
        </tr>
        <tr>
            <td>
                <label for="reports_link">下载链接</label>
                <input type="url" name="reports_link" size="30" id="reports_link"
                       value="<?php echo get_post_meta(get_the_ID(), '_reports_link', true); ?>" spellcheck="false"
                       autocomplete="off"
                       placeholder="报告文件下载的链接,留空表示不可点击">
            </td>
        </tr>
    </table>
<?php }


/**
 * 保存数据
 */
function wonder_reports_save_postdata($post_id)
{
    update_post_meta($post_id, '_reports_position', $_POST['reports_position']);
    update_post_meta($post_id, '_reports_title', $_POST['reports_title']);
    update_post_meta($post_id, '_reports_link', $_POST['reports_link']);
	update_post_meta($post_id, '_reports_desc', $_POST['reports_desc']);
}

add_action('save_post_reports', 'wonder_reports_save_postdata');
