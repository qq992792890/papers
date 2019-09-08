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


//post请求过来的
$fileName = $_FILES['file']['name'];
$fileTmpName = $_FILES['file']['tmp_name'];
//判断是否选择了上传的文件
if (empty($fileName)) {
    $data['message'] = "请选择要上传的文件";
    header("location:adbook.html");
}
//判断选择上传的文件是不是csv格式
if (explode(".", $fileName)[1] != "csv") {
    $data['message'] = "请选择csv格式的文件上传";
    header("location:adbook.html");
} 

//创建一个空数组，预放imageUrl
$imageCollection = [];
//打开要读的文件
$handle = fopen($fileTmpName, 'r');
//解析csv文件
$words=array("title","journal","authors","first_author","issn","pubdate","type","url");
$detail=array("序号","论文标题","刊物名称","作者","第一作者","刊号","出版时间","分类","链接","录入时间");
while (!feof($handle)) {
    //fgets方法按行读
    $result = fgets($handle);
    //判断读到的每一行是否有值
    if (!empty($result)) {
        $arrResult = explode(",", $result);
        // $name = $arrResult[0];
        // $age = $arrResult[1];
        // $gender = $arrResult[2];
        // //图片的原路径
        // $imagePath = $arrResult[3];
        // //图片的名字
        // $image = basename($imagePath);
        // for ($i=0; $i < count($arrResult); $i++) { 
        //     $words[$i]=
        // }
if(mysql_query("insert into papers set title='".$arrResult[0]."',journal='".$arrResult[1]."',authors='".$arrResult[2]."',first_author='".$arrResult[3]."',issn='".$arrResult[5]."',pubdate='".$arrResult[5]."',type='".$arrResult[6]."',url='".$arrResult[7]."',time=now()",$conn)){
// echo '<meta http-equiv="Content-Type" content="text/html; charset=utf-8">';
echo "数据".$arrResult[0]."添加成功！<a href='testmysql.php'>查看数据库</a><br>";
}
else{
echo "数据".$arrResult[0].'<b>添加失败！</b><br>';
}
        // $data['message'] = Person::savePerson($name, $age, $gender, $image);

        // if ($data['message'] == 'add successful') {
            //将每个图片的uri放到数组中
            // array_push($imageCollection, $imagePath);
        // }
    }
}
//关闭文件流
fclose($handle);

        //关闭文件流之后才能上传图片，注意：流和流是不能嵌套使用的
        // if (!empty($imageCollection)) {

        //     foreach ($imageCollection as $value) {
        //         //将图片上传到服务器上
        //         move_uploaded_file($imagePath, dirname(__DIR__) . '/web/images/'.date("Ymd").'/'.$image);
        //     }
        // }
        // return $this->render("testmysql.php", $data);


$result = mysql_query("select `number`,`title`,`authors` from papers",$conn);
// echo " ".$result;
echo "<table border = 1 frame = below><tr>";

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