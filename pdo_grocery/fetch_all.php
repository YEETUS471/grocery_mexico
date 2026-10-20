<?php
require_once 'dbconfig.php';

try {
    $stmt = $pdo->query("SELECT * FROM grocery_items LIMIT 20");
    $rows = $stmt->fetchAll();

    echo "<pre>";
    print_r($rows);
    echo "</pre>";
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>