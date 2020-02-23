<?php
function dbInsert($tableName, $data) {
    global $dbConnection;
    // Define Keys Array
    $keysArray = [];
    // Define Values Array
    $valuesArray = [];
    // Define Types Array
    $typesArray = [];
    // Define Question Marks Array
    $questionMarksArray = [];
    // Populate Arrays
    foreach ($data as $key => $value) {
        // Populate Keys Array
        $keysArray[] = $key;
        // Populate Values Array
        $valuesArray[] = $value;
        // Populate Types Array
        if (is_int($value)) {
            $typesArray[] = "i";
        } else {
            $typesArray[] = "s";
        }
        // Populate Question Marks Array
        $questionMarksArray[] = "?";
    }
    $keysString = implode(",", $keysArray);
    $typesString = implode("", $typesArray);
    $questionMarksString = implode(",", $questionMarksArray);
    try {
        $stmt = $dbConnection->prepare("INSERT INTO $tableName ($keysString) VALUES ($questionMarksString)");
        $stmt->bind_param($typesString, ...$valuesArray);
        $stmt->execute();
        $stmt->close();
        return [
            "sql_query" => "INSERT INTO $tableName ($keysString) VALUES ($questionMarksString)",
            "key_types" => $typesArray
        ];
    } catch (Exception $error) {
        return false;
    }
}