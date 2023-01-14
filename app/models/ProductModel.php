<?php

namespace App\Models;


class ProductModel extends Model
{
    protected $fields = ['name', 'price'];
    protected $sqlBuilder = null;
    
    public function __construct()
    {
        parent::__construct();
    }

    public function getProducts()
    {
        $query = "SELECT * FROM products";
        $stmt = $this->pdo->query($query);
        $response = $stmt->fetchAll(\PDO::FETCH_ASSOC);

        return $response;
    }

    public function getProducts2()
    {
        $response = $this->queryBuilder->select('products', ['*'])->get()->toArray();

        return $response;
    }

    public function addProduct(array $data)
    {
       $result = $this->queryBuilder->insertData('products', $this->fields, $data);
       
       return ($result);
    }
}

