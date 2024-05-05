<?php
require_once 'app/model/ProdukModel.php';

class ProdukController {
    private $model;

    public function __construct() {
        $this->model = new ProdukModel();
    }

    public function index() {
        $products = $this->model->getAllProducts();
        require 'app/view/index.php';
    }

    public function add() {
        require 'app/view/tambah_produk.php';
    }

    public function insert() {
        $this->model->addProduct($_POST['name'], $_POST['price']);
        header('Location: index.php');
    }

    public function edit($id) {
        $product = $this->model->getProductById($id);
        require 'app/view/edit_produk.php';
    }

    public function update() {
        $this->model->updateProduct($_POST['id'], $_POST['name'], $_POST['price']);
        header('Location: index.php');
    }

    public function delete($id) {
        $this->model->deleteProduct($id);
        header('Location: index.php');
    }
}
?>
