<?php
// Software Constants
define("XO_VERSION", "0.0.1-beta");
// Software Config
require_once "config.php";
// Debugging Is Enabled, Show PHP Errors
if ($config["debugging"]) {
    ini_set("display_startup_errors", 1);
    ini_set("display_errors", 1);
    error_reporting(-1);
}
// Functions To Require
$functions = [
    "request",
    "dbConnect",
    "createRequiredTables",
    "dbInsert",
    "showPosts",
    "themeDirectory"
];
// Loop Through Array And Require Functions
foreach ($functions as $function) {
    require_once "functions/$function.php";
}
// Initiate Database Connection
$dbConnection = dbConnect();
// Create Required Tables
createRequiredTables();
// Loop Through Plugins And Require Them
foreach ($config["plugins"] as $key => $value) {
    // Only Require Plugins That Are Enabled
    if ($value) {
        require_once "content/plugins/$key/$key.php";
    }
}
// API Call
if (isset($_REQUEST["api"]) && $_REQUEST["api"] === "true") {
    echo "API CALL";
}
// Not an API call 
else {
    // Get Page
    $page = !empty($_GET["page"]) ? strtolower(ltrim($_GET["page"], "/")) : false;
    // Explode Page
    $pageExploded = explode("/", $page);
    // No page set, show homepage
    if ($page === false) {
        require_once "content/themes/" . $config["theme"] . "/index.php";
    } 
    // Admin page
    else if ($pageExploded[0] === "admin") {
        require_once "content/admin/index.php";
    } 
    // Custom page
    else if (file_exists("content/themes/". $config["theme"] . "/" . $pageExploded[0] . ".php")) {
        require_once "content/themes/" . $config["theme"] . "/" . $pageExploded[0] . ".php";
    }
    // 404
    else {
       require_once "content/themes/" . $config["theme"] . "/404.php";
    }
}