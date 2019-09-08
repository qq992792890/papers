<?php
echo '<!DOCTYPE html>
<html>

<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>图书信息</title>
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

header("Content-Type: text/html; charset=utf-8");
// $words=array("title","journal","authors","first_author","issn","pubdate","type","url");
$detail=array("序号","论文标题","刊物名称","作者","第一作者","刊号","出版时间","分类","链接","录入时间");
require_once 'conn.php';
$result = mysql_query("select * from `papers` where `number`=".$_GET['id'],$conn);
// echo "<table border = 0><tr>";
echo "<table border = 0>";

while($row = mysql_fetch_row($result)){
	// echo "<tr>";
	for($i=0;$i<count($row);$i++){
        echo "<tr> <td>&nbsp;".$detail[$i]."&nbsp;</td>";
		if ($i == 8) {
			echo "<td>&nbsp;<a href= ".$row[$i]." target = '_blank'>点此下载"."</a>&nbsp;</td> </tr>";
		}else {
			echo "<td>&nbsp;".$row[$i]."&nbsp;</td> </tr>";
        }
	
	}
}

echo "</table>";
// echo "</tr></table>";
// echo "论文题目：".$_POST['title']."<br/>";
// echo "刊物名称：".$_POST['journal']."<br/>";
// echo "作者：".$_POST['authors']."<br/>";
// echo "第一作者：".$_POST['first_author']."<br/>";
// echo "刊号：".$_POST['issn']."<br/>";
// echo "出版时间：".$_POST['pubdate']."<br/>";
// echo "分类：".$_POST['type']."<br/>";
// echo "链接：".$_POST['url']."<br/>";

// $title = $_POST['title'];
// $journal = $_POST['journal'];
// $authors = $_POST['authors'];
// $first_author = $_POST['first_author'];
// $issn = $_POST['issn'];
// $pubdate = $_POST['pubdate'];
// $type = $_POST['type'];
// $url = $_POST['url'];

// if(mysql_query("insert into papers set title='".$title."',journal='".$journal."',authors='".$authors."',first_author='".$first_author."',issn='".$issn."',pubdate='".$pubdate."',type='".$type."',url='".$url."',time=now()",$conn)){
echo '<meta http-equiv="Content-Type" content="text/html; charset=utf-8">';
// echo "添加成功！<a href='testmysql.php'>查看数据库</a>";
// }
// else{
	// echo '添加失败！';
// }

echo '</section>';

echo '<footer>Copyright 2019 by <a href="adbook.html" target="_blank">周从文</a>. Made with 100% recycled pixels.</footer>
</body>
</html>';
?>