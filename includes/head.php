<?php
/*///////////////////////////////////////////////////////////////////////////////////
PHP手机小说小偷3.2
小说主力源站点:cloud.it09.com
技术支持:www.it09.com
版权所有:古月芳弓虽
当前版本完结日期:20150410
//////////////////////////////////////////////////////////////////////////////////*/
@header("Content-type: text/html; charset=utf8");
@session_start();  //打开缓冲区
@date_default_timezone_set ('Asia/Shanghai');
function page_header($info=array())
{
return '<?xml version="1.0" encoding="utf-8"?>
<!DOCTYPE html PUBLIC "-//WAPFORUM//DTD XHTML Mobile 1.0//EN" "http://www.wapforum.org/DTD/xhtml-mobile10.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width,initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
<title>'.$info['title'].'</title>
<meta name="title" content="'.$info['title'].'">
<meta name="keywords" content="'.$info['title'].'">
<meta name="description" content="'.$info['title'].'">
<meta name="author" content="http://www.it09.com/" />
<meta http-equiv="content-language" content="zh-CN" />
<meta http-equiv="expires" content="'.gmdate('l d F Y H:i:s',strtotime('+1 day')).' GMT" />
<meta http-equiv="pragma" content="cache" />
<meta name="copyright" content="© http://www.it09.com/" />
<meta name="robots" content="all" />
<link rel="dns-prefetch" href="http://cloud.it09.com/">
<link rel="dns-prefetch" href="http://mirror.it09.com/">
<link rel="dns-prefetch" href="http://www.it09.com/">
<link rel="stylesheet" href="http://apps.bdimg.com/libs/jquerymobile/1.4.2/jquery.mobile.min.css">
<script type="text/javascript" src="http://apps.bdimg.com/libs/jquery/2.1.1/jquery.min.js"></script>
<script type="text/javascript" src="http://apps.bdimg.com/libs/jquerymobile/1.4.2/jquery.mobile.min.js"></script>
</head>';
}
?>