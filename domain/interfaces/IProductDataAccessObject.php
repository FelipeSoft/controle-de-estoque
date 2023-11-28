<?php

interface IProductDataAccessObject {
    public function all();
    public function count();
    public function remove($id);
    public function edit(array $info);
    public function get($id);
}