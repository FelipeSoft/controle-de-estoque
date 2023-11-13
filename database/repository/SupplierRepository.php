<?php
require_once ("../domain/interfaces/ISupplierRepository.php");
require_once ("../domain/interfaces/ISupplierDataAccessObject.php");
require_once ("../domain/entities/Stakeholder.php");

final class SupplierRepository implements ISupplierRepository {
    public function __construct(
        private readonly ISupplierDataAccessObject $dao
    ) {}

    public function getAllSuppliers() {
        $suppliers = $this->dao->all();
        $entities = [];
        
        foreach($suppliers as $b) {
            $entities[] = new Stakeholder($b["name"], $b["email"], $b["contact_number"], $b["created_at"], $b["updated_at"], $b["supplier_id"]);
        } 

        return $entities;
    }
}