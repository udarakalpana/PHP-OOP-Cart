<?php

interface CartInterface
{
    public function addProduct(object $product): void;

    public function getProducts(): array;
}
