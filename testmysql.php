
<?php
/*本人第一次0基础学习php第8天
 * 2011年9月10日
 * QQ:382572 所在群后盾网第三群 欢迎交流指正，谢谢！*/
require_once 'conn.php';


echo '<!DOCTYPE html>
<html>

<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>论文列表</title>
<link href="Styles.css" rel="stylesheet" type="text/css">
<style type="text/css">
body {
	background-image: url(images/bkgdContact.jpg);
	background-size: cover;
	background-attachment: fixed;
}
</style>';
echo '</head>
<body>';
echo '	<header><img src="images/logo1.jpg" width="250"  />
  <nav><a href="adbook.html" class="navHome">添加</a> 
  <a href="testmysql.php" class="navPort">查看</a>  
  <a href="aboutinfo.html" class="navAbout">关于</a> 
  <a href="contact.html" class="navContact">联系</a></nav>
</header>';

echo '<section class="sectionFull">';

echo '<h1>论文列表</h1>';
// header("Content-Type: text/html; charset=gbk");
// $result = mysql_query("select * from papers",$conn);
$result = mysql_query("select `number`,`title`,`authors` from papers",$conn);
// echo " ".$result;
echo "<table border = 0 frame =below><tr>";

// while($field = mysql_fetch_field($result)){
// 	echo "<td>&nbsp;".$field->name."&nbsp;</td>";
// }
echo "<td width=50px>&nbsp;序号&nbsp;</td>";
echo "<td>&nbsp;题目&nbsp;</td>";
echo "<td>&nbsp;作者&nbsp;</td>";
echo "</tr>";
while($row = mysql_fetch_row($result)){
	echo "<tr>";
	for($i=0;$i<count($row);$i++){
		if ($i == 1) {
			echo "<td>&nbsp;<a href= details.php?id=".$row[0].">".$row[$i]."</a>&nbsp;</td>";
		}else {
			echo "<td>&nbsp;".$row[$i]."&nbsp;</td>";
		}
		
	}
	echo "<td width=75px>&nbsp;<a href= details.php?id=".$row[0].">"."删除按钮"."</a>&nbsp;</td>";
	//删除按钮功能未完成
	echo "</tr>";
}


echo "</tr></table>";
MYSQL_CLOSE($conn);
echo "<br><a href='adbook.html'>返回继续添加论文信息</a>";


echo '</section>';

echo '<footer>Copyright 2019 by <a href="adbook.html" target="_blank">周从文</a>
</html>';
// echo '<body>';
// echo '</html>';
?>