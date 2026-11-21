<?php
$data = [
    [
        "id" => 1,
        "name" => "Keyboard",
        "price" => 6000
    ],
    [
        "id" => 2,
        "name" => "Mouse",
        "price" => 5000
    ],
    [
        "id" => 3,
        "name" => "Laptop",
        "price" => 100000
    ]
]
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>

<body>
    <nav class="navbar navbar-expand" style="background-color: cyan;">
        <div class="container">
            <a class="navbar-brand" href="#">Shop</a>
            <div class="navbar-collapse">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="bai1.php">Trang chủ</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <h2>Danh sách sản phẩm</h2>
    <table class="table table-success">
        <thead class="table-dark">
            <tr>
                <?php foreach ($data[0] as $key => $value) : ?>
                    <th><?= $key ?></th>
                <?php endforeach; ?>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($data as $row) : ?>
                <tr>
                    <?php foreach ($row as $key => $value) : ?>
                        <?php if ($key == 'price') : ?>
                            <td><?= number_format($value, 0, ',', '.') ?> đ</td>
                        <?php else : ?>
                            <td><?= $value ?></td>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>

</html>