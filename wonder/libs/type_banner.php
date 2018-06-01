<?php
/**
 * 注册文章类型
 */
function wonder_banner_create_post_type()
{
    register_post_type('banner', array(
        'labels' => array(
            'name' => "首页轮播",
            'add_new' => "添加轮播",
            'add_new_item' => '添加新轮播',
            'edit_item' => '编辑轮播',
            'new_item' => '添加新轮播',
            'view_item' => '查看',
            'search_items' => '搜索轮播',
            'not_found' => '还没有发布过轮播,点击添加轮播,添加一个新轮播',
            'not_found_in_trash' => '没有被删除的轮播内容',
            'featured_image' => '轮播图设置(建议：尺寸1200*600px，分辨率144，图片大小200k内)',
            'set_featured_image' => '设置轮播图片',
            'remove_featured_image' => '移除轮播图片',
            'use_featured_image' => '选择一张图片作为轮播图'
        ),
        'public' => true,
        'menu_icon' => 'dashicons-align-center',
        'menu_position' => 10,
        'supports' => array('title', 'thumbnail'),
		'capability_type' => array('banner','banners'),
		'map_meta_cap' => true,
    ));

    add_theme_support('post-thumbnails', array('banner'));
}
add_action('init', 'wonder_banner_create_post_type');


/**
 * 添加模块
 */
function wonder_banner_register_menu_meta_box()
{
    global $wp_meta_boxes;
    $wp_meta_boxes['banner']['normal']['high']['postimagediv'] = $wp_meta_boxes['banner']['side']['low']['postimagediv'];
    unset($wp_meta_boxes['banner']['side']['low']['postimagediv']);
    add_meta_box('banner_link', '轮播设置', 'wonder_banner_box', 'banner', 'normal', 'high');
}

add_action('add_meta_boxes', 'wonder_banner_register_menu_meta_box');

/**
 * 模块内容
 */
function wonder_banner_box()
{
    ?>
    <style>
        table.banner {
            width: 100%;
        }

        #edit-slug-box {
            display: none;
        }

        input[name="banner_position"], input[name="banner_link"], input[name="banner_title"] {
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
    <table class="banner">
        <tr>
            <td>
                <label for="banner_position">轮播显示位置</label>
                <input type="number" name="banner_position" size="30" id="banner_position"
                       value="<?php echo get_post_meta(get_the_ID(), '_banner_position', true); ?>" spellcheck="true"
                       autocomplete="off"
                       placeholder="数字越大,位置越靠前,建议不要设置连续数字以免中间插入不便,可设置为例如100,200,300...">
            </td>
        </tr>
        <tr>
            <td>
                <label for="banner_title">按钮文字</label>
                <input type="text" name="banner_title" size="30" id="banner_title"
                       value="<?php echo get_post_meta(get_the_ID(), '_banner_title', true); ?>" spellcheck="true"
                       autocomplete="off"
                       placeholder="轮播图上显示的按钮文字">
            </td>
        </tr>
        <tr>
            <td>
                <label for="banner_link">跳转链接</label>
                <input type="url" name="banner_link" size="30" id="banner_link"
                       value="<?php echo get_post_meta(get_the_ID(), '_banner_link', true); ?>" spellcheck="true"
                       autocomplete="off"
                       placeholder="点击轮播图跳转的链接,留空表示不可点击">
            </td>
        </tr>
    </table>
<?php }


/**
 * 保存数据
 */
function wonder_banner_save_postdata($post_id)
{
    update_post_meta($post_id, '_banner_position', $_POST['banner_position']);
    update_post_meta($post_id, '_banner_title', $_POST['banner_title']);
    update_post_meta($post_id, '_banner_link', $_POST['banner_link']);
}

add_action('save_post_banner', 'wonder_banner_save_postdata');
