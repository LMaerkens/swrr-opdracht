<?php
header('Content-Type: application/json');
try {
    // Prefer SQLite (used by the app). Fall back to MySQL if SQLite file missing.
    $sqlite = __DIR__ . '/../database/database.sqlite';
    if (file_exists($sqlite)) {
        $dsn = 'sqlite:' . $sqlite;
        $pdo = new PDO($dsn, null, null, [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_TIMEOUT => 5,
        ]);
    } else {
        $host = '127.0.0.1';
        $port = 3306;
        $db   = 'laravel';
        $user = 'root';
        $pass = '';
        $dsn = "mysql:host={$host};port={$port};dbname={$db};charset=utf8mb4";
        $pdo = new PDO($dsn, $user, $pass, [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_TIMEOUT => 5,
        ]);
    }

    $stmt = $pdo->query("SELECT id, name, email, created_at FROM users LIMIT 50");
    $rows = $stmt->fetchAll();
    echo json_encode(['ok' => true, 'count' => count($rows), 'users' => $rows]);
} catch (Exception $e) {
    http_response_code(500);
    echo json_encode(['ok' => false, 'error' => $e->getMessage()]);
}
