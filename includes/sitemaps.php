<?PHP
/*///////////////////////////////////////////////////////////////////////////////////
PHP手机小说小偷3.2
小说主力源站点:cloud.it09.com
技术支持:www.it09.com
版权所有:古月芳弓虽
当前版本完结日期:20150410
//////////////////////////////////////////////////////////////////////////////////*/
//本函数旨更新根文件夹下的sitemaps.xml文件。
//作为工具文件夹而存在，不依赖其他文件。
$filenames1=array();
$site=$_SERVER['HTTP_HOST'].str_replace('admin/sitemaps/index.php','',$_SERVER['SCRIPT_NAME']);
$filenames1 = file('../cache/files.txt');
$filenames1 = str_replace(PHP_EOL, '', $filenames1);//将换行符替换掉啊。
$text='<?xml version="1.0" encoding="UTF-8"?>
<urlset
    xmlns="http://www.sitemaps.org/schemas/sitemap/0.9"
    xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"
    xsi:schemaLocation="http://www.sitemaps.org/schemas/sitemap/0.9
       http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd">	
';
	$text.='<url><loc>http://'.$site.'</loc><priority>1.00</priority><lastmod>'.date('Y-m-d').'</lastmod><changefreq>weekly</changefreq></url>
';
for($i=0;$i<count($filenames1);$i++)
	{
	$sites=$site.'?action=read&book='.rawurlencode($filenames1[$i]);
	$text.='<url><loc><![CDATA[http://'.$sites.']]></loc><priority>0.90</priority><lastmod>'.date('Y-m-d').'</lastmod><changefreq>weekly</changefreq></url>
';
	}
for($i=0;$i<count($filenames1)/100+1;$i++)
	{
	$sites=$site.'?page='.$i;
	$text.='<url><loc>http://'.$sites.'</loc><priority>0.90</priority><lastmod>'.date('Y-m-d').'</lastmod><changefreq>weekly</changefreq></url>
';
	}
$text.='</urlset>';
$f=fopen("../".$_SERVER['SERVER_NAME'].".sitemaps.xml", "wb"); 
$text="\xEF\xBB\xBF".$text; 
fputs($f, $text); 
fclose($f);
@header("Content-type: text/html; charset=utf8");
@session_start();  //打开缓冲区
@date_default_timezone_set ('Asia/Shanghai');
echo '<h2>创建sitemaps.xml成功，请<a href="../'.$_SERVER['SERVER_NAME'].'.sitemaps.xml">下载</a><br>或者复制链接&nbsp;<b>http://'.$_SERVER['HTTP_HOST'].str_replace('includes/sitemaps.php','',$_SERVER['SCRIPT_NAME']).$_SERVER['SERVER_NAME'].'.sitemaps.xml</b>&nbsp;提交到各搜索引擎。</a></h2>';
?>
<br>本程式由古月芳弓虽编辑20150404.