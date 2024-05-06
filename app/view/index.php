<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Produk</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            padding-top: 20px;
        }
        .header-area {
            margin-bottom: 20px;
        }
        .table-responsive {
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header-area">
            <h2>List Produk</h2>
            <br>
            <div class="card text-left">
              <img class="card-img-top" src="holder.js/100px180/" alt="">
              <div class="card-body">
                <h4 class="card-title">Group 7</h4>
                <p class="card-text">Aquilla Adjani Magrid - 2702405452</p>
                <p class="card-text">Ayu Puspita Nurdaliani - 2602292263</p>
                <p class="card-text">Dominikus Yuppi Kurniawan Kristanto - 2702427011</p>
                <p class="card-text">Samuel Evan Theo Yudistria - 2702399670</p>
              </div>
            </div>
            <br>
            <a href="index.php?action=add" class="btn btn-primary">Tambah Produk</a>
        </div>
        <div class="table-responsive">
            <table class="table table-hover">
                <thead class="thead-dark">
                    <tr>
                        <th>ID</th>
                        <th>Nama</th>
                        <th>Harga</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($products as $product): ?>
                    <tr>
                        <td><?php echo $product['id']; ?></td>
                        <td><?php echo $product['name']; ?></td>
                        <td><?php echo 'Rp.' . $product['price']; ?></td>
                        <td>
                            <a href="index.php?action=edit&id=<?php echo $product['id']; ?>" class="btn btn-info">Edit</a>
                            <a href="index.php?action=delete&id=<?php echo $product['id']; ?>" class="btn btn-danger">Hapus</a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>
