<?php
function S_Shortpage(){?>
<style type="text/css">
.dw-box{width: 70%;margin:15px 0;}
.dw-box-menu{padding-left:40px}
.dw-box-menu ul{ width:520px} 
.dw-box-menu li{list-style: none;padding-left: 20px;margin-bottom: 20px;background: url("/wp-content/plugins/S-Shortcodes/images/admin/page-16x16.png") no-repeat}
</style>
<div id="icon-themes" class="icon32"></div>
<div id="wpbody">
<h2>S-shortcodes短代码提示</h2>
    <div class="dw-box-menu">
      <h3><a href="http://devework.com/s-shortcodes.html">插件主页</a> &nbsp;
      <a href="http://devework.com/s-shortcodes.html">帮助与支持</a> &nbsp;
      <a href="https://github.com/Jeff2Ma/S-Shortcodes">下载最新版</a> 
      </h3>
  <div class="update-nag">优秀主题推广：<a href="http://devework.com/theme/devework/" target="_blank">Devework 主题</a> &nbsp;&nbsp;<a href="http://devework.com/theme/devemobile/" target="_blank"> DeveMobile 主题</a> &nbsp;&nbsp;<a href="http://devework.com/theme/easemobile/" target="_blank">EaseMobile 主题</a></div>
    	<span style="color: #ff0000;"><h3>更多精彩内容欢迎关注：<a href="http://devework.com">DeveWork.com</a></h3></span>
	<p>写文章时如果需要可以加入下列短代码（在“可视化”与“HTML”两种模式均可直接加入，“HTML”模式下有按钮使用。）</p>
	
      	<ul><div class="dw-box-alert dw-box"><i class="icon-alert"></i> 这里写内容，红色警示</div></ul>
      	<li>短代码：<code>[box style="alert"]这里写内容[/box] </code></li>

        <ul><div class="dw-box-warning dw-box"><i class="icon-warning"></i> 这里写内容，黄色提醒</div></ul>
        <li>短代码：<code>[box style="warning"]这里写内容[/box] </code></li>

        <ul><div class="dw-box-download dw-box"><i class="icon-download"></i> 这里写内容，蓝色下载</div></ul>
        <li>短代码：<code>[box style="download"]这里写内容[/box] </code></li>

        <ul><div class="dw-box-info dw-box"><i class="icon-info"></i> 这里写内容，灰色公告</div></ul>
        <li>短代码：<code>[box style="info"]这里写内容[/box] </code></li>

        <ul><div class="dw-box-tip dw-box"><i class="icon-tip"></i> 这里写内容，绿色提示</div></ul>
        <li>短代码：<code>[box style="tip"]这里写内容[/box] </code></li>

        <ul><div class="dw-box-blue dw-box"> 这里写内容</div></ul>
        <li>短代码：<code>[box style="blue"]这里写内容[/box] </code></li>

        <ul><div class="dw-box-grey dw-box"> 这里写内容</div></ul>
        <li>短代码：<code>[box style="grey"]这里写内容[/box] </code></li>

        <ul><div class="dw-box-red dw-box"> 这里写内容</div></ul>
        <li>短代码：<code>[box style="red"]这里写内容[/box] </code></li>

        <ul><div class="dw-box-tan dw-box"> 这里写内容</div></ul>
        <li>短代码：<code>[box style="tan"]这里写内容[/box] </code></li>

        <ul><div class="dw-box-yellow dw-box"> 这里写内容</div></ul>
        <li>短代码：<code>[box style="yellow"]这里写内容[/box] </code></li>
  </div>
</div>
<?php }
function S_shortcode_page(){
  add_theme_page("S-shortcodes短代码","S-shortcodes短代码",'edit_themes','S_shortcode_page','S_Shortpage'); 
}
add_action('admin_menu','S_shortcode_page');
?>