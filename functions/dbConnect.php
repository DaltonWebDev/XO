<?php
function dbConnect() {
    global $config;
    $dbConnection = new mysqli($config["database"]["host"], $config["database"]["user"], $config["database"]["password"], $config["database"]["name"]);
    // Connection Failed (Debugging is Enabled)
    if ($dbConnection->connect_error && $config["debugging"]) {
        return $dbConnection->connect_error;
    } 
    // Connection Failed (Debugging is Disabled)
    else if ($dbConnection->connect_error) {
        return false;
    } 
    // Connection Successful
    else {
        return $dbConnection;
    }
}