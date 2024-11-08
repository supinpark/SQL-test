<?php

// 세션 시작
session_start();

// GET 요청: 로그인 폼을 보여줌
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    echo '<form method="POST" action="login.php">
            <label for="username">사용자 이름:</label>
            <input type="text" name="username" required>
            <br>
            <label for="password">비밀번호:</label>
            <input type="password" name="password" required>
            <br>
            <button type="submit">로그인</button>
          </form>';
}

// POST 요청: 로그인 처리
elseif ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // 사용자로부터 입력받은 데이터
    $username = $_POST['username'];
    $password = $_POST['password'];

    // 간단한 하드코딩된 사용자명과 비밀번호 (실제로는 데이터베이스에서 확인)
    $valid_username = "user";
    $valid_password = "password";

    // 사용자명과 비밀번호 확인
    if ($username === $valid_username && $password === $valid_password) {
        $_SESSION['username'] = $username;  // 세션에 사용자 이름 저장
        echo "로그인 성공! <a href='index.php'>홈으로</a>";
    } else {
        // 로그인 실패
        echo "로그인 실패. 사용자 이름 또는 비밀번호가 틀렸습니다.";
    }
}
?>