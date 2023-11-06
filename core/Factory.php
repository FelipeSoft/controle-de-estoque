<?php
abstract class Factory {
    private string $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    protected array $tables_pk_array;

    abstract public function run(int $times);
    abstract public function rollback();

    protected function randomString(): string {
        $randomString = "";
        for ($i = 0; $i < 10; $i++) {
            $randomString .= $this->characters[rand(0, strlen($this->characters) - 1)];
        }
        return $randomString;
    }

    protected function randomEmail(): string {
        $randomString = "";
        for ($i = 0; $i < 15; $i++) {
            $randomString .= $this->characters[rand(0, strlen($this->characters) - 1)];
        }

        return $randomString . "@domain.com";
    }

    protected function randomFloat($min, $max, int $decimal_places): float {
        $randomFloat = 0;
        $randomDecimal = 0;
        
        for ($k = 0; $k < $decimal_places; $k++) {
            $randomDecimal .= random_int(0, 9);
        }

        $randomFloat = random_int($min, $max) . "." . substr($randomDecimal, 1);
        return $randomFloat;
    }

    protected function randomInt(int $min, int $max): int {
        return random_int($min, $max);
    }
}