<?php

interface IProductDataAccessObject {
    public function getProductIdByName(string $name);
}