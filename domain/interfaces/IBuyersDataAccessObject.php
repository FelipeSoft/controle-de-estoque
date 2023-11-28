<?php

interface IBuyersDataAccessObject {
    public function all();
    public function save(array $buyer);
    public function remove($id);
    public function edit(array $info);
    public function get($id);
}