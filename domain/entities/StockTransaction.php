<?php
class StockTransaction {
    private readonly int $current_stock;
    private DateTime $udpated_at; 

    public function __construct(
        public int $stock_transaction_id,
        public DateTime $register_date,
        public string $status,
        public array $buyers_transactions,
        public array $suppliers_transactions,
    ) {
        $this->calculateCurrentStock();
    }

    private function calculateCurrentStock() {
        $total_buyers_transactions = 0;
        $total_suppliers_transactions = 0;

        for($i = 0; $i < sizeof($this->buyers_transactions); $i++) {
            $total_buyers_transactions += $this->buyers_transactions[$i]["quantity"];
        }
    }
}