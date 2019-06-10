<?php
  date_default_timezone_set('Asia/Tokyo');
  if(isset($_POST["text"])){
    $text = $_POST["text"];
    $fp=fopen("write.txt", "w")or die("unabled open file");
    fwrite($fp,$text);
    fclose($fp);

    $date = date("Y年m月d日 H時i分s秒");
    echo $date;
    if(copy("write.txt","log/{$date}.txt")){
      echo "テキストを保存しました。";
    }else{
      echo "テキストを保存できませんでした。";
    }
  }
  $contents = file_get_contents("write.txt");
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
      <textarea name ="text" cols="70" rows="5" ><?php echo $contents ?></textarea><br><br>
      <input type ="submit" value ="保存">
    </form>
  </body>
</html>
