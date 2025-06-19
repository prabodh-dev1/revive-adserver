<?php
// Redirect to Revive AdServer installation
$reviveAdServerPath = '/src/revive-adserver-5.5.2/www/admin/install.php';

// Check if Revive AdServer installation exists
if (file_exists(__DIR__ . $reviveAdServerPath)) {
    // If it's an installation request, redirect to the installer
    header('Location: ' . $reviveAdServerPath);
    exit;
} else {
    // Fallback - show system information
    echo "<h1>Revive AdServer Setup</h1>";
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
    
    echo "<p><strong>Revive AdServer installation files not found at:</strong> " . htmlspecialchars(__DIR__ . $reviveAdServerPath) . "</p>";
    echo "<p>Please ensure the Revive AdServer files are properly extracted to the src/revive-adserver-5.5.2/ directory.</p>";
}
?> 