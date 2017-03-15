<?php

//absolute path of this directory being define as 'BASEPATH'
define("BASEPATH", dirname(__FILE__));

/*
    slash link by '/' using explode() and turn into array
    rtrim make sure there is no empty value being stored as an array data
*/
$url = explode('/', rtrim($_GET['url'], '/'));

/*
  Uncomment print_r() to check array value
*/
//print_r($url);

/*
  Import controller
*/
require "controller/" . $url[0] . ".php";

/*
  Call controller classes
*/
$control = new $url[0];

/*
  Check if there is function / method from class
  For example : www.example.com/class/method/value
*/

if (isset($url[1])) {
  $control->{$url[1]}();
} else {
  $control->noPageFound();
}



?>
