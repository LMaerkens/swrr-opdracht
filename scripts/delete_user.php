<?php
$dbPath = __DIR__ . '/../database/database.sqlite';
if (!file_exists($dbPath)) {
    echo "Database not found at: $dbPath\n";
    exit(1);
}

// Get user ID from command line argument
if (empty($argv[1])) {
    echo "Usage: php delete_user.php <user_id>\n";
    echo "Example: php delete_user.php 8\n";
    exit(1);
}

$id = (int) $argv[1];

try {
    $db = new PDO('sqlite:' . $dbPath);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $stmt = $db->prepare('SELECT id, name, email FROM users WHERE id = :id');
    $stmt->execute([':id' => $id]);
    $before = $stmt->fetchAll(PDO::FETCH_ASSOC);

    if (empty($before)) {
        echo "No user found with id $id\n";
        exit(0);
    }

    echo "Before:\n";
    var_export($before);

    $del = $db->prepare('DELETE FROM users WHERE id = :id');
    $del->execute([':id' => $id]);

    $stmt->execute([':id' => $id]);
    $after = $stmt->fetchAll(PDO::FETCH_ASSOC);

    echo "\nAfter:\n";
    var_export($after);

    echo "\nDeleted rows: " . $del->rowCount() . "\n";
} catch (Exception $e) {
    echo "Error: " . $e->getMessage() . "\n";
    exit(1);
}
