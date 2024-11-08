<?php
// 모든 오류 표시 설정
error_reporting(E_ALL);
ini_set("display_errors", 1);

// POST 데이터에서 사용자 아이디와 비밀번호 가져오기
$user_id = $_POST['user_id'];
$user_pw = $_POST['user_pw'];

// 데이터베이스 연결 설정
$conn = mysqli_connect('127.0.0.1', 'toor', 'ggm', 'mydatabase');

// 로그인 정보 확인을 위한 SQL 쿼리 작성
$sql = "SELECT * FROM users WHERE id='$user_id' AND pass='$user_pw'";

// 쿼리 실행 및 결과 가져오기
$res = mysqli_fetch_array(mysqli_query($conn, $sql));

// 오류가 있을 경우 오류 출력 및 종료
if (!mysqli_query($conn, $sql)) {
    echo "<pre>" . mysqli_error($conn) . "</pre>";
    exit;
}

// 로그인 성공 시 세션 시작 및 사용자 정보 저장
if ($res) {
    session_start();
    $_SESSION['user_id'] = $res['id'];
    $_SESSION['user_name'] = $res['name'];

    echo "<script>alert('로그인에 성공하셨습니다');</script>";
    echo "<script>window.location.replace('main.php');</script>";
    exit;

} else {
    // 로그인 실패 시 경고 메시지 및 로그인 페이지로 리디렉션
    echo "<script>alert('아이디 혹은 비밀번호가 잘못되었습니다.');</script>";
    echo "<script>window.location.replace('login.php');</script>";
}
?>

<!-- 로그인 성공 시 메인 페이지로 자동 리디렉션 -->
<meta http-equiv="refresh" content="0;url=main.php">
