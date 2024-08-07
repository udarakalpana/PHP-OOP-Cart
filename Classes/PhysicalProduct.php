<?php
require_once 'Config/Database.php';
require_once 'Product.php';
class PhysicalProduct extends Product
{
    public function __construct(string $productName, float $productPrice)
    {
        parent::__construct($productName, $productPrice);
        $this->productType = 'physical';
    }

    public function save(): void
    {
        $dbConnection = Database::getInstance()->getConnection();
        $query = $dbConnection
            ->prepare("INSERT INTO product (product_name, product_price, product_type) VALUES (?, ?, ?)");
        $query->bind_param('sds', $this->productName, $this->productPrice, $this->productType);
        $query->execute();
    }
}
