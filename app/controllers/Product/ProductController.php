<?php
session_start();

require_once("../../domain/interfaces/IUseCase.php");
require_once("../../core/View.php");

final class ProductController extends Controller {
    public function __construct(
        private readonly IUseCase $usecase,
    ) {}

    public function handle() {
        $name = filter_input(INPUT_POST, "product_name", FILTER_SANITIZE_SPECIAL_CHARS);
        $cost = filter_input(INPUT_POST, "product_cost", FILTER_SANITIZE_SPECIAL_CHARS);
        $price = filter_input(INPUT_POST, "product_price", FILTER_SANITIZE_SPECIAL_CHARS);
        $category = filter_input(INPUT_POST, "product_category", FILTER_SANITIZE_SPECIAL_CHARS);
        $min_stock = filter_input(INPUT_POST, "product_min_stock", FILTER_SANITIZE_SPECIAL_CHARS);
        $supplier = filter_input(INPUT_POST, "product_supplier", FILTER_SANITIZE_SPECIAL_CHARS);
    
        if ($name && $cost && $price && $category && $min_stock && $supplier) {
            $attempt = $this->usecase->execute([
                "name" => $name,
                "cost" => $cost,
                "unit_price"=> $price,
                "category"=> $category,
                "min_stock"=> $min_stock,
                "supplier"=> $supplier
            ]);

            if ($attempt) {
                
            }
        }
    }
}