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

//后台登陆数学验证码
function myplugin_add_login_fields() {
    //获取两个随机数 
    $num1=rand(0,9);
    $num2=rand(0,20);
    //最终网页中的具体内容
    echo "<p><label for='math' class='small'>验证码</label><br /> $num1 + $num2 = ?<input type='text' name='sum' class='input' value='' size='25' tabindex='4'>"
    ."<input type='hidden' name='num1' value='$num1'>"
    ."<input type='hidden' name='num2' value='$num2'></p>";
}
add_action('login_form','myplugin_add_login_fields');

function login_val() {
    $sum=$_POST['sum'];//用户提交的计算结果
    switch($sum){
	//得到正确的计算结果则直接跳出
	case $_POST['num1']+$_POST['num2']:break;
	//未填写结果时的错误讯息
	case null:wp_die('错误: 请输入验证码.');break;
	//计算错误时的错误讯息
	default:wp_die('错误: 验证码错误,请重试.');
    }
}
add_action('login_form_login','login_val');



  
