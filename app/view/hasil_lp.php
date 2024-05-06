<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hasil Kombinasi Paket Penjualan</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2>Hasil Kombinasi Paket Penjualan</h2>
        <table class="table table-bordered">
            <thead class="thead-dark">
                <tr>
                    <th>ID Produk</th>
                    <th>Kapasitas Produk</th>
                    <th>Keuntungan per Unit</th>
                    <th>Jumlah dalam Paket</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($results as $result): ?>
                    <tr>
                        <td><?= $result['id'] ?></td>
                        <td><?= $result['kapasitas'] ?></td>
                        <td><?= $result['keuntungan'] ?></td>
                        <td><?= $result['jumlah'] ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
