<?php

function navLink($url, $linktext) {
    $current = substr($_SERVER["SCRIPT_NAME"],strrpos($_SERVER["SCRIPT_NAME"],"/")+1);
    if ($url == $current) {
        return '<span class="selected">'.$linktext.'</span>';
    }
    else {
        return '<a href="'.$url.'">'.$linktext.'</a>';
    }
}

?>

<html>
<head> 
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title><?php echo "$name - Alison & Adam's Wedding"; ?></title>
        <link rel="stylesheet" type="text/css" href="style.css" media="all">
</head>
    
    <body>
        <div id="banner"><a href="/"><img src="banner.png" alt="Alison & Adam"></a></div>
        <img id="static/couple" class="bg" src="couple.jpg">
        <img id="static/ithaca" class="bg" src="ithaca.jpg">
        <div id="navigation">
            <ul>
            <?php
                echo "<li>".navLink('index.php', 'Home');
                echo "<li>".navLink('about-us.php', 'About Us');
                echo "<li>".navLink('wedding.php', 'Wedding');
                echo "<li>".navLink('lodging.php', 'Travel & Lodging');
                //echo "<li>".navLink('RSVP.php', 'RSVP');
            ?>
            </ul>
        </div>
        <div id="content">