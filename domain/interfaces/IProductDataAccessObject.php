<?php

interface IProductDataAccessObject {
    public function all();
    public function count();
    public function remove($id);
}