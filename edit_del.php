<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
<title>revise.php</title>
</head>
<body>
<?php
require_once("open.inc");
$id = $_GET["id"];
$action = $_GET["action"];
switch ($action) {
   case "update": 
      $title=$_POST["title"];
      $class=$_POST["class"];

      $sql = "UPDATE 投稿系統 SET 文章標題 =
      '".$title."', 文章類別='".$class. "'WHERE 文章編號='".$id."'";
      mysqli_query($link, $sql);
      echo "修改完成!";
      break;
   /*case "del": 
      $sql = "DELETE FROM 投稿系統 WHERE 文章編號='".$id."'";
      mysqli_query($link, $sql);
      echo "成功刪除資料!";
      break;*/
   case "edit":
      $sql = "SELECT*FROM 投稿系統 WHERE 文章編號='".$id."'";
      $result = mysqli_query($link, $sql);
      $row = mysqli_fetch_assoc($result);
      $title=$row["文章標題"];
      $class=$row["文章類別"];
?>
<form action="edit_del.php?action=update&id=<?php echo $id ?>"method="post">
<table border="1">
<tr><td><font size="2">文章標題: </font></td>
   <td><input type="text" name="title" size="25"
   maxlength="10" value="<?php echo $title ?>"/></td></tr>
<tr><td><font size="2">文章類別: </font></td>
<td><select name="class">
      <option value="Research Paper" <?php if ($class == "Research Paper") echo "selected"; ?>>Research Paper</option>
      <option value="Review" <?php if ($class == "Review") echo "selected"; ?>>Review</option>
      <option value="Special Issue Paper" <?php if ($class == "Special Issue Paper") echo "selected"; ?>>Special Issue Paper</option>
</select></td>
<td><input type="submit"  value="修改"/></td>
</tr>
</table>
</form>
<?php   
       break;
} 
?>

<form method="post" action="paper.php">
<input type="submit" name="home" value="回首頁"/><hr>
</form>
</body>
</html>