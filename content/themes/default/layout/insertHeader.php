<?php
function insertHeader($title = false) {
    global $config;
    if ($title === false) {
        $titleString = $config["site"]["name"];
    } else {
        $titleString = $config["site"]["name"] . " / $title";
    }
    echo '<!DOCTYPE html>
    <html>
	    <head>
		    <meta charset="UTF-8">
		    <meta name="viewport" content="width=device-width, user-scalable=no">
            <title>' . $titleString . '</title>
            <meta name="description" content="' . $config["site"]["description"] . '">
            <link href="' . themeDirectory() . 'style.css" rel="stylesheet">
	    </head>
	    <body>
            <header>
                <h1>' . $config["site"]["name"] . '</h1>
            </header>
            <main>
    ';
}