<?php

abstract class Product {

    protected string $productName;
    protected float $productPrice;
    protected string $productType;

    public function __construct(string $productName, float $productPrice)
    {
        $this->productName = $productName;
        $this->productPrice = $productPrice;
    }

    abstract public function save();

}