<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);

// POST로 전달받은 회원가입 정보
$join_name = $_POST['join_name'];
$join_id = $_POST['join_id'];
$join_pw = $_POST['join_pw'];

// 데이터베이스 연결
$conn = mysqli_connect('bbb', 'toor', 'ggm', 'mydatabase');

// 회원정보 삽입 쿼리
$sql = "INSERT INTO users (id, pass, name) VALUES ('$join_id', '$join_pw', '$join_name')";

// 쿼리 실행
if(mysqli_query($conn, $sql)) {
    echo "<script>alert('회원가입이 완료되었습니다.');</script>";
    echo "<script>window.location.replace('login.php');</script>";
} else {
    echo "<pre>" . mysqli_error($conn) . "</pre>";
    echo "<script>alert('회원가입 중 오류가 발생했습니다.');</script>";
    echo "<script>history.back();</script>";
}

// 데이터베이스 연결 종료
mysqli_close($conn);
?>