<?PHP
/*///////////////////////////////////////////////////////////////////////////////////
PHP手机小说小偷3.2
小说主力源站点:cloud.it09.com
技术支持:www.it09.com
版权所有:古月芳弓虽
当前版本完结日期:20150410
//////////////////////////////////////////////////////////////////////////////////*/
//以下为核心代码，切勿修改，否则会导致错误。
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//读网页函数。
function readpage($info=array())
{
//如果是首页文件，则读取本地缓存的首页信息
if(@$_GET['action']!='read')
	{
	include(QIANG.'/head.php');//显示页首，如果你想修改，可以直接编辑head.php文件。
	include(QIANG.'/foot.php');//显示页尾，如果你想修改，可以直接编辑foot.php文件。
	return page_header($info).read_cache().page_footer($info);
	}
else
	{
return read($info['Sourcesites']);
	}
}


/////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//读地址函数，传进来数组地址，随机选取一个可读地址，读成功返回字符串.
function read($temp=array())
{
$output='';$i=0;
while(empty($output)){
$temp1=$temp[intval(rand(0,count($temp)-1))];//随机获取地址。
$temp2='http://'.$temp1.'/?action='.@$_GET['action'].'&page='.@$_GET['page'].'&book='.@$_GET['book'].'&safe='.@$_GET['safe'];
$output=@curlread($temp2);
if(empty($output))$output=@file_get_contents($temp2);
if(!empty($output))return $output;
if(($i++)>3)return '服务器忙，请重试。';
}}

///////////////////////////////////////////////////////////////////////////////
//CURL方式读数据。
function curlread($address="")
{$ch = curl_init();$timeout = 12;curl_setopt ($ch, CURLOPT_URL,$address);
curl_setopt ($ch, CURLOPT_RETURNTRANSFER, 1);curl_setopt ($ch, CURLOPT_HEADER,0);
curl_setopt ($ch, CURLOPT_NOBODY,0);curl_setopt ($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/34.0.1847.131 Safari/537.36');
curl_setopt ($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
return curl_exec($ch);
}function encode($string = '', $skey = 'it09com') {
     $strArr = str_split(base64_encode($string));
     $strCount = count($strArr);
     foreach (str_split($skey) as $key => $value)
         $key < $strCount && $strArr[$key].=$value;
     return str_replace(array('=', '+', '/'), array('O0O0O', 'o000o', 'oo00o'), join('', $strArr));
}
function utf8($word,$is=false)
{if($is)
	{
	$t=@iconv("GBK","UTF-8",$word);
	if($t==false)
	return $word;
	else
	return $t;
	}
if(is_utf8($word))return $word;
$newword=@iconv("GBK","UTF-8",$word);
if(!$newword)return $word;
return $newword;
}
function is_utf8($word)
{
if (preg_match("/^([".chr(228)."-".chr(233)."]{1}[".chr(128)."-".chr(191)."]{1}[".chr(128)."-".chr(191)."]{1}){1}/",$word) == true || preg_match("/([".chr(228)."-".chr(233)."]{1}[".chr(128)."-".chr(191)."]{1}[".chr(128)."-".chr(191)."]{1}){1}$/",$word) == true || preg_match("/([".chr(228)."-".chr(233)."]{1}[".chr(128)."-".chr(191)."]{1}[".chr(128)."-".chr(191)."]{1}){2,}/",$word) == true)
	return true;
else
return false;
}
//////////////////////////////////////////////////////////////////////////////////////
//搜索框文本，已经调试完成，OK.20150331
function seach($path='s/')
{return '
 <form method="GET" action="'.$path.'">
	<div data-role="fieldcontain">
		<div style="float:left;width:70%;overflow:hidden">
			<input name="word" type="search" name="search" id="search" placeholder="">
		</div>
		<div style="float:left;width:30%;overflow:hidden">
			<input type="submit" data-inline="true" value="搜书名">
		</div>
		<input type="hidden" name="site" value="seachsite_hufangqiang">
	</div>
</form>
<div>
	<a href="http://2345.cn/kit09">下载手机常用软件！</a>
</div>
';
}
//////////////////////////////////////////////////////////////////
/** *程  序：iswap.php判断是否是通过手机访问
*版  本：Ver 1.0 beta
*修  改：奇迹方舟(imiku.com)
*最后更新：2010.11.4 22:56
*程序返回：@return bool 是否是移动设备
*该程序可以任意传播和修改，但是请保留以上版权信息!
*/
function isMobile() {
 // 如果有HTTP_X_WAP_PROFILE则一定是移动设备
 if (isset ($_SERVER['HTTP_X_WAP_PROFILE'])) {
  return true;
 }
 //如果via信息含有wap则一定是移动设备,部分服务商会屏蔽该信息
 if (isset ($_SERVER['HTTP_VIA'])) {
  //找不到为flase,否则为true
  return stristr($_SERVER['HTTP_VIA'], "wap") ? true : false;
 }
 //脑残法，判断手机发送的客户端标志,兼容性有待提高
 if (isset ($_SERVER['HTTP_USER_AGENT'])) {
  $clientkeywords = array (
   'nokia',
   'sony',
   'ericsson',
   'mot',
   'samsung',
   'htc',
   'sgh',
   'lg',
   'sharp',
   'sie-',
   'philips',
   'panasonic',
   'alcatel',
   'lenovo',
   'iphone',
   'ipod',
   'blackberry',
   'meizu',
   'android',
   'netfront',
   'symbian',
   'ucweb',
   'windowsce',
   'palm',
   'operamini',
   'operamobi',
   'openwave',
   'nexusone',
   'cldc',
   'midp',
   'wap',
   'mobile'
  );
  // 从HTTP_USER_AGENT中查找手机浏览器的关键字
  if (preg_match("/(" . implode('|', $clientkeywords) . ")/i", strtolower($_SERVER['HTTP_USER_AGENT']))) {
   return true;
  }
}
 //协议法，因为有可能不准确，放到最后判断
 if (isset ($_SERVER['HTTP_ACCEPT'])) {
  // 如果只支持wml并且不支持html那一定是移动设备
  // 如果支持wml和html但是wml在html之前则是移动设备
  if ((strpos($_SERVER['HTTP_ACCEPT'], 'vnd.wap.wml') !== false) && (strpos($_SERVER['HTTP_ACCEPT'], 'text/html') === false || (strpos($_SERVER['HTTP_ACCEPT'], 'vnd.wap.wml') < strpos($_SERVER['HTTP_ACCEPT'], 'text/html')))) {
   return true;
  }
 }
 return false;
}
/////////////////////////////////////////////////////////////////////////
//更新分类缓存文件。
function read_cache()
{$page=@$_GET['page'];
if($page<1)$page=1;$output='';
//从备用站点复制目录文件。
if(!is_file(QIANG.'/../cache/files.txt'))copy('http://www.it09.com/www/book/cache/files_new.txt',QIANG.'/../cache/files.txt');//读取列表缓存
$temp=file(QIANG.'/../cache/files.txt');//读取文件到数组中。
$temp = str_replace(PHP_EOL, '', $temp);//将换行符替换掉啊。
for($i=0;$i<100;$i++)
	{
	if(($temp1=(($page-1)*100+$i))<count($temp))
		$output=$output.'<p>'.($temp1+1).'.<a href="?action=read&book='.rawurlencode($temp[$temp1]).'" class="'.($i%2==0?'two':'one').'">'.str_ireplace('.txt','',utf8($temp[$temp1])).'</a></p>
';
	}
$output=$output.'<p>本站共收录小说'.count($temp).'本，当前是'.(($page-1)*100+1).'至'.(($page-1)*100+$i).'本</p><p>
分页:';
	for($i=1;$i<=count($temp)/100+1;$i++)
		{
		$output=$output.'<a href="?page='.$i.'">'.$i.'</a>&nbsp;&nbsp;
';
		}
	$output=$output.'</p><p>技术支持：<a href="http://www.it09.com">博益科技</a></p>';
//文件列表更新自动判断。
if(3600*24*1+filectime(QIANG.'/../cache/files.txt')<time())
	{
	@unlink(QIANG.'/../cache/files.bak.txt');
	copy('http://cloud.it09.com/cache/files.txt',QIANG.'/../cache/files.bak.txt');
	if(filesize(QIANG.'/../cache/files.bak.txt')>filesize(QIANG.'/../cache/files.txt'))
		{
		@unlink(QIANG.'/../cache/files.txt');
		copy(QIANG.'/../cache/files.bak.txt',QIANG.'/../cache/files.txt');
		}
	}
//这是输出段落
return '<body id="body">
<div data-role="page" id="pageone" data-theme="d">
  <div data-role="header" width=100%>
    <h1>'.TITLE.'</h1>
	<p>'.seach().'</p>
  </div>
  <div data-role="content">
    <p>'.$output.'</p>
    <a href="#" data-role="button">转到首页</a>
  </div>
';}
?>