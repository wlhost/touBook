<?php
/*///////////////////////////////////////////////////////////////////////////////////
PHP手机小说小偷3.2
小说主力源站点:cloud.it09.com
技术支持:www.it09.com
版权所有:古月芳弓虽
当前版本完结日期:20150410
//////////////////////////////////////////////////////////////////////////////////*/
/////////////////////////////////////////////////////////////////////////
//以下代码请勿修改，否则会导致错误。
define('QIANG',dirname(__FILE__));
include(QIANG.'/config.php');
define('TITLE',$info['title']);
include(QIANG.'/includes.php');
$info['ver']=isMobile();
if($info['cache_type'])include(QIANG.'/auto_cache.php');//如果定义缓存有效，则直接读取缓存数据
$info['all']=readpage($info);
$info['site_address']='http://'.$_SERVER['HTTP_HOST'].$_SERVER['SCRIPT_NAME'];
$info['all']=str_ireplace('seachsite_hufangqiang',$info['site_address'],$info['all']);
//////////////////////////////////////////////////////////////////////////////////////////////
//这时可以修改，主要是对获取的网页数据进行替换处理。
$info['all']=str_ireplace('小说广告区1',$info['gg1'],$info['all']);
$info['all']=str_ireplace('小说广告区2',$info['gg2'],$info['all']);
//以下代码可以修改与替换相关网页数据。具体请加print_r($info);查看。支持手动修改。
//示例:$info['all']=str_ireplace('查找值','替换成',$info['all']);
//$info['all']=str_ireplace('手机小说',$info['title'],$info['all']);
//print_r($info);









/////////////////////////////////////////////////////////////////////////
//以下是定义模板及输出段。该程式自动识别，如果是手机浏览器，自动调用手机模板，在templates/mobile文件夹内。
//如果是PC浏览器，自动调用PC模板，在templates/pc文件夹内。模板文件名是相同的。
include(QIANG.'/smarty.php');
if($info['ver'])
	{
	$smarty->template_dir=QIANG.'/../templates/mobile/'; 
	$smarty->compile_dir=QIANG.'/../templates_c/mobile/';
	}
else
	{
	$smarty->template_dir=QIANG.'/../templates/pc/'; 
	$smarty->compile_dir=QIANG.'/../templates_c/pc/';
	}
//将所有数据输出到smarty.具体操作方法请见smarty手册。
$keys=array_keys($info);
foreach($keys as $keyname)
	$smarty->assign($keyname,$info[$keyname]);
/////////////////////////////////////////////////////////////////
//这里可以定义不同的模板文件。
if(@$_GET['action']=='read')
	{
	$smarty->display('index.html');
	}
else
	{
	$smarty->display('index.html');
	}
//echo $info['all'];//最终输出代码。
//echo '<p><a href=http://down.chinaz.com/soft/33222.htm>我也要建个这样的站点，下载源码和帮助。</a></p>';
?>