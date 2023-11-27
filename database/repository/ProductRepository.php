<?php
require_once (dirname(__FILE__) . "../../../domain/interfaces/IProductRepository.php");
require_once (dirname(__FILE__) . "../../../domain/interfaces/IProductDataAccessObject.php");
require_once (dirname(__FILE__) . "../../../domain/entities/Product.php");

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
                $product["category_name"],
                $product["supplier_name"],
                $product["created_at"],
                $product["updated_at"],
                $product["product_id"],
            );

            $data[] = [
                "product" => $p,
                "current_stock" => $product["current_stock"]
            ];
        }        

        return $data;
    }
}