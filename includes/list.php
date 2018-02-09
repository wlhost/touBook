<?PHP
/*///////////////////////////////////////////////////////////////////////////////////
PHP手机小说小偷3.2
小说主力源站点:cloud.it09.com
技术支持:www.it09.com
版权所有:古月芳弓虽
当前版本完结日期:20150410
//////////////////////////////////////////////////////////////////////////////////*/
//这是显示头部信息
@header("Content-type: text/html; charset=utf8");
@session_start();  //打开缓冲区
@date_default_timezone_set ('Asia/Shanghai');
include('config.php');
$info['site_address']='http://'.$_SERVER['HTTP_HOST'].$_SERVER['SCRIPT_NAME'];
echo '<?xml version="1.0" encoding="utf-8"?>
<!DOCTYPE html PUBLIC "-//WAPFORUM//DTD XHTML Mobile 1.0//EN" "http://www.wapforum.org/DTD/xhtml-mobile10.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>'.$info['title'].'</title>
<meta name="title" content="'.$info['title'].'">  
<meta name="keywords" content="'.$info['title'].'">           
<meta name="description" content="'.$info['title'].'">
<meta HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width,initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
<link rel="dns-prefetch" href="http://cloud.it09.com/">
<link rel="dns-prefetch" href="http://mirror.it09.com/">
<script type="text/javascript" src="http://apps.bdimg.com/libs/jquery/2.1.1/jquery.min.js"></script>
<link rel="stylesheet" href="http://apps.bdimg.com/libs/jquerymobile/1.4.2/jquery.mobile.min.css">
<link rel="stylesheet" href="http://apps.bdimg.com/libs/jquerymobile/1.4.2/jquery.mobile.min.js">

</head>
<body id="FullPage">
<div class="hon6">
<a href="http://2345.cn/kit09">下载手机常用软件！</a></div>
<form action="s/index.php" method="get" class="search" id="hon6">
<input name="word" type="text" size="18" maxlength="64" class="search_inp" id="hon6" value="穿越">
<input type="submit" name="searchTitle" value="搜小说" class="btn" id="bt_searchNovel">
<input type="hidden" name="site" value="'.$info['site_address'].'">
</form>
<div class="hon6">'.$info['gg1'].'</div>';

//这是显示正文信息。
if(!is_file('s/files.txt'))
	{if(!copy('http://cloud.it09.com/s/files.txt','s/files.txt'))die('ERROR');}
$temp=file('s/files.txt');$page=@$_GET['page'];if($page<1)$page=1;

for($i=0;$i<100;$i++)
{
if(($temp1=(($page-1)*100+$i))<count($temp))
echo ($temp1+1).'.<a href="'.$info['site_address'].'?action=read&book='.rawurlencode($temp[$temp1]).'" class="'.($i%2==0?'two':'one').'">'.str_ireplace('.txt','',utf8($temp[$temp1])).'</a><br />
';
}
////这是显示尾部信息的文件。
echo '<div class="footer">
<p>本站共收录小说'.count($temp).'本，当前是'.(($page-1)*100+1).'至'.(($page-1)*100+$i).'本</p>
分页:';
	for($i=1;$i<=count($temp)/100+1;$i++)
		{
		echo '<a href="'.$info['site_address'].'?page='.$i.'">'.$i.'</a>&nbsp;
';
		}
	echo '<p>技术支持：<a href="http://www.it09.com">博益科技</a></p>';
exit;


// Returns true if $string is valid UTF-8 and false otherwise.
function is_utf8($word){
if (preg_match("/^([".chr(228)."-".chr(233)."]{1}[".chr(128)."-".chr(191)."]{1}[".chr(128)."-".chr(191)."]{1}){1}/",$word) == true || preg_match("/([".chr(228)."-".chr(233)."]{1}[".chr(128)."-".chr(191)."]{1}[".chr(128)."-".chr(191)."]{1}){1}$/",$word) == true || preg_match("/([".chr(228)."-".chr(233)."]{1}[".chr(128)."-".chr(191)."]{1}[".chr(128)."-".chr(191)."]{1}){2,}/",$word) == true)
{return true;}
else
{return false;}} // function is_utf8
function utf8($word,$is=false)//这个函数确保返回的字符串为UTF8编码。
{if($is){
$t=@iconv("GBK","UTF-8",$word);if($t==false)
return $word;
else
return $t;}
if(is_utf8($word))return $word;
$newword=@iconv("GBK","UTF-8",$word);
if(!$newword)return $word;
return $newword;
//return @iconv("UTF-8","GBK",$word);
}

?>