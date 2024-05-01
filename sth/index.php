<!-- 2.留言本首页 index.php -- 
<!-- 本页面显示十条最近的的留言，并且有分页功能 -- 
<html 
<head 
<title 欢迎来到陈雨情的留言本吼吼吼</title 
<style type="text/css" 
TD{
font-size: 12px;
line-height: 150%;
}
</style 
</head 
<body 
<table border=1 cellspacing=0 cellspadding=0 style="border-collapse:collapse" align=center width=400 bordercolor=black height=382 
<tr 
<td height=100 bgcolor=#6c6c6c style="font-size:30px;line-height:30px" 
<font color=#ffffff face="黑体" 欢迎来到×××的留言本吼吼吼</font 
</td 
</tr 
<tr 
<td height=25 
<a href=send.php [我要写留言]</a 
<a href=login.php [管理留言]</a 
</td 
</tr 
<tr 
<td height=200 
<?php
$link = mysqli_connect("127.0.0.1","root","Vmorish");
mysqli_select_db($link,"gbook");
$query = "select * from message";
$result = mysqli_query($link,$query);
if( mysqli_num_rows($result) < 1){
echo "目前数据表中还没有任何留言!";
}else{
$totalnum = mysqli_num_rows($result);//获取数据库中所有数据条数
$pagesize = 7;//每页显示7条
$page = $_GET["page"];
if( $page == ""){
$page = 1;
}
$begin = ($page-1)*$pagesize;
$totalpage = ceil($totalnum/$pagesize);
//输出分页信息
echo "<table border=0 width=95% <tr <td ";
$datanum = mysqli_num_rows($result);
echo "共有".$totalnum."条留言，每页".$pagesize."条，共".$totalpage."页。<br ";
//输出页码
for( $i = 1; $i <= $totalpage; $i++){
echo "<a href=index.php?page=".$i." [".$i."]</a ";
}
echo "<br ";
//从message表中查询当前页面所要显示的留言，并根据时间排序
$query = "select * from message order by addtime desc limit $begin,$pagesize";
$result = mysqli_query($link,$query);
$datanum = mysqli_num_rows($result);
//循环输出所有留言，如果管理员已经回复则同时输出回复
for( $i = 1; $i <= $datanum; $i++){//$datanum???
$info = mysqli_fetch_array($result);
echo "- [".$info['author']."]于".$info['addtime']."说:<br ";
echo "".$info['content']."<br ";
if( $info['reply'] != ""){
// <b </b 显示粗体
echo "<b 管理员回复:</b ".$info['reply']."<br ";
}
echo "<hr ";
}//else结束
echo "</td </tr </table ";
}
mysqli_close($link)
? 
</td 
</tr 
<tr 
<td height=80 bgcolor=#6c6c6c align=center 
<font color="#FFFFFF" 
版权所有：<a href="http://blog.csdn.net/cherish0222" rel="external nofollow" rel="external nofollow" rel="external nofollow"  Vmorish</a <br 
E-mail:vmorish@163.com
</font 
</td 
</tr 
</table 
</body 
</html 
