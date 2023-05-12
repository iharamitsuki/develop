<?php
session_start();

if(!isset($_SESSION['authenticated']) || $_SESSION['authenticated'] !== true) {
    session_destroy();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // パスワードの検証
    $password = $_POST['password']; // 実際には適切なパスワードのハッシュ値などを使用することをお勧めします
    $hash_pass = password_hash('1234', PASSWORD_DEFAULT);
    if (password_verify($password, $hash_pass)) {
        // 認証成功時の処理
        $_SESSION['authenticated'] = true;
    } else {
        // 認証失敗時の処理
        $_SESSION['authenticated'] = false;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>setting</title>
    <style>
        
    </style>
</head>
<body>
    <h1>設定画面</h1>

    <?php if(!isset($_SESSION['authenticated']) || $_SESSION['authenticated'] !== true) : ?>
        <form method="post">
            <label for="password">パスワード：</label>
            <input type="password" id="password" name="password">
            <input type="submit" value="認証">
        </form>
    <?php else : ?>
        <!-- 設定画面の表示部分 -->
        <h2>設定項目</h2>
        <!-- 設定フォームなど -->
    <?php endif; ?>

    <button onclick="location.href='index.php'">戻る</button>
</body>
</html>
