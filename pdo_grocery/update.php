<?php
require_once 'dbconfig.php';

try {
    $idToUpdate = 1;

    $sql = "UPDATE grocery_items 
            SET price_mxn = :price, stock_quantity = :stock 
            WHERE item_id = :id";

    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        ':price' => 41.00,
        ':stock' => 95,
        ':id'    => $idToUpdate
    ]);

    if ($stmt->rowCount() > 0) {
        echo "Record updated successfully.";
    } else {
        echo "No changes made or ID not found.";
    }
} catch (PDOException $e) {
    echo "Update failed: " . $e->getMessage();
}
?>