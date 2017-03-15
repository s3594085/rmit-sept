<?php

//require "/library/layout.php";
include("library/layout.php");

class User {

  function __construct() {
    //$this->login();
  }

  public function login() {
    $layout = new Layout;
    $layout->set_title("Login");
    $layout->display_layout("login");
  }

  public function auth() {
    
  }

  public function noPageFound() {
    echo "This page do not exist!";
  }

}

?>
