<?php

require "./sandbox/snowsService.php";

function Snows(){
    $snows = getSnows();
    require "view/snows.php";
}
