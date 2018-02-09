<?php
require 'Smarty.class.php';
$smarty = new Smarty;
$smarty->auto_literal =  true;
$smarty->autoload_filters =null;
$smarty->caching=true;//缓存有效开关
$smarty->setCaching(true); #开启缓存
$smarty->cache_dir='cache/';//缓存文件存放地址
$smarty->cache_lifetime=3600*24*30;//缓存时间30天
$smarty->setcache_lifetime(3600*24*30);   #设置当前的缓存时间30天
$smarty->cache_modified_check=false;
$smarty->compile_check=true;//缓存检查
$smarty->template_dir='templates';
$smarty->compile_dir='templates_c';
$smarty->config_booleanize=true;
$smarty->config_dir='conf/';
$smarty->config_overwrite=true;
$smarty->config_read_hidden=false;
$smarty->debugging=true;//是否添加调试信息,如果要知道SMARTY输出了多少变量值，请设为true，即可弹出窗口，调用与查看所有数据,正式运用时不要设为true.
$smarty->error_reporting=1;
$smarty->force_compile=true;//调试时请设为真，方可时时再生缓存。
$smarty->left_delimiter='{';
$smarty->right_delimiter='}';
$smarty->php_handling='PHP_PASSTHRU';
//$smarty->assign("Name", "Fred Irving Johnathan Bradley Peppergill", true);

?>