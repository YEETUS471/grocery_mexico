<?php
require_once 'dbconfig.php';

try {
    $stmt = $pdo->query("SELECT * FROM grocery_items LIMIT 10");

    echo "<pre>";
    while ($row = $stmt->fetch()) {
        print_r($row);
        echo "-------------------\n";
    }
    echo "</pre>";
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>