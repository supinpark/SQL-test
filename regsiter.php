<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

$db_host = "localhost"; //your_mysql_mmg //192.168.20.68
$db_user = "toor";
$db_password = "ggm";
$db_name = "mydatabase";

$con = new mysqli($db_host, $db_user, $db_password, $db_name); // DB 접속

if ($con->connect_errno) { 
	echo "실패"; } // 에러 메세지 출력
else {
	echo "성공";}

// 회원 가입 처리
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $userId = $_POST['username'];
    $password = $_POST['password'];

    // SQL 쿼리 작성
    $sql = "INSERT INTO users (id, pass) VALUES ('$userId', '$password')";

    // 쿼리 실행
    if ($mysqli->query($sql) === TRUE) {
        echo "회원 가입이 완료되었습니다.";
    } else {
        echo "오류: " . $sql . "<br>" . $mysqli->error;
    }
}

// 데이터베이스 연결 종료
$mysqli->close();
?>

<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>회원가입</title>
</head>
<body>
    <h2>회원가입 하기</h2>
    <form action="regsiter.php" method="post">
        <label for="username">User ID:</label>
        <input type="text" id="username" name="username" required><br><br>
        
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required><br><br>
        
        <input type="submit" value="회원가입">
    </form>
</body>
</html>