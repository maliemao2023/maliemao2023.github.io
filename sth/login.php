<!-- 3.管理员登录页面 login.php -- 
<!-- 供管理员登录 -- 
<!-- 体会session实现用户登录的方法 -- 
<?php
$name = $_POST["name"];
if( $name != ""){
$password = $_POST['password'];
$link = mysqli_connect("127.0.0.1","root","Vmorish");
mysqli_select_db($link,"gbook");
$query = "select * from admin where username = '$name'";
$result = mysqli_query($link,$query);
if( mysqli_num_rows($result) < 1){
echo "该用户不存在，请重新登录!<br ";
}else{
$info = mysqli_fetch_array($result);
if( $info['userpass'] != $password){
echo "密码输入错误，请重新登录!<br ";
}else{
//如果用户名密码都正确，则注册一个session来标记其登录状态
echo "hhhh<br ";
session_start();
// $_SESSION["login"] = "YES";
echo "<script language=javascript alert('登录成功!');location.href='manage.php';</script ";
}
}
mysqli_close($link);
}
? 
<html 
<head 
<title 欢迎来到陈雨情的留言本吼吼吼</title 
</heda 
<body 
<table border=1 cellspacing=0 cellspadding=0 style="border-collapse:collapse" align=center width=400 bordercolor=black height="358" 
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
<td height=178 
<form method="POST" action="login.php" 
<table border="1" width="95%" id="table1" cellspcing="0" cellpadding="0" bordercolor="#808080" style="border-collapse" height="154" 
<tr 
<td colspan="2" height="29" 
<p align="center" 欢迎管理员登录</p 
</td 
</tr 
<tr 
<td width="32%" 
<p align="center" 用户名</P 
</td 
<td width="67%" 
<input type="text" name="name" size="20" 
</td 
</tr 
<tr 
<td width="32%" 
<p align="center" 密码</p 
</td 
<td 
<input type="password" name="password" size="20" 
</td 
</tr 
<tr 
<td width="99%" colspan="2" 
<p align="center" <input type="submit" value="登录" name="B1" </p 
</td 
</tr 
</table 
</form 
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
