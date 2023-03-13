<?php

require "./model/snowsService.php";

function snows(){
    $snows = getSnows();
    require "view/snows.php";
}

function snow($code)
{
    $snows = getSnow($code);
    $snow = $snows[0];
    require "view/snow.php";
}