<?php
require_once 'dbconfig.php';

try {
    $stmt = $pdo->query("SELECT item_id, product_name, brand_name, category, price_mxn, unit, stock_quantity 
                         FROM grocery_items 
                         ORDER BY brand_name, product_name 
                         LIMIT 50");

    echo "<h2>Mexican Grocery Items</h2>";
    echo "<table border='1' cellpadding='8' cellspacing='0' style='border-collapse: collapse; font-family: Arial;'>";
    echo "<thead style='background:#2c3e50; color:white;'>
            <tr>
                <th>ID</th>
                <th>Product</th>
                <th>Brand</th>
                <th>Category</th>
                <th>Price (MXN)</th>
                <th>Unit</th>
                <th>Stock</th>
            </tr>
          </thead>";
    echo "<tbody>";

    while ($row = $stmt->fetch()) {
        echo "<tr>
                <td>{$row['item_id']}</td>
                <td>{$row['product_name']}</td>
                <td>{$row['brand_name']}</td>
                <td>{$row['category']}</td>
                <td>\${$row['price_mxn']}</td>
                <td>{$row['unit']}</td>
                <td>{$row['stock_quantity']}</td>
              </tr>";
    }

    echo "</tbody></table>";
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>