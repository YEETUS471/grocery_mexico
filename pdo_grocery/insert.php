<?php
require_once 'dbconfig.php';

try {
    $sql = "INSERT INTO grocery_items 
            (product_name, brand_name, category, price_mxn, unit, stock_quantity, is_perishable) 
            VALUES 
            (:product_name, :brand_name, :category, :price_mxn, :unit, :stock_quantity, :is_perishable)";

    $stmt = $pdo->prepare($sql);

    $stmt->execute([
        ':product_name'    => 'Nuevo Producto de Prueba',
        ':brand_name'      => 'Bimbo',
        ':category'        => 'bakery',
        ':price_mxn'       => 29.90,
        ':unit'            => '400g',
        ':stock_quantity'  => 50,
        ':is_perishable'   => 1
    ]);

    echo "Record inserted successfully. Last ID: " . $pdo->lastInsertId();
} catch (PDOException $e) {
    echo "Insert failed: " . $e->getMessage();
}
?>