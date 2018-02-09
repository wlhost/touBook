<?php
if(extension_loaded("zlib") && strstr($_SERVER["HTTP_ACCEPT_ENCODING"],"gzip")){ob_end_clean();ob_start('ob_gzhandler');}
define('QIANG',dirname(__FILE__).'/../');
require(QIANG.'includes/config.php');
require(QIANG.'includes/includes.php');
require(QIANG.'includes/head.php');
//开始数据处理。
$site=@$_GET['site'];$output='';$i=0;
if($site=='seachsite_hufangqiang' or $site=='')$site="cloud.it09.com";
$array = file(QIANG.'/cache/files.txt');
$array = str_replace(PHP_EOL, '', $array);//将换行符替换掉啊。
foreach($array as $name)
	{
	if(mb_stripos(utf8($name),@$_GET['word']) or stripos($name,@iconv("UTF-8","GBK//IGNORE",@$_GET['word'])))
		{
		$output=$output.'<p><a href="../?action=read&book='.rawurlencode($name).'" class="'.($i%2==0?'two':'one').'">'.(++$i).'.'.str_replace(@$_GET['word'],'<i><u>'.@$_GET['word'].'</u></i>',str_ireplace('.txt','',@iconv("GBK","UTF-8",$name))).'</a></p>
';
		}
	}

//开始数据输出。
echo '
<body id="body">
<div data-role="page" id="pageone" data-theme="d">
  <div data-role="header" width=100%>
    <p><h1>搜“'.@$_GET['word'].'”</h1></p>
	<p>'.seach('../s/').'</p>
  </div>
  <div data-role="content">
  '.$output.'</div>
 <div><p><a href="../">返回首页</a></p></div>';

if($i==0)echo '<div><p>
对不起，没有找到类似的小说。<a href="../">返回首页</a></p></div></div>';
require(QIANG.'includes/foot.php');
?>