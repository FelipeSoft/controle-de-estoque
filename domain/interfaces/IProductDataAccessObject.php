<?php

interface IProductDataAccessObject {
    public function all();
    public function getProductIdByName(string $name);
}