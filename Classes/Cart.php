<?php

require_once 'Interfaces/CartInterface.php';
require_once 'Config/Database.php';
class Cart implements CartInterface
{
    private mysqli $dbConnection;

    public function __construct()
    {
        $this->dbConnection = Database::getInstance()->getConnection();
    }

    public function addProduct(object $product): void
    {
        $product->save();
    }

    public function getProducts(): array
    {
        $result = $this->dbConnection->query("SELECT * FROM product");
        return $result->fetch_all(MYSQLI_ASSOC);
    }
}
