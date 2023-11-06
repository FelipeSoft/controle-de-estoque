<?php
abstract class Factory {
    private string $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';

    abstract function run(int $times);

    public function randomString(): string {
        $randomString = "";
        for ($i = 0; $i < 10; $i++) {
            $randomString .= $this->characters[rand(0, strlen($this->characters) - 1)];
        }
        return $randomString;
    }

    public function randomFloat($min, $max, int $decimal_places): float {
        $randomFloat = 0;
        $randomDecimal;
        
        for ($k = 0; $k < $decimal_places; $k++) {
            $randomDecimal .= random_int(0, 9);
        }

        $randomFloat = random_int($min, $max) . "." . $randomDecimal;
        return $randomFloat;
    }

    public function randomInt(int $min, int $max): int {
        return random_int($min, $max);
    }
}