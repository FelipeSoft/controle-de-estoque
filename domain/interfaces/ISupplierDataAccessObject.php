<?php
interface ISupplierDataAccessObject {
    public function all();
    public function getAvailableSuppliers();
    public function save(array $supplier);
    public function remove($id);
}