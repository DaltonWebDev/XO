<?php
// Define config array
$config = [];
// Enable script debugging
$config["debugging"] = true;
// Database credentials
$config["database"] = [
    "host" => "localhost",
    "user" => "root",
    "password" => "root",
    "name" => "blog"
];
// Site info
$config["site"] = [
    "name" => "Dalton's Blog",
    "description" => "This is a description."
];
// Current theme
$config["theme"] = "default";
// Plugins
$config["plugins"] = [
    "hello-world" => false
];