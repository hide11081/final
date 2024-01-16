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
            "<a href='sakuzyo.php?id=",$row['sensyu_id'],"'><button>削除</button></a><br>";
        }
    }
?>
<button onclick="location.href='top.php'">トップへ戻る</button>