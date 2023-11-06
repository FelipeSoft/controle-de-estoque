<?php
session_start();

require_once("../../domain/interfaces/IUseCase.php");
require_once("../../core/View.php");

final class TransactionController extends Controller{
    public function __construct(
        private readonly IUseCase $usecase,
    ) {}

    public function handle() {
        $product = filter_input(INPUT_POST, "transaction_product", FILTER_SANITIZE_SPECIAL_CHARS);
        $type = filter_input(INPUT_POST, "transaction_type", FILTER_SANITIZE_SPECIAL_CHARS);
        $origin = filter_input(INPUT_POST, "transaction_origin", FILTER_SANITIZE_SPECIAL_CHARS);

        if ($product && $type && $origin) {
            
        }
    }
}