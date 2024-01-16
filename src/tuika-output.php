<?php
    const SERVER = 'mysql220.phy.lolipop.lan';
    const DBNAME = 'LAA1516827-fainal';
    const USER = 'LAA1516827';
    const PASS = 'Pass1108';

    $connect = 'mysql:host='. SERVER . ';dbname='. DBNAME . ';charset=utf8';
?>
     <!DOCTYPE html>
     <html lang="ja">
     <head>
        <meta charset="UTF-8">
        <title>練習課題6-5-output</title>
     </head>
     <body>
        <?php
        $pdo=new PDO($connect, USER, PASS);
        $sql=$pdo->prepare('insert into Sensyu(sensyu_id,koku_id, sensyu_name) values (?,?,?)');
        if(!preg_match('/^\d+$/', $_POST['sensyu_id'])){
            echo '商品名を整数で入力してください';
        }else if(empty($_POST['sensyu_name'])){
            echo'商品名を入力してください.';
        }else if(!preg_match('/^[0-9]+$/', $_POST['koku_id'])){
            echo'商品価格を整数で入力してください.';
        }else if($sql->execute([$_POST['sensyu_id'],$_POST['koku_id'],$_POST['sensyu_name']])){
            echo '<font color="red">追加に成功しました。</font>';
        }else {
            echo '<font color="red">追加に失敗しました。</font>';
        }
        ?>
        <br><hr><br>
        <table>
            <tr><th>選手番号</th><th>選手名</th><th>出身国</th></tr>
            <?php
            foreach($pdo->query('select * from Sensyu')as $row){
                echo '<tr>';
                echo '<td>',$row['sensyu_id'],'</td>';
                echo '<td>',$row['sensyu_name'],'</td>';
                echo '<td>',$row['koku_id'],'</td>';
                echo '<tr>';
                echo "\n";
            }
            ?>
            </table>
            <button type="submit" onclick="history.back()" name="modo" value="back">追加画面戻る</button>
            <button onclick="location.href='top.php'">トップへ戻る</button>
     </body>
     </html>