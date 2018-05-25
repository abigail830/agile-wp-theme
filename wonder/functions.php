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
    $ptime = strtotime($ptime);
    $etime = time() - $ptime;
    if($etime < 1) return '不久前';
    $interval = array (
        12 * 30 * 24 * 60 * 60  =>  date('Y-m-d', $ptime),
        30 * 24 * 60 * 60       =>  date('m-d', $ptime),
        7 * 24 * 60 * 60        =>  date('m-d', $ptime),
        24 * 60 * 60            =>  '天前',
        60 * 60                 =>  '小时前',
        60                      =>  '分钟前',
        1                       =>  '秒前'
    );
    foreach ($interval as $secs => $str) {
        $d = $etime / $secs;
        if ($d >= 1) {
            $r = round($d);
            if($str != '不久前' && $str != '天前' && $str != '小时前' && $str != '分钟前' && $str != '秒前'){
                return $str;
            }else{
                return $r . $str;
            }
        }
    };
}



  
