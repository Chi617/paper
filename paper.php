<?php
require_once("open.inc");

if (isset($_POST["Query"])) {
    header("Location: form_post.html");
    exit;
}

?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
<title>paper.php</title>
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

<table>
<tr><td>
<form method="post" action="paper.php">
<input type="submit" name="Query" value="我投稿過的論文" ></form></td>
<td>
<form method="post" action="file.php">
<input type="submit" value="投稿論文"></form></td></tr>
</table>
<?php
require_once("open.inc");


if ( isset($_POST["Query"]) ) {

   $sql = "SELECT * FROM 投稿系統";
   $result = mysqli_query($link, $sql); 
   echo "<br/><table border=1>";
   echo "<tr>";
   while ($meta = mysqli_fetch_field($result))
      echo "<td>".$meta->name."</td>";
   echo "<td>論文</td>"; 
   echo "</tr>";
   $total_fields = mysqli_num_fields($result);
   while ($row = mysqli_fetch_assoc($result)) {
      echo "<tr>";
      foreach ($row as $key => $value) {
         echo "<td>".$value."</td>";
      }
      echo "<td><a href='".$row['論文檔案']."' download>下載</a>";
      echo " | <a href='edit_del.php?action=edit&id=".$row['文章編號']."'>編輯</a></td>";

   }
   /*while ($rows = mysqli_fetch_array($result, MYSQLI_NUM)) {
      echo "<tr>";
      for ( $i = 0; $i < $total_fields; $i++ ){
         echo "<td>".$rows[$i]."</td>";
      }
         //echo "<td><a href='edit_del.php?action=edit&id=";
         //echo $rows[0]."'>|<b>編輯</b></td> ";  
         //echo "</tr>"; 
     echo "</tr>";
   }*/
   echo "</table>";
   $total_records = mysqli_num_rows($result);
   echo "記錄總數: $total_records 筆<br/><br/>";
   mysqli_free_result($result);
}
?>

</body>
</html>