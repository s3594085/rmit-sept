<?php

class Layout {

  //title of page
  private $page_title = null;

  public function set_title($title) {
    $this->page_title = $title;
  }

  public function display_layout($page) {
    $page_logo = "https://static1.squarespace.com/static/536c52bee4b0f62cfc1b78f2/536c5e81e4b09724c1080aee/555e65c5e4b0777b1da606c4/1432249798096/blank+logo.png";
    $logo_width = "150px";
    $logo_height = "100px";

    require "html/header.php";          //Page Header
    require "html/" . $page . ".php";
    require "html/footer.php";
  }

}


?>
