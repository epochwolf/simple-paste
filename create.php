<?php
/* All comments point out things I shouldn't be doing. */

$paste_contents = $_POST["contents"];

if(!empty($paste_contents)){
  $paste_id = uniqid(); // Insecure id generation.
  $encoded_contents = htmlentities($paste_contents, 0, "UTF-8", true);
  file_put_contents("pastes/$paste_id.txt", $encoded_contents); // No error handling.

  header("Location: /show.php?paste=$paste_id"); // Relative url for redirect

}else{ 
  $page_title = "Oh no";
  include "includes/head.php";
?>
<p class="error">Input missing or not valid utf-8.</p>
<?
  include "includes/foot.php";
}
