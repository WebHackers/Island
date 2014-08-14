<!DOCTYPE html>
<html>
<head>
<meta http-equiv="content-type" content="text/html;charset=utf-8"/>
<title></title>

<link href="public/stylesheet/div.css" type="text/css" rel="stylesheet"/>
<script language="javascript">
function changeFontSize(pucl,size) 

{ 

    if(pucl.style) 

        pucl.style.fontSize=size; 

        

    for(var i=0;i<pucl.childNodes.length;i++) 

    { 

        changeFontSize(pucl.childNodes[i],size) 

    } 

} 
</script> 
</head>
<body>
<div id="container">
<div id="header">
   <h1>博客信息</h1>
   <h1>博客认证</h1>
   <a href="" style="margin-left:20px;">主页</a>
   </br>
   <span class="header"><a href="" style="color:yellow;">首页</a>|<a href="" style="color:yellow;">目录</a>|<a href="" style="color:yellow;">订阅<a></span>

</div>

<div id="info">
   <span style="font-family:华文宋体;color:yellow;">个人资料</span>
   </br>
   <span ><img src="" width="180" height="180"></span>
   </br></br>
   <input name="关注" type="button" id="bt1" value="加关注" onclick="window.open()"/>
   <input name="私信" type="button" id="bt2" value="发私信" onclick="window.open()"/>
   </br></br>
   <div id="infolist">
     <ul>
       <li><span class="info">博客等级:</span><span><img src="" width="12" height="12"></span></li>
       <li><span class="info">博客访问:</span><span><strong>....</strong></span></li>
       <li><span class="info">关注人气:</span><span><strong>....</strong></span></li>
     </ul>
   </div>
</div>

<div id="content">
    <span class="cont">调整字体大小
    <a href="#" onclick="changeFontSize(document.getElementById('cont'),this.style.fontSize);return false;" style="font-size: 18px;">大</a>|

    <a href="#" onclick="changeFontSize(document.getElementById('cont'),this.style.fontSize);return false;" style="font-size: 16px;">中</a>| 

    <a href="#" onclick="changeFontSize(document.getElementById('cont'),this.style.fontSize);return false;" style="font-size: 14px;">小</a>
</span>
    <div id="cont" style="width:80%;">
        <?php
            include('./class/content.class.php');
        ?>
    </div>
</div>

<div id="footer">
<p>
<a href="" target="_blank">关于我们</a>
|<a href="" target="_blank">联系我们</a>
|<a href="" target="_blank">产品答疑</a>
</p>                                                                           
<p> Copyright &copy; 2014 CHUEK Corporation,  All Rights Reserved</p>
<p> 创客团队 <a href="" target="_blank">版权所有</a></p>
</div>
</div>
</body>

