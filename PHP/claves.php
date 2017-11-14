<html>
 <head>
  <meta charset="UTF-8">
 </head>
<body>
  <h2>CRUD Primer estadio</h2>
  <h3>Add Data</h3>
  <form name="search" method="get">
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
 if(!empty($_GET)):
  $nameKey = $_GET['key'];
  $nameValue = $_GET['value'];
  $redis=new Redis();
  $redis -> pconnect('127.0.0.1', 6379);
  if(!($redis -> sismember('nombres11', $nameKey))){
     $redis->sadd('nombres11',$nameKey);
     $redis -> hset('nombres1HH',$nameKey,$nameValue);
     $last=$nameKey;
  }
  if(isset($last)):
   $unArray = array();
   $unArray = $redis -> hgetall('nombres1HH');
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
