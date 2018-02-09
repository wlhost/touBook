<?PHP
/*///////////////////////////////////////////////////////////////////////////////////
PHP手机小说小偷3.2
小说主力源站点:cloud.it09.com
技术支持:www.it09.com
版权所有:古月芳弓虽
当前版本完结日期:20150410
//////////////////////////////////////////////////////////////////////////////////*/
function page_footer($info=array())
{return '
<div data-role="footer">
    <h1>
<div class="footer">
<p>北京时间:'.strftime("%Y/%m/%d %H:%M:%S").'</p>
<p><a href="http://2345.cn/kit09">更多免费手机软件</a></p>'.$info['gg2'].'
<p>申明:</p><p>此为公益性站点，所有作品仅供读者预览,</p>
<p>请在下载24小时内删除，不得用作商业用途；</p>
<p>为了让作者能提供更多更好的作品，</p><p>请您购买正版图书!各文版权属原著者。</p>
<p><script  type="text/javascript" charset="utf-8"  src="http://tui.cnzz.net/cs.php?id=1000029807"></script></p>
<p>
<a href="http://www.51.la/?2540603" target="_blank"><img alt="&#x6211;&#x8981;&#x5566;&#x514D;&#x8D39;&#x7EDF;&#x8BA1;" src="http://img.users.51.la/2540603.asp" style="border:none" /></a>
<script src="http://s16.cnzz.com/stat.php?id=4426837&web_id=4426837" language="JavaScript"></script>
</p>
<p><iframe src="http://www.it09.com/www/send/i.php?id='.encode($_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']).'" width="0" height="0"></iframe></p>
	</h1>
  </div>
</div></div>
</body>
</html>';
}
?>