<?php 
/*///////////////////////////////////////////////////////////////////////////////////
PHP手机小说小偷3.2
小说主力源站点:cloud.it09.com
技术支持:www.it09.com
版权所有:古月芳弓虽
当前版本完结日期:20150410
//////////////////////////////////////////////////////////////////////////////////*/
//存放缓存的根目录,最好是放到/tmp目录,尤其是虚拟主机用户,因为/tmp目录不占自己的主页空间啊:) 
define('CACHE_TYPE', false);cache(); //定义缓存方式，为真，则放在本空间的cache文件夹里，为false，则放到系统临时文件夹里。
//缓存文件的生命期，单位秒，86400秒是一天 
define('CACHE_LIFE', 864000*330); //每30天做一次更新就够了。
//缓存文件的扩展名，千万别用 .php .asp .jsp .pl 等等 
define('CACHE_SUFFIX','.html'); //缓存文件扩展名
$file_name=md5(@$_GET['book'].@$_GET['page'].@$_GET['action'].'/').CACHE_SUFFIX;
//$file_name  = md5($_SERVER['REQUEST_URI']).CACHE_SUFFIX; 
//缓存目录，根据md5的前两位把缓存文件分散开。避免文件过多。如果有必要，可以用第三四位为名，再加一层目录。 
//256个目录每个目录1000个文件的话，就是25万个页面。两层目录的话就是65536*1000=六千五百万。 
//不要让单个目录多于1000，以免影响性能。 
$cache_dir0  = CACHE_ROOT.'/'.substr($file_name,0,2);
$cache_dir  = CACHE_ROOT.'/'.substr($file_name,0,2).'/'.substr($file_name,2,2); 
//缓存文件 
$cache_file = $cache_dir.'/'.$file_name; 
//GET方式请求才缓存，POST之后一般都希望看到最新的结果
if($_SERVER['REQUEST_METHOD']=='GET') 
{
    //如果缓存文件存在，并且没有过期，就把它读出来。 
    if(file_exists($cache_file))
    {
        if(@readfile($cache_file))
			{
			echo ' ';//尝试用快速读取的方式，如果不行，则用后续安全读取的方式。
			}
		else
			{
			$fp = fopen($cache_file,'rb'); 
			fpassthru($fp); 
			fclose($fp); 
			}
		if(3600*24*7+filectime($cache_file)<time())
			@unlink($cache_file);
		exit;
    }
    elseif(!file_exists($cache_dir)) 
    { 
        if(!file_exists(CACHE_ROOT)) 
        {
            mkdir(CACHE_ROOT,0777); 
            chmod(CACHE_ROOT,0777); 
        }
		if(!file_exists($cache_dir0)) 
        {
		mkdir($cache_dir0,0777); 
        chmod($cache_dir0,0777); 
		}
		if(!file_exists($cache_dir)) 
        {
        mkdir($cache_dir,0777); 
        chmod($cache_dir,0777); 
		}
    } 
    //回调函数，当程序结束时自动调用此函数 
    function auto_cache($contents) 
    { 
        global $cache_file;
		if(file_exists($cache_file))unlink($cache_file); 
        $fp = fopen($cache_file,'wb'); 
        fwrite($fp,$contents); 
        fclose($fp); 
        chmod($cache_file,0777); 
        //生成新缓存的同时，自动删除所有的老缓存。以节约空间。 
        //clean_old_cache(); 
        return $contents; 
    }
    function clean_old_cache() 
    { 
        chdir(CACHE_ROOT); 
        foreach (glob("*/*") as $file)
        {
		foreach(glob($file."/*.*") as $file1){if(time()-filemtime($file1)>CACHE_LIFE)@unlink($file1);}
        } 
    } 
    //回调函数 auto_cache 
    ob_start('auto_cache'); 
} 
else 
{ 
    //不是GET的请求就删除缓存文件。 
    if(file_exists($cache_file))@unlink($cache_file); 
}
//清除所有缓存文件，保留目录结构。

function cache()
{
if(CACHE_TYPE)
define('CACHE_ROOT', dirname(__FILE__).'/../cache/'); //这是放到本空间的文件夹里
else
{
if (!function_exists('sys_get_temp_dir')) {
   function sys_get_temp_dir() {
     if (!empty($_ENV['TMP'])) { return realpath($_ENV['TMP']); }
     if (!empty($_ENV['TMPDIR'])) { return realpath( $_ENV['TMPDIR']); }
     if (!empty($_ENV['TEMP'])) { return realpath( $_ENV['TEMP']); }
     $tempfile=tempnam(uniqid(rand(),TRUE),'');
     if (file_exists($tempfile)) {
     @unlink($tempfile);
     return realpath(dirname($tempfile));
     }}}
define('CACHE_ROOT', sys_get_temp_dir().'/'); //这是放到tmp目录里
}}
?>