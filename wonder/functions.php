<?php

//路径及URL定义
define('WONDER_PLUGIN_URL', plugins_url('', __FILE__));
define('WONDER_PLUGIN_DIR', plugin_dir_path(__FILE__));

/**
 * 加载 lib 目录下所有 php 文件
 */
wonder_load_libs();
function wonder_load_libs()
{
    $handler = opendir(WONDER_PLUGIN_DIR . 'libs');
    $files = [];
    while (($filename = readdir($handler)) !== false) {
        if ($filename != "." && $filename != "..") {
            $files[] = $filename;
        }
    }
    closedir($handler);
    foreach ($files as $file) {
        $ext = substr($file, strrpos($file, '.'));
        if ($ext === '.php') {
            require_once WONDER_PLUGIN_DIR . 'libs/' . $file;
        }
    }
}

function the_wonder_version(){
    echo '?' . rand(1,99999);
}

/* This is to enable contributor could upload media*/
if ( current_user_can('contributor') && !current_user_can('upload_files') )
add_action('admin_init', 'allow_contributor_uploads');

function allow_contributor_uploads() {
$contributor = get_role('contributor');
$contributor->add_cap('upload_files');
}

/* This is to remove comment from dashboard admin menu */ 
function remove_options() {
    remove_menu_page( 'edit-comments.php' );
}
add_action('admin_menu', 'remove_options');

/**
 * 格式化时间
 * @param $ptime
 * @return mixed|string
 */
function wonder_get_timeago( $ptime ) {
	return $ptime;
}
