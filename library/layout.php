<?php

class Layout {

  //title of page
  private $page_title = null;

  public function set_title($title) {
    $this->page_title = $title;
  }

  public function display_layout($page) {
    require "html/header.php";
    require "html/" . $page . ".php";
    require "html/footer.php";
  }

}


?>
