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
        $response = $this->queryBuilder->select(['*'])->from('products')->get()->toArray();

        return $response;
    }

    public function getSum()
    {
        $response = $this->queryBuilder->select()->sum('price')
                    ->as('sum')
                    ->from('products')
                    ->get()
                    ->toArray();

        return $response;
    }

    public function addProduct(array $data)
    {
       $result = $this->queryBuilder->insertData('products', $this->fields, $data);
       
       return ($result);
    }

    public function updateProduct(array $data)
    {
        $result = $this->queryBuilder->update('products', ['name', 'price'] ,$data)
                    ->where(['id', '=' , $data['id'] ])
                    //->getSQL()
                    ->execute();
       
       return ($result);
    }

    public function deleteProducts(array $ids)
    {
        foreach ($ids as $id) {
            $id = (int) $id;
            $this->queryBuilder->delete('products')->where(['id', '=', $id])->execute();
        }
       
        return ($result);
    }
}

