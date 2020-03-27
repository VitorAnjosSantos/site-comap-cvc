<?php

$getParam = filter_input(INPUT_GET, "file", FILTER_DEFAULT);
     

function InputHeaders($FILENAME, $FILEPATH){

    header ("Content-type: application/xsl");
    header ("Content-Disposition: attachment; filename={$FILENAME}");
    readfile($FILEPATH);

}

if(isset($getParam)){
    $FILENAME = $_GET["file"];
    $FILEPATH = "D:/".$FILENAME;
    InputHeaders($FILENAME,$FILEPATH);
 };

