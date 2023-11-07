<?php

class Product {
    public function __construct(
        private string $name,
        private float $unit_price,
        private float $cost,    
        private int $min_stock,
        private int $category_id,
        private int $supplier_id,
        private string $created_at,
        private string $updated_at,
        private int | null $product_id
    ) {}

    
    public function recoverCreatedAt(): string {
        return $this->created_at;
    }
    
    public function recoverUpdatedAt(): string {
        return $this->updated_at;
    }

    public function recoverProductId(): string {
        return $this->product_id;
    }

    public function recoverName(): string {
        return $this->name;
    }

    public function recoverUnitPrice(): float {
        return $this->unit_price;
    }

    public function recoverCost(): float {
        return $this->cost;
    }

    public function recoverMinStock(): int {
        return $this->min_stock;
    }

    public function changeName(): void {
        $this->name = $name;
    }

    public function changeUnitPrice(string $unit_price): void {
        $this->unit_price = $unit_price;
    }

    public function changeCost(string $cost): void {
        $this->cost = $cost;
    }

    public function changeMinStock(string $min_stock): void {
        $this->min_stock = $min_stock;
    }
}