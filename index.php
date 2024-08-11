<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cart Feature</title>
</head>
<body>

    <form action="index.php" method="POST">
        <label for="product_name">Product Name</label>
        <input type="text" name="product_name" id="product_name">
        <br /><br />

        <label for="product_price">Product Price</label>
        <input type="number" name="product_price" id="product_price">
        <br /><br />

        <label for="product_type">Product Type</label>
        <select name="product_type" id="product_type">
            <option value="">Select Product Type</option>
            <option value="digital">Digital Product</option>
            <option value="physical">Physical Product</option>
        </select>
        <br /><br />

        <button type="submit">Add to cart</button>

    </form>


    <?php
        require_once 'Classes/Cart.php';
        require_once 'Classes/DigitalProduct.php';
        require_once 'Classes/PhysicalProduct.php';

        $cart = new Cart();

        if ($_SERVER['REQUEST_METHOD'] === "POST") {
            $productName = htmlspecialchars($_POST['product_name']);
            $productPrice = htmlspecialchars($_POST['product_price']);
            $productType = htmlspecialchars($_POST['product_type']);

            if ($productType === 'digital') {
                 // should want create digital product object in here
                $product = new DigitalProduct($productName, $productPrice);
            }
            else {
                $product = new PhysicalProduct($productName, $productPrice);
            }

            $cart->addProduct($product);

        }

        $products = $cart->getProducts();
        foreach ($products as $product) {
            echo "<li>{$product['product_name']} - \${$product['product_price']} {$product['product_type']}</li>";
        }

    ?>

</body>
</html>
