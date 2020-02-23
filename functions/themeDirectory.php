<?php
function themeDirectory() {
    global $config;
    return "content/themes/" . $config["theme"] . "/";
}