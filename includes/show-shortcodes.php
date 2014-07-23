<?php
function S_Shortpage(){?>
<style type="text/css">
.dw-box{-webkit-border-radius:5px;-moz-border-radius:5px;border-radius:5px;border:1px solid;clear:both;margin:15px 0;-webkit-box-shadow:0 0 3px rgba(0,0,0,0.1),0 1px 0 #FFFFFF inset,0 -1px 0 #FFFFFF inset;-moz-box-shadow:0 0 3px rgba(0,0,0,0.1),0 1px 0 #FFFFFF inset,0 -1px 0 #FFFFFF inset;box-shadow:0 0 3px rgba(0,0,0,0.1),0 1px 0 #FFFFFF inset,0 -1px 0 #FFFFFF inset;font:14px "Microsoft YaHei",Arial,Sans-serif}
.dw-box-blue,.dw-box-green,.dw-box-grey,.dw-box-red,.dw-box-tan,.dw-box-yellow{padding:15px}
.dw-box-blue{background-color:#dbe7f8;border-color:#b7d2f2}
.dw-box-green{background-color:#f2f9e5;border-color:#ddedbc}
.dw-box-grey{background-color:#f2f2f2;border-color:#e5e5e5}
.dw-box-red{background-color:#ffdfdf;border-color:#feabab}
.dw-box-tan{background-color:#fef8e1;border-color:#feebab}
.dw-box-yellow{background-color:#ffffd5;border-color:#feebab}
.dw-box-alert,.dw-box-warning,.dw-box-download,.dw-box-info,.dw-box-tip,.dw-box-add{padding:15px 20px 15px 55px}
.dw-box-alert{background:#ffdfdf url("/wp-content/plugins/S-Shortcodes/images/box-alert.png") no-repeat 16px;border-color:#feabab;color:#c31b00}
.dw-box-warning{background:#ffea97 url("/wp-content/plugins/S-Shortcodes/images/box-warning.png") no-repeat 16px;border-color:#E1B400;color:#B69203}
.dw-box-download{background:#BEDEFF url("/wp-content/plugins/S-Shortcodes/images/box-download.png") no-repeat 16px;border-color:#8EB7E1;color:#5075AC}
.dw-box-info{background:#e7e7e7 url("/wp-content/plugins/S-Shortcodes/images/box-info.png") no-repeat 16px;border-color:#aaa;color:#333}
.dw-box-tip{background:#EFF4D4 url("/wp-content/plugins/S-Shortcodes/images/box-tip.png") no-repeat 16px;border-color:#779B39;color:#779B39}
.dw-box-add{background:#EFF4D4 url("../images/box-add.png") no-repeat 16px;border-color:#779B39;color:#779B39}
.dw-box-menu{padding-left:40px}.dw-box-menu ul{ width:520px} 
.dw-box-menu li{list-style: none;padding-left: 20px;margin-bottom: 20px;background: url("/wp-content/plugins/S-Shortcodes/images/admin/page-16x16.png") no-repeat}

</style>
<div id="icon-themes" class="icon32"></div>
<div id="wpbody">
<h2>S-shortcodes短代码提示</h2>
    <div class="dw-box-menu">
      <h3><a href="http://devework.com/s-shortcodes.html">插件主页</a> <a href="http://devework.com/s-shortcodes.html">帮助与支持</a> </h3>
    	<span style="color: #ff0000;"><h3>更多精彩内容欢迎关注：<a href="http://devework.com">DeveWork.com</a></h3></span>
	<p>写文章时如果需要可以加入下列短代码（在“可视化”与“HTML”两种模式均可直接加入，“HTML”模式下有按钮使用。）</p>
	
      	<ul><div class="dw-box-alert dw-box"> 这里写内容，红色警示</div></ul>
      	<li>短代码：<code>[box style="alert"]这里写内容[/box] </code></li>

        <ul><div class="dw-box-warning dw-box"> 这里写内容，黄色提醒</div></ul>
        <li>短代码：<code>[box style="warning"]这里写内容[/box] </code></li>

        <ul><div class="dw-box-download dw-box"> 这里写内容，蓝色下载</div></ul>
        <li>短代码：<code>[box style="download"]这里写内容[/box] </code></li>

        <ul><div class="dw-box-info dw-box"> 这里写内容，灰色公告</div></ul>
        <li>短代码：<code>[box style="info"]这里写内容[/box] </code></li>

        <ul><div class="dw-box-tip dw-box"> 这里写内容，绿色提示</div></ul>
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