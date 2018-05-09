<?php
/**
 * 注册文章类型
 */
function wonder_honor_create_post_type()
{
    register_post_type('honor', array(
        'labels' => array(
            'name' => "荣誉管理",
            'add_new' => "添加荣誉信息",
            'add_new_item' => '添加新荣誉信息',
            'edit_item' => '编辑荣誉信息',
            'new_item' => '添加新的荣誉',
            'view_item' => '查看',
            'search_items' => '搜索客户',
            'not_found' => '还没有设置过荣誉信息',
            'not_found_in_trash' => '还没有被删除的荣誉',
            'featured_image' => '荣誉图片',
            'set_featured_image' => '设置荣誉图片',
            'remove_featured_image' => '移除荣誉图片',
            'use_featured_image' => '选择一张图片作为荣誉展示图'
        ),
        'public' => true,
        'menu_icon' => 'dashicons-awards',
        'menu_position' => 10,
        'supports' => array('title', 'thumbnail')
    ));


    add_theme_support('post-thumbnails', array('honor'));
}

add_action('init', 'wonder_honor_create_post_type');


/**
 * 添加模块
 */
function wonder_honor_register_menu_meta_box()
{
    global $wp_meta_boxes;
    add_meta_box('honor_desc', '荣誉描述', 'wonder_honor_box', 'honor', 'normal', 'high');

    $wp_meta_boxes['honor']['normal']['high']['postimagediv'] = $wp_meta_boxes['honor']['side']['low']['postimagediv'];
    unset($wp_meta_boxes['honor']['side']['low']['postimagediv']);
}

add_action('add_meta_boxes', 'wonder_honor_register_menu_meta_box');


function wonder_honor_box()
{
    ?>
    <style>
        table.honor {
            width: 100%;
        }

        input[name="honor_desc"] {
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
    <table class="honor">
        <tr>
            <td>
                <label for="honor_desc">荣誉描述</label>
                <input type="text" name="honor_desc" size="30" id="honor_desc"
                       value="<?php echo get_post_meta(get_the_ID(), '_honor_desc', true); ?>" spellcheck="true"
                       autocomplete="off"
                       placeholder="添加对此荣誉的描述信息">
            </td>
        </tr>
    </table>
<?php }



/**
 * 保存数据
 */
function wonder_honor_save_postdata($post_id)
{
    update_post_meta($post_id, '_honor_desc', $_POST['honor_desc']);
}

add_action('save_post_honor', 'wonder_honor_save_postdata');