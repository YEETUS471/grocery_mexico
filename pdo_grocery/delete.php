<?php
require_once 'dbconfig.php';

try {
    $idToDelete = 101;

    $stmt = $pdo->prepare("DELETE FROM grocery_items WHERE item_id = :id");
    $stmt->execute([':id' => $idToDelete]);

    if ($stmt->rowCount() > 0) {
        echo "Record with ID $idToDelete deleted successfully.";
    } else {
        echo "No record found with that ID.";
    }
} catch (PDOException $e) {
    echo "Delete failed: " . $e->getMessage();
}
?>