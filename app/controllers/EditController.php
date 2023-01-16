<?php
namespace App\Controllers;


use App\Models\ProductModel as ProductModel;

class EditController extends Controller
{
    private $productModel = null;

    public function __construct(ProductModel $productModel)
    {
        $this->productModel = $productModel;
    }

    public function index()
    {
        $data['id'] = (int)$_POST['id'];
        $data['name'] = $_POST['newName'];
        $data['price'] = (float) $_POST['newPrice'];
        //die(var_dump($data));
        $this->productModel->updateProduct($data);
    }
}