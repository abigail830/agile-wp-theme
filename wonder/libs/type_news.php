<?php
/**
 * 注册文章类型
 */
function wonder_news_create_post_type()
{
    register_post_type('news', array(
        'labels' => array(
            'name' => "新闻中心"
        ),
        'public' => true,
        'menu_icon' => 'dashicons-welcome-widgets-menus',
        'menu_position' => 10,
        'supports' => array('title', 'editor', 'author', 'thumbnail'),
        'capability_type' => array('news_paper','news_papers'),
        'map_meta_cap' => true,
    ));

    add_theme_support('post-thumbnails', array('news'));

    register_taxonomy('news_archive', 'news', array(
        'label' => '新闻分类',
        'hierarchical' => true,
        'query_var' => 'news_archive',
        'public' => true,
        'show_ui' => true,
        'has_archive' => true,
		'capabilities' => array (
                'manage_terms' => 'manage_categories', //by default only admin
                'edit_terms' => 'manage_news',
                'delete_terms' => 'manage_news',
                'assign_terms' => 'edit_news' 
                ),
		'map_meta_cap' => true,
    ));
}

add_action('init', 'wonder_news_create_post_type');
 

/**
 * 添加模块
 */
function wonder_news_register_menu_meta_box()
{
    add_meta_box('news_desc', '新闻提要', 'wonder_news_box', 'news', 'normal', 'high');
}

add_action('add_meta_boxes', 'wonder_news_register_menu_meta_box');

function wonder_news_box()
{
    ?>
    <style>
        table.news {
            width: 100%;
        }

        input[name="news_desc"] {
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
    <table class="news">
        <tr>
            <td>
                <label for="news_desc">新闻提要</label>
                <input type="text" name="news_desc" size="30" id="news_desc"
                       value="<?php echo get_post_meta(get_the_ID(), '_news_desc', true); ?>" spellcheck="true"
                       autocomplete="off"
                       placeholder="给你的内容添加适当长度的描述 50 - 100 字符">
            </td>
        </tr>
    </table>
<?php }

/**
 * 保存数据
 */
function wonder_news_save_postdata($post_id)
{
    update_post_meta($post_id, '_news_desc', $_POST['news_desc']);
}

add_action('save_post_news', 'wonder_news_save_postdata');