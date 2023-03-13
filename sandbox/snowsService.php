<?php

$snows = getSnows();
$i =9;

function getSnows(){
    $snowsQuery = 'SELECT * FROM snows';
    require_once './sandbox/dbConnector.php';
    return executeQuerySelect($snowsQuery);

}



