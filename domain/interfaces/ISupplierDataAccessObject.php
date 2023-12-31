<?php
interface ISupplierDataAccessObject {
    public function all();
    public function getAvailableSuppliers();
    public function save(array $supplier);
    public function remove($id);
    public function edit(array $info);
    public function get($id);
}