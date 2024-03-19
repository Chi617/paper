<?php
session_start();
date_default_timezone_set('Asia/Taipei');
require_once("open.inc");
$id = $_POST['ID'];
$pwd = $_POST['password'];
$name = $_POST['name'];
$contact= $_POST['contact'];
$unit= $_POST['unit'];
$address= $_POST['address'];
$sql = $sql = "SELECT * FROM `登入系統` ";

if($result=mysqli_query($link,$sql)){
	$rowcount = mysqli_num_rows($result);
    if($rowcount == 0){
		$num = 1;
	}else{
		$num = $rowcount + 1;
	}
}




$sql="INSERT INTO `登入系統`(`ID`, `密碼`, `姓名`, `聯繫方式`, `機構`, `地址`) ";
$sql.="VALUES('".$id."','".$pwd."','".$name."','".$contact."','".$unit."','".$address."')";

 if ($link->query($sql)) {
	 echo "註冊成功，回登入畫面";
	
} else {
	 echo "註冊失敗，需重新註冊 " ;
 }
?>
<hr/>| <a href="form_post.html">回登入首頁</a>;

<form action="paper.php" method="post" name="form1" id="form1">
<p>
  <label for="textfield">ID:</label>
  <input name="stuID" type="text" autofocus required id="stuID" size="10" maxlength="8">
</p>
<p>
  <label for="password">密碼:</label>
  <input name="password" type="password" required id="password" size="20" maxlength="12">
</p>
<p>
  <input type="reset" name="reset" id="reset" value="重設">
  <input type="submit" name="submit" id="submit" value="登入">
</p>
</form>
<form action="register.html" method="post" name="form" id="form">
  <input type="submit" name="reset" id="reset" value="註冊">
</form>
