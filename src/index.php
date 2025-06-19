<?php
echo "<h1>Welcome to PHP 8.4 with Apache!</h1>";
echo "<p>PHP Version: " . phpversion() . "</p>";
echo "<p>Server Software: " . $_SERVER['SERVER_SOFTWARE'] . "</p>";

// Test PostgreSQL connection
try {
    $pdo = new PDO('pgsql:host=db;port=5432;dbname=myapp', 'postgres', 'password');
    echo "<p style='color: green;'>✅ PostgreSQL connection successful!</p>";
    
    // Get PostgreSQL version
    $stmt = $pdo->query('SELECT version()');
    $version = $stmt->fetchColumn();
    echo "<p>PostgreSQL Version: " . htmlspecialchars($version) . "</p>";
    
} catch (PDOException $e) {
    echo "<p style='color: red;'>❌ PostgreSQL connection failed: " . htmlspecialchars($e->getMessage()) . "</p>";
}

phpinfo();
?> 