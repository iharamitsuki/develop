<!DOCTYPE html>
<html>
<head>
    <title>爆弾ゲーム</title>
    <style>
        .grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 10px;
            max-width: 400px;
            margin: 0 auto;
        }
        
        .grid button {
            width: 100%;
            height: 100px;
            background-color: lightblue;
            background-size: cover;
            border: none;
            outline: none;
        }
    </style>
</head>
<body>
    <div class="grid">
        <button></button>
        <?php
        // 4x4のグリッドを生成
        for ($i = 0; $i < 4; $i++) {
            for ($j = 0; $j < 4; $j++) {
                echo '<button></button>';
            }
        }
        ?>
    </div>
</body>
</html>
