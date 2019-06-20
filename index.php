<?php
  if(isset($_POST["text"])){
    $text = $_POST["text"];
    $fp=fopen("write.txt", "w")or die("unabled open file");
    fwrite($fp,$text);
    fclose($fp);
    date_default_timezone_set('Asia/Tokyo');
    $date = date("Y年m月d日 H時i分s秒");
    copy("write.txt","log/{$date}.txt");   
    header('Location: /index.php',true,301);
    exit;
  }
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>TextEdit</title>
  </head>
  <body>
    <h3>TextEdit</h3>
    <form action ="" method = "POST">
      <?php $contents = file_get_contents("write.txt"); ?>
      <textarea name ="text" cols="150" rows="20" ><?php echo $contents ?></textarea><br><br>
      <input type ="submit" value ="保存">
    </form>
  </body>
</html>
