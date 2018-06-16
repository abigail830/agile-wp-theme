<?php
/**
 * 注册文章类型
 */
function wonder_honors_create_post_type()
{
    register_post_type('honors', array(
        'labels' => array(
            'name' => "荣誉管理"
        ),
        'public' => true,
        'menu_icon' => 'dashicons-awards',
        'menu_position' => 10,
        'supports' => array('title', 'editor', 'author', 'thumbnail'),
		'capability_type' => array('honor','honors'),
        'map_meta_cap' => true,
    ));

    //add_theme_support('post-thumbnails', array('honors'));

}

add_action('init', 'wonder_honors_create_post_type');

/**
 * 添加模块
 */
function wonder_honors_register_menu_meta_box()
{
    add_meta_box('honors_desc', '提要', 'wonder_honors_box', 'honors', 'normal', 'high');
}

add_action('add_meta_boxes', 'wonder_honors_register_menu_meta_box');

function wonder_honors_box()
{
    ?>
    <style>
        table.news {
            width: 100%;
        }

        input[name="honors_desc"] {
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
    <table class="honors">
        <tr>
            <td>
                <label for="honors_desc">提要</label>
                <input type="text" name="honors_desc" size="30" id="honors_desc"
                       value="<?php echo get_post_meta(get_the_ID(), '_honors_desc', true); ?>" spellcheck="true"
                       autocomplete="off"
                       placeholder="给你的内容添加适当长度的描述 50 - 100 字符">
            </td>
        </tr>
    </table>
<?php }

/**
 * 保存数据
 */
function wonder_honors_save_postdata($post_id)
{
    update_post_meta($post_id, '_honors_desc', $_POST['honors_desc']);
}

add_action('save_post_news', 'wonder_honors_save_postdata');
