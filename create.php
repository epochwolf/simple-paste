<?php
$paste_contents = $_POST["contents"];

if(!empty($paste_contents) && mb_check_encoding($paste_contents, "UTF-8") && $_COOKIE["token"] === $_POST["_token"]){
  $len = 16;
  $strong = TRUE;
  $paste_id = bin2hex(openssl_random_pseudo_bytes($len, $strong));
  $encoded_contents = htmlentities($paste_contents, 0, "UTF-8", true);
  file_put_contents("pastes/$paste_id.txt", $encoded_contents); // No error handling.

  header("Location: http://${_SERVER['HTTP_HOST']}/show.php?paste=$paste_id");

}else{ 
  $page_title = "Oh no";
  include "includes/head.php";
?>
<p class="error">Input missing or not valid utf-8.</p>
<?
  include "includes/foot.php";
}
