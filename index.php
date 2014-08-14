<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>BLOG首页</title>
    <link rel="stylesheet" type="text/css" href="./public/uikit/css/uikit.gradient.min.css">
    <script type="text/javascript" src="http://libs.baidu.com/jquery/2.1.1/jquery.min.js"></script>
    <script type="text/javascript" src="./public/uikit/js/uikit.min.js"></script>
    <link href="public/stylesheet/960_12_col.css" rel="stylesheet" type="text/css" />
    <link href="public/stylesheet/reset.css" rel="stylesheet" type="text/css" />
    <link href="public/stylesheet/style.css" rel="stylesheet" type="text/css" />
    <link href="public/stylesheet/text.css" rel="stylesheet" type="text/css" />
</head>


<body>
<div id="toolbar">                          <!--最上方导航栏-->
<div class="container_12">
<div  class="grid_12">
<ul id="toolbar-menu">
<li><a href="#">注册</a></li>
<li><a href="#">登陆</a></li>
</ul>
</div>
</div>
</div>                                      <!--最上方导航栏-->
<div class="container_12">                    <!--主体部分-->
<div id="header" class="grid_12">        <!--头部 LOGO 时间 关键字搜索-->
  <img id="logo" src="public/image/4543072.gif" width="100" height="34" />
<div id="time">
  <script language=JavaScript>
today=new Date(); 
document.write( 
"你好，今天是", 
today.getFullYear(),"年", 
today.getMonth()+1,"月", 
today.getDate(),"日", 
" 欢迎你的到来</font>" ); 
</script>
 </div>
<div id="search">
    <form.....>
        <input id="searchbox"......./>
    </form>
</div>

</div> 



<div id="mainmenu" class="grid_12">              <!--菜单栏  内容待定-->
<ul class="mainmenu-ul" >
    <li class="top"><a href="#" class="top_link"><span>首页</span></a></li>
	<li class="top"><a href="#" class="top_link"><span>热门微博</span></a></li>
	<li class="top"><a href="#" class="top_link"><span>随便看看</span></a></li>
	<li class="top"><a href="#" class="top_link"><span>论坛专区</span></a></li>
    <li class="top"><a href="#" class="top_link"><span>待定</span></a></li>
	<li class="top"><a href="#" class="top_link"><span>待定</span></a></li>
	<li class="top"><a href="#" class="top_link"><span>待定</span></a></li>
</ul>
</div>                                           
<div id="mainbody" class="grid_12">          <!--主体 上方以图片形式显示最新最热博文 下方以分类 列表形式展现博文-->

<div  id="textshow" >           <!--分类显示博文-->

<ul class="uk-list uk-list-striped">

<?php
    include('./class/list.class.php');
?>

</ul>
</div>
</div>


<div class="clear"></div>
<div>
    <div class="container_12">
        <div id="footer" class="grid_12">
            <font color="#999999" >创客联盟版权所有</font>
        </div>
    </div>
</div>

</div>



<script type="text/javascript">
    var x1 = null, y1 = null;
    var x2 = null, y2 = null;

    $('.list').mousedown(function(e) {
        x1 = e.pageX;
        y1 = e.pageY;
    });
    $('.list').mouseup(function(e) {
        x2 = e.pageX;
        y2 = e.pageY;

        if(x1==x2&&y1==y2) {
            var id = $(this).attr('id').split("_");
            id = id[1];
            window.location.assign('./read.php?id='+id);
        }
    });
    $(document).mouseup(function(e) {
        x1 = null;
        y1 = null;
        x2 = null;
        y2 = null;
    });
</script>
</body>
</html>
