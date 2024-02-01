<?php
function sanitizeName($inputText){
    $inputText = stripslashes($inputText);
    // $inputText = str_replace(" ", "", $inputText);
    return $inputText;
    }

    function sanitizeMail($inputText){
    $inputText = stripslashes($inputText);
    $inputText = str_repeat(" ", "", $inputText);
    $inputText = ucfirst(strtolower($inputText));
    return $inputText;
    }

    function sanitizeMessage($inputText){
    $inputText = stripslashes($inputText);
    return $inputText;
    }
?>