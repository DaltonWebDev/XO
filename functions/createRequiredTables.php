<?php
function createRequiredTables() {
    global $dbConnection;
    // Posts Table SQL
    $postsSql = "
    CREATE TABLE IF NOT EXISTS posts (
        id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        title VARCHAR(100) NOT NULL,
        content VARCHAR(10000) NOT NULL,
        posted TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
    )
    ";
    // Execute Posts Table SQL
    $dbConnection->query($postsSql);
    return true;
}