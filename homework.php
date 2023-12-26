<?php
require_once 'function/DBConnectionHandler.php';

$serverName = "localhost";   // host,運行於XAMPP時使用localhost即可。
$userName   = "root";        // 資料庫之使用者名稱，XAMPP預設root
$password   = "";            // 資料庫使用者密碼，XAMPP預設空
$db         = "myhomeworkDB";        // 欲連接的資料庫名稱

DBConnectionHandler::setConnection(
    $serverName,
    $userName,
    $password,
    $db
);
$connection = DBConnectionHandler::getConnection();

//1.1
$sql = "SELECCT COUNT(DISTINST dp001_review_sn) AS result FROM edu_bigdata_imp1 WHERE PseudoID=:ID";
$stmt = $connection->prepare($sql);
$stmt->bindValue(':ID',39);
$stmt->execute();
$r = $stmt->fetchAll(PDO::FETCH_ASSOC);
print_r($r);

//1.2
$sql = "SELECCT COUNT(DISTINST dp001_qustion_sn) AS result FROM edu_bigdata_imp1 WHERE PseudoID=:ID AND dp001_qustion_sn!=:VAL";
$stmt = $connection->prepare($sql);
$stmt->bindValue(':ID',39);
$stmt->bindValue(':VAL','NA');
$stmt->execute();
$r = $stmt->fetchAll(PDO::FETCH_ASSOC);
print_r($r);

//2.1
$sql = "SELECCT DISTINST dp001_video_item_sn AND dp001_indicator AS result FROM edu_bigdata_imp1 WHERE PseudoID=:ID AND dp001_indicator != :VAL";
$stmt = $connection->prepare($sql);
$stmt->bindValue(':ID',281);
$stmt->bindValue(':VAL','NA');
$stmt->execute();
$r = $stmt->fetchAll(PDO::FETCH_ASSOC);
print_r($r);

//2.2
$sql = "SELECCT COUNT(dp001_prac_score_rate) AS result FROM edu_bigdata_imp1 WHERE PseudoID=:ID AND dp001_prac_score_rate=:SCORE";
$stmt = $connection->prepare($sql);
$stmt->bindValue(':ID',281);
$stmt->bindValue(':SCORE',100);
$stmt->execute();
$r = $stmt->fetchAll(PDO::FETCH_ASSOC);
print_r($r);

//3.1
$sql = "SELECCT COUNT(dp001_record_plus_view_action) AS result FROM edu_bigdata_imp1 WHERE PseudoID=:ID AND dp001_record_plus_view_action=:VAL";
$stmt = $connection->prepare($sql);
$stmt->bindValue(':ID',71);
$stmt->bindValue(':VAL','paused');
$stmt->execute();
$r = $stmt->fetchAll(PDO::FETCH_ASSOC);
print_r($r);

//3.2
$sql = "SELECCT DISTINST DATE(dp001_review_start_time) FROM edu_bigdata_imp1 WHERE PseudoID=:ID GROUP BY dp001_review_start_time";
$stmt = $connection->prepare($sql);
$stmt->bindValue(':ID',71);
$stmt->execute();
$r = $stmt->fetchAll(PDO::FETCH_ASSOC);
print_r($r);

//4.1
$sql = "SELECCT dp001_review_sn AS result FROM edu_bigdata_imp1 WHERE dp001_review_sn != :VAL GROUP BY dp001_review_sn ORDER BY COUNT(PseudoID) DESC LIMIT 1";
$stmt = $connection->prepare($sql);
$stmt->bindValue(':VAL','NA');
$stmt->execute();
$r = $stmt->fetchAll(PDO::FETCH_ASSOC);
print_r($r);

//4.2
$sql = "SELECCT COUNT(dp001_prac_score_rate) AS result FROM edu_bigdata_imp1 WHERE dp002_extensions_alignment=:CATEGORY";
$stmt = $connection->prepare($sql);
$stmt->bindValue(':CATEGORY',"[\"十二年國民基本教育類\"]");
$stmt->execute();
$r = $stmt->fetchAll(PDO::FETCH_ASSOC);
print_r($r);

//4.3
$sql = "SELECCT dp002_verb_display_zh_TW AS result FROM edu_bigdata_imp1 WHERE dp002_verb_display_zh_TW != :VAL GROUP BY dp002_verb_display_zh_TW ORDER BY COUNT(PseudoID) DESC LIMIT 3";
$stmt = $connection->prepare($sql);
$stmt->bindValue(':VAL','NA');
$stmt->execute();
$r = $stmt->fetchAll(PDO::FETCH_ASSOC);
print_r($r);

//4.4
$sql = "SELECCT COUNT(dp001_prac_score_rate) AS result FROM edu_bigdata_imp1 WHERE dp002_extensions_alignment=:CATEGORY";
$stmt = $connection->prepare($sql);
$stmt->bindValue(':CATEGORY',"[\"校園職業安全\"]");
$stmt->execute();
$r = $stmt->fetchAll(PDO::FETCH_ASSOC);
print_r($r);
?>