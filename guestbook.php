<html>
  <head>
    <title> :: 방명록 :: </title></head>
  <body>
    <h2>안녕하세요 허름한 방명록입니다</h2>
    <h3>자유롭되 이상한 말은 적지 말아주세요</h3>
    <form action="" method="post">
    <input type="text" name="user" placeholder="Name" />
    <br />
    <textarea cols="40" rows="5" name="note" placeholder="Comments" wrap="virtual"></textarea>
    <br />
    <input type="submit" name="submit" value="Submit" />
    </form>
    <?php

    if (isset($_POST['submit'])){

      $user = $_POST['user'];
      $note = $_POST['note'];

    if(!empty($user) && !empty($note)) {
    $msg = $user . ':' . $note;
    //will open a file
    $fp = fopen("notes.txt","a") or die("Can't open file");
    //will write to a file
    fwrite($fp, $msg."\n");
    fclose($fp);
    
    }
    }
    ?>

    <h2>History</h2>
    <?php 
    $file = fopen("notes.txt", "r") or exit("Unable to open file!");
    //Output a line of the file until the end is reached
    while(!feof($file))
    {
      //will return each line with a break 
      echo fgets($file). '<br />';
    }
    fclose($file);
    ?>
  </body>
</html>
