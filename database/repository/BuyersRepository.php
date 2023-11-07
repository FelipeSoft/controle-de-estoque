<?php
require_once ("../domain/interfaces/IBuyersRepository.php");
require_once ("../domain/interfaces/IBuyersDataAccessObject.php");
require_once ("../domain/entities/Buyer.php");

final class BuyersRepository implements IBuyersRepository {
    public function __construct(
        private readonly IBuyersDataAccessObject $dao
    ) {}
    
    public function getAllBuyers() {
        $buyers = $this->dao->all();
        $entities = [];
        
        foreach($buyers as $b) {
            $entities[] = new Buyer($b["name"], $b["email"], $b["contact_number"], $b["created_at"], $b["updated_at"], $b["buyer_id"]);
        } 

        return $entities;
    }
}