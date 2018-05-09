<?php
/**
 * 注册文章类型
 */
function wonder_case_create_post_type()
{
    register_post_type('case', array(
        'labels' => array(
            'name' => "公益项目"
        ),
        'public' => true,
        'menu_icon' => 'dashicons-media-text',
        'menu_position' => 17,
        'has_archive' => false,
        'hierarchical' => false,
        'supports' => array('title', 'editor', 'author', 'thumbnail')
    ));

    add_theme_support('post-thumbnails', array('case'));

    register_taxonomy('case_archive', 'case', array(
        'label' => '公益项目分类',
        'hierarchical' => true,
        'query_var' => 'case_archive',
        'public' => true,
        'show_ui' => true,
        'has_archive' => true,
    ));
}

add_action('init', 'wonder_case_create_post_type');


/**
 * 添加模块
 */
function wonder_case_register_menu_meta_box()
{
    add_meta_box('case_box', '附加信息', 'wonder_case_box', 'case', 'normal', 'high');
}

add_action('add_meta_boxes', 'wonder_case_register_menu_meta_box');

function wonder_case_box()
{
    ?>
    <style>
        table.case {
            width: 100%;
        }

        input[name="case_desc"] {
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
    <table class="case">
        <tr>
            <td>
                <label for="case_desc">描述</label>
                <input type="text" name="case_desc" size="30" id="case_desc"
                       value="<?php echo get_post_meta(get_the_ID(), '_case_desc', true); ?>" spellcheck="true"
                       autocomplete="off"
                       placeholder="给你的内容添加适当长度的描述 50 - 100 字符">
            </td>
        </tr>
    </table>
<?php }

/**
 * 保存数据
 */
function wonder_case_save_postdata($post_id)
{
    update_post_meta($post_id, '_case_desc', $_POST['case_desc']);
}

add_action('save_post_case', 'wonder_case_save_postdata');