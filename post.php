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
echo "论文题目：".$_POST['title']."<br/>";
echo "刊物名称：".$_POST['journal']."<br/>";
echo "作者：".$_POST['authors']."<br/>";
echo "第一作者：".$_POST['first_author']."<br/>";
echo "刊号：".$_POST['issn']."<br/>";
echo "出版时间：".$_POST['pubdate']."<br/>";
echo "分类：".$_POST['type']."<br/>";
echo "链接：".$_POST['url']."<br/>";

$title = $_POST['title'];
$journal = $_POST['journal'];
$authors = $_POST['authors'];
$first_author = $_POST['first_author'];
$issn = $_POST['issn'];
$pubdate = $_POST['pubdate'];
$type = $_POST['type'];
$url = $_POST['url'];
require_once 'conn.php';
if(mysql_query("insert into papers set title='".$title."',journal='".$journal."',authors='".$authors."',first_author='".$first_author."',issn='".$issn."',pubdate='".$pubdate."',type='".$type."',url='".$url."',time=now()",$conn)){
echo '<meta http-equiv="Content-Type" content="text/html; charset=utf-8">';
echo "添加成功！<a href='testmysql.php'>查看数据库</a>";
}
else{
	echo '添加失败！';
}

echo '</section>';

echo '<footer>Copyright 2019 by <a href="adbook.html" target="_blank">周从文</a>. Made with 100% recycled pixels.</footer>
</body>
</html>';
?>