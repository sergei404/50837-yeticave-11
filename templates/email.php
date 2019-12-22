<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Email</title>
</head>

<body>
    <h1>Поздравляем с победой</h1>
    <p>Здравствуйте, <?= $itemData['name']?></p>
    <p>Ваша ставка для лота <a href=" ../lot.php/?<?= $itemData['lot_id']?>"> <?= $itemData['caption']?></a> победила.</p>
    <p>Перейдите по ссылке <a href="../bets.php">мои ставки</a>,
        чтобы связаться с автором объявления</p>
    <small>Интернет Аукцион "YetiCave"</small>
</body>

</html>