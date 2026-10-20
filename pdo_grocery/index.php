<?php
require_once 'dbconfig.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Mexican Grocery Management</title>
    <style>
        body { 
            font-family: Arial, sans-serif; 
            margin: 40px; 
            background: #f5f5f5; 
        }
        h1 { 
            color: #2c3e50; 
        }
        table { 
            border-collapse: collapse; 
            width: 100%; 
            background: white; 
            margin-bottom: 30px; 
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        }
        th, td { 
            border: 1px solid #ddd; 
            padding: 12px; 
            text-align: left; 
        }
        th { 
            background: #2c3e50; 
            color: white; 
        }
        tr:nth-child(even) { 
            background: #f9f9f9; 
        }
        .menu a {
            display: inline-block;
            margin-right: 15px;
            padding: 12px 20px;
            background: #3498db;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            font-weight: bold;
        }
        .menu a:hover { 
            background: #2980b9; 
        }
        .menu a.insert { background: #27ae60; }
        .menu a.insert:hover { background: #219653; }
        .menu a.update { background: #f39c12; }
        .menu a.update:hover { background: #e67e22; }
        .menu a.delete { background: #e74c3c; }
        .menu a.delete:hover { background: #c0392b; }
    </style>
</head>
<body>

    <h1>Mexican Grocery Items</h1>

    <div class="menu">
        <a href="insert.php" class="insert">Insert New Item</a>
        <a href="update.php" class="update">Update Item</a>
        <a href="delete.php" class="delete">Delete Item</a>
    </div>

    <br><br>

    <?php
    try {
        $stmt = $pdo->query("SELECT * FROM grocery_items ORDER BY item_id DESC LIMIT 50");
        
        echo "<table>
                <tr>
                    <th>ID</th>
                    <th>Product Name</th>
                    <th>Brand</th>
                    <th>Category</th>
                    <th>Price (MXN)</th>
                    <th>Unit</th>
                    <th>Stock</th>
                    <th>Perishable</th>
                </tr>";

        while ($row = $stmt->fetch()) {
            echo "<tr>
                    <td>" . $row['item_id'] . "</td>
                    <td>" . $row['product_name'] . "</td>
                    <td>" . $row['brand_name'] . "</td>
                    <td>" . $row['category'] . "</td>
                    <td>$" . $row['price_mxn'] . "</td>
                    <td>" . $row['unit'] . "</td>
                    <td>" . $row['stock_quantity'] . "</td>
                    <td>" . ($row['is_perishable'] ? 'Yes' : 'No') . "</td>
                  </tr>";
        }
        echo "</table>";

    } catch (PDOException $e) {
        echo "<p style='color:red;'>Error: " . $e->getMessage() . "</p>";
    }
    ?>

</body>
</html>