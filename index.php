<?php

require_once __DIR__ . '/functions.php';

$pets = get_all_info();
?>


<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Animals</title>
</head>

<body>
    <div class="pets">
        <header class="page_header">
            <style>
                body {
                    margin-left: 20px;
                    margin-right: 150px;
                    padding: 0;
                }

                ul {
                    list-style-type: none;
                }

                h2 {
                    margin-left: 35px;
                }

                p.box {
                    border-bottom: 1px solid black;
                }
            </style>
            <h2>本日のご紹介ペット！</h2>
        </header>
        <div class="all_info">
            <ul>
                <?php foreach ($pets as $pet) : ?>
                    <li><?= h($pet['type']) . 'の' . h($pet['classification']) . 'ちゃん' ?></li>
                    <li><?= h($pet['description']) ?></li>
                    <li><?= h($pet['birthday']) . '生まれ' ?></li>
                    <li><?= '出生地 ' . h($pet['birthplace']) ?></li>
                    <p class="box"> </p>
                <?php endforeach; ?>
            </ul>
        </div>
    </div>
</body>

</html>
