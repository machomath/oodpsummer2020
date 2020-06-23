<?php
  $current_page_href = basename($_SERVER["PHP_SELF"]);
  $html = '
  <a href="index.php">Home</a>
  <a href="public.php">Public</a>
  <a href="mywall.php">Mywall</a>
  <a href="me.php">Me</a>
  ';
  // to let PHP know that the above string is HTML or part of DOM
  $dom = new DOMDocument();
  $dom->loadHTML($html);
  //what are the tags we want to process
  $anchor_tags = $dom->getElementsByTagName('a');
  //findout rge tag we want to process and the process it
  foreach ($anchor_tags as $tag) {
    if($tag->getAttribute("href") == $current_page_href){
      $tag->setAttribute("class", "this-page");
      $html = $dom->saveHTML();
    }
  }
 ?>
 <nav>
   <?php echo $html; ?>
 </nav>
