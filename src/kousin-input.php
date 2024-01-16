<!DOCTYPE html>
<html lang="en">
<head>
    <title>Document</title>
</head>
<body>
    <p>選手を更新します</p>
    <form action="kousin-output.php" method="post">
        選手番号<input type="text" name="sensyu_id"><br>
        選手名<input type="text" name="sensyu_name"><br>
        出身国<input type="text" name="koku_id"><br>
        スペイン→1,アルゼンチン→2,ブラジル→3,日本→4　を入力してください<br>
        <button type="submit">更新</button>
</form>
<?php
    const SERVER = 'mysql220.phy.lolipop.lan';
    const DBNAME = 'LAA1516827-fainal';
    const USER = 'LAA1516827';
    const PASS = 'Pass1108';

    $connect = 'mysql:host='. SERVER . ';dbname='. DBNAME . ';charset=utf8';
?>
    
<hr>
<?php
    $pdo = new PDO($connect, USER, PASS);
    $sql=$pdo->query('select * from Sensyu');
    foreach ($sql as $row) {
        echo $row['sensyu_id'], '：';
        $sql2=$pdo->prepare('select * from Koku where koku_id=?');
        $sql2->execute([$row['koku_id']]);
        foreach($sql2 as $row2){
            echo $row2['koku_name'], '：', $row['sensyu_name'],
            "";
        }
    }
?>
<button onclick="location.href='top.php'">トップへ戻る</button>
</body>
</html>