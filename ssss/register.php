<?php

session_start();  // 세션 시작

// GET 요청: 회원가입 폼 출력
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    echo '<form method="POST" action="register.php">
            <label for="username">사용자 이름:</label>
            <input type="text" name="username" required>
            <br>
            <label for="password">비밀번호:</label>
            <input type="password" name="password" required>
            <br>
            <label for="password_check">비밀번호 확인:</label>
            <input type="password" name="password_check" required>
            <br>
            <button type="submit">회원가입</button>
          </form>';
}

// POST 요청: 회원가입 처리
elseif ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // 사용자로부터 입력 받은 데이터
    $username = $_POST['username'];
    $password = $_POST['password'];
    $password_check = $_POST['password_check'];

    // 비밀번호 일치 여부 확인
    if ($password !== $password_check) {
        echo "비밀번호가 일치하지 않습니다.";
        exit;  // 비밀번호가 일치하지 않으면 종료
    }

    // 데이터베이스 연결
    $db_pass = "!as1234";  // 비밀번호
    $db_name = "lnr";       // 데이터베이스 이름

    $conn = mysqli_connect('mysql', 'root', $db_pass, $db_name);
    if ($conn->connect_error) {
        die("데이터베이스 연결 실패: " . $conn->connect_error);
    }

    // 사용자 이름 중복 확인
    $check_sql = "SELECT * FROM users WHERE username='$username'";
    $check_result = $conn->query($check_sql);

    if ($check_result->num_rows > 0) {
        echo "이미 존재하는 사용자 이름입니다. 다른 이름을 선택하세요.";
    } else {
        // 새로운 사용자 정보 데이터베이스에 추가
        $insert_sql = "INSERT INTO users (username, password) VALUES ('$username', '$password')";
        if ($conn->query($insert_sql) === TRUE) {
            echo "회원가입이 완료되었습니다. <a href='login.php'>로그인</a> 하세요.";
        } else {
            echo "회원가입 실패";
        }
    }

    // 데이터베이스 연결 종료
    $conn->close();
}
?>
