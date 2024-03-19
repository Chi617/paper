<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
<title>file.php</title>
<style>
    body {
        background-color: #bee7f9;
        color:black; 
        text-align: center;
    }
    form {
        display: inline-block;
        text-align: left;
    }
</style>
</head>
<body>
   
<?php

require_once("open.inc");

if(isset($_POST["submit"])){

   $sql = "SELECT MAX(文章編號) AS maxno FROM 投稿系統";
   $result = mysqli_query($link, $sql);
   $row = mysqli_fetch_assoc($result);
   $maxNo = $row['maxno'];
   $maxNo++;
   $newNo=$maxNo;

   $title=$_POST["title"];
   $class=$_POST["class"];
   $mail=$_POST["mail"];
   //$file=$_POST["file"];
   $date = date("Y-m-d");
   $user=$_POST["user"];
   $state="No";
   

   $target_dir = " ";
   $target_file = $target_dir . basename($_FILES["file"]["name"]);
   $uploadOk = 1;
   $fileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

   if($fileType != "pdf") {
       echo "只允許上傳pdf檔案,請重新上傳。";
       $uploadOk = 0;
   }

   if ($uploadOk == 0)
       echo "您的檔案未上傳,請再上傳一次。";
   else {
       if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file)) {
           echo "檔案 ". htmlspecialchars( basename( $_FILES["file"]["name"])). " 已上傳。";
       } else {
           echo "檔案上傳失敗。";
       }
   }
   $file= $target_file;
   $in = "INSERT INTO 投稿系統 (文章編號, 文章標題, 文章類別, 投稿日期,投稿者,電子郵件,投稿狀態,論文檔案) VALUES (";
   $in .= "'" . $newNo . "','" . $title . "','".$class . "','" . $date ."','".$user . "','".$mail . "','".$state . "','".$file . "')";

   mysqli_query($link, 'SET NAMES utf8'); 
   if ( mysqli_query($link, $in) )
      echo "資料新增成功<br/>";
   else
      die("資料新增失敗<br/>");

}
?>
<h1>投稿論文</h1>
<form action="file.php" method="post" enctype="multipart/form-data">
<table>
<tr><td>文章標題:</td>
   <td><input type="text" name="title" size="12" required /></td></tr>
<tr><td>文章類別:</td>
<td><select name="class" required>
      <option value="None" selected="True">None	</option>
      <option value="Research Paper">Research Paper	</option>
      <option value="Review">Review</option>
      <option value="Special Issue Paper">Special Issue Paper</option>
</td></tr>
<tr><td>投稿者:</td>
    <td><input type="text" name="user" size="12" required/></td></tr>
<tr><td>電子郵件:</td>
    <td><input type="text" name="mail" size="12" required/></td></tr>
</tr>
   </table>
<hr/>
<input type="file" name="file"/><p>
<input type="submit" name="submit" value="上傳檔案"/><hr>

</form>
<form action="paper.php" method="post" >
<input type="submit" name="home" value="回首頁">
</form>

</body>
</html>