<?php
require_once __DIR__ . '/config.php';

// 接続処理を行う関数
function connect_db()
{
    try {
        return new PDO(
            DSN,
            USER,
            PASSWORD,
            [PDO::ATTR_ERRMODE =>
            PDO::ERRMODE_EXCEPTION]
        );
    } catch (PDOException $e) {
        echo $e->getMessage();
        exit;
    }
}

// エスケープ処理を行う関数
function h($str)
{
    // ENT_QUOTES: シングルクオートとダブルクオートを共に変換する。
    return htmlspecialchars($str, ENT_QUOTES, 'UTF-8');
}

//全データ取得
function get_all_info()
{
// データベースに接続
$dbh = connect_db();

// SQL文の組み立て
$sql = 'SELECT * FROM animals';

// プリペアドステートメントの準備
// $dbh->query($sql) でも良い
$stmt = $dbh->prepare($sql);

// プリペアドステートメントの実行
$stmt->execute();

// 結果の受け取り
$animals = $stmt->fetchAll(PDO::FETCH_ASSOC);

return $animals;
}

function search_contents($keyword)
{
// データベースに接続
$dbh = connect_db();

// SQL文の組み立て
$sql ='SELECT * FROM animals where description LIKE :keyword';
$keyword_param = '%' . $keyword . '%';

// プリペアドステートメントの準備
// $dbh->query($sql) でも良い
$stmt = $dbh->prepare($sql);

// パラメータのバインド
$stmt->bindValue(':keyword', $keyword_param, PDO::PARAM_STR);

// プリペアドステートメントの実行
$stmt->execute();

// 結果の受け取り
$content = $stmt->fetchAll(PDO::FETCH_ASSOC);

return $content;
}
