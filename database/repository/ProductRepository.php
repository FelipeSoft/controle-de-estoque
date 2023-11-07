<?php
require_once ("../domain/interfaces/IProductRepository.php");
require_once ("../domain/interfaces/IProductDataAccessObject.php");
require_once ("../domain/entities/Product.php");

final class ProductRepository implements IProductRepository {
    public function __construct(
        private readonly IProductDataAccessObject $dao
    ) {}

    public function getAllProducts(){
        $products = $this->dao->all();
        $data = [];

        foreach($products as $product) {
            $p = new Product(
                $product["name"],
                $product["unit_price"],
                $product["cost"],
                $product["min_stock"],
                $product["category_id"],
                $product["supplier_id"],
                $product["created_at"],
                $product["updated_at"],
                $product["product_id"],
            );

            $data[] = $p;
        }        

        return $data;
    }
}