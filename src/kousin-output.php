<?php
    const SERVER = 'mysql220.phy.lolipop.lan';
    const DBNAME = 'LAA1516827-fainal';
    const USER = 'LAA1516827';
    const PASS = 'Pass1108';

    $connect = 'mysql:host='. SERVER . ';dbname='. DBNAME . ';charset=utf8';
?>
<?php
        $pdo = new PDO($connect, USER, PASS);
        $sql=$pdo->prepare('update Sensyu set koku_id=?, sensyu_name=? where sensyu_id=?');
        $sql->execute([$_POST['koku_id'], $_POST['sensyu_name'],$_POST['sensyu_id']]);
?>