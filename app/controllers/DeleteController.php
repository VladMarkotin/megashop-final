<?php
namespace App\Controllers;


use App\Models\ProductModel as ProductModel;

class DeleteController extends Controller
{
    private $productModel = null;

    public function __construct(ProductModel $productModel)
    {
        $this->productModel = $productModel;
    }

    public function index()
    {
        $ids = ($_POST['ids']) ? $_POST['ids'] : '';
        if (is_array($ids) ) {
            $this->productModel->deleteProducts($ids);
        }
    }
}