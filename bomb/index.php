<?php
session_start();

// ゲームの初期化
if (!isset($_SESSION['target'])) {
    $_SESSION['target'] = rand(0, 15);
    $_SESSION['clicked'] = array();
}

// ボタンがクリックされた場合の処理
if (isset($_POST['button'])) {
    $buttonId = $_POST['button'];

    // すでにクリックされたボタンは無効とする
    if (!in_array($buttonId, $_SESSION['clicked'])) {
        $_SESSION['clicked'][] = $buttonId;

        // あたりを引いた場合の処理
        if ($buttonId == $_SESSION['target']) {
            $message = "GAME OVER!!!";
            $reset = true;
        }
    }
}

// ゲームのリセット
if (isset($_POST['reset'])) {
    session_destroy();
    header("Location: index.php");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>爆弾ゲーム</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <h1>爆弾ゲーム</h1>
    <?php if (isset($message)) : ?>
        <p><?php echo $message; ?></p>
    <?php endif; ?>
    <?php if (isset($reset)) : ?>
        <form method="post">
            <input type="submit" name="reset" value="リセット">
        </form>
    <?php else : ?>
        <p>ボタンをクリックしてください。</p>
        <div class="grid">
            <?php
            // ボタンの表示
            for ($i = 0; $i < 16; $i++) {
                $buttonClass = in_array($i, $_SESSION['clicked']) ? "button clicked" : "button";
                echo "<form method='post'>";
                echo "<input type='submit' class='$buttonClass' name='button' value='$i'>";
                echo "<input type='hidden' name='button' value='$i'>";
                echo "</form>";
            }
            ?>
        </div>
    <?php endif; ?>
    <!-- <button onclick="location"></button> -->
    <a href="setting.php">setting</a>
</body>
</html>
