<?php

define('DSN', 'mysql:host=db;dbname=pet_shop;charset=utf8;');
define('USER', 'staff');
define('PASSWORD', '9999');

try {
    $dbh = new PDO(DSN, USER, PASSWORD);
} catch (PDOException $e) {
    echo $e->getMessage();
    exit;
}

// SQL文の組み立て
$sql = 'SELECT * FROM animals';

// プリペアドステートメントの準備
// $dbh->query($sql) でも良い
$stmt = $dbh->prepare($sql);

// プリペアドステートメントの実行
$stmt->execute();

// 結果の受け取り
$animals = $stmt->fetchAll(PDO::FETCH_ASSOC);

// var_dump($animals);
foreach ($animals as $animal) {
    echo $animal['type'] . 'の' . $animal['classifcation'] . 'ちゃん<br>';
    echo $animal['description'] . '<br>';
    echo $animal['birthday'] . ' 生まれ<br>';
    echo '出身地 ' . $animal['birthplace'] . '<br>';
    echo '<hr>';
}