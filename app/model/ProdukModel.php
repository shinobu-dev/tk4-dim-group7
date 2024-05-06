<?php
require_once 'app/config/database.php';

class ProdukModel {
    public function getAllProducts() {
        global $pdo;
        $stmt = $pdo->query('SELECT * FROM tbl_produk');
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getProductById($id) {
        global $pdo;
        $stmt = $pdo->prepare('SELECT * FROM tbl_produk WHERE id = ?');
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function addProduct($name, $price) {
        global $pdo;
        $stmt = $pdo->prepare('INSERT INTO tbl_produk (name, price) VALUES (?, ?)');
        $stmt->execute([$name, $price]);
    }

    public function updateProduct($id, $name, $price) {
        global $pdo;
        $stmt = $pdo->prepare('UPDATE tbl_produk SET name = ?, price = ? WHERE id = ?');
        $stmt->execute([$name, $price, $id]);
    }

    public function deleteProduct($id) {
        global $pdo;
        $stmt = $pdo->prepare('DELETE FROM tbl_produk WHERE id = ?');
        $stmt->execute([$id]);
    }

    public function solveProductMix() {
        global $pdo;
    
        $stmt = $pdo->query('SELECT id, kapasitas, keuntungan FROM produk');
        $products = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
        $lp = new \LP();
        $lp->setVerbose(\LP::IMPORTANT);
    
        foreach ($products as $product) {
            $lp->addVariable($product['id'], \LP::REAL, $product['kapasitas']);
        }
    
        $lp->setObjective($products, \LP::MAXIMIZE);
    
        $totalKapasitas = $pdo->query('SELECT SUM(kapasitas) AS total_kapasitas FROM produk')->fetch()['total_kapasitas'];
        $lp->addConstraint($totalKapasitas, \LP::LE, 100);
    
        $lp->solve();
    
        return $lp->getVariables();
    }
    
}
?>
