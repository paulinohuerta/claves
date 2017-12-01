<html>
 <head>
  <meta charset="UTF-8">
 </head>
<body>
  <h2>CRUD Primer estadio</h2>
  <h3>Add Data</h3>
  <form name="search" method="post">
  <p>Key:
    <input name="key" type="text"/>
  </p>
  <p>Value:
    <input name="value" type="text"/>
  </p>
  <p>
    <input name="submit" type="submit" value="add"/>
  </p>
  </form>
 <?php
 if(!isset($_POST['nameValue']['nameKey'])):
  $nameKey = $_POST['key'];
  $nameValue = $_POST['value'];
  $redis=new Redis();
  $redis -> pconnect('127.0.0.1', 6379);
  if(!($redis -> sismember('nombres1', $nameKey))){
     $redis->sadd('nombres1',$nameKey);
     $redis -> hset('nombres1H',$nameKey,$nameValue);
     $last=$nameKey;
  }
  if(isset($last)):
   $unArray = array();
   $unArray = $redis -> hgetall('nombres1H');
 ?>
  <hr />
  <i><b><?= $last ?></i></b>
  <hr />
  <table style="width:60%">
   <?php foreach($unArray as $key1 => $valor1): ?>
       <tr>
        <td> <?= $key1 ?></td>
        </td> <td><?= $valor1 ?></td>
       </tr>
   <?php endforeach ?>
  </table> 
 <?php endif ?>
 <?php endif ?>
</body>
</html>
