<!DOCTYPE html>
<?php 
session_start(); 
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
</head>
<body> 

    <h2>로그인</h2>

    <?php if (!isset($_SESSION['id']) || !isset($_SESSION['name'])): ?>
        <!-- 로그인 폼 -->
        <form method="post" action="login_ok.php" autocomplete="off">
            <p>아이디: <input type="text" name="user_id"></p>
            <p>비밀번호: <input type="password" name="user_pw"></p>
            <p><input type="submit" value="로그인"></p>
        </form>
        <small><a href="join.php">처음 오셨나요?</a></small>

    <?php else: 
        // 이미 로그인 된 사용자
        $user_id = $_SESSION['id'];
        $user_name = $_SESSION['name'];
    ?>
        <p><?php echo "$user_name($user_id)님은 이미 로그인 되어 있습니다!"; ?></p>
        <p>
        </p>
    <?php endif; ?>

</body>
</html>
