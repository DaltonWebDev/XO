<?php
function showPosts($limit) {
    global $dbConnection;
    try {
        $stmt = $dbConnection->prepare("SELECT * FROM posts LIMIT ?");
        $stmt->bind_param("i", $limit);
        $stmt->execute();
        $res = $stmt->get_result();
        $data = $res->fetch_all(MYSQLI_ASSOC);
        $stmt->close();
        return $data;
    } catch (Exception $error) {
        return false;
    }
}