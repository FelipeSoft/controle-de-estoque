<?php

class Product {
    public function __construct(
        public string $name,
        public float $unit_price,
        public float $cost,    
        public int $min_stock,
        public string $category,
        public string $supplier,
        public string $created_at,
        public string $updated_at,
        public int | null $product_id
    ) {}
}