<?php
$token = $_COOKIE["token"];

if(empty($token)){
  $len = 16;
  $strong = TRUE;
  $token = bin2hex(openssl_random_pseudo_bytes($len, $strong));
  setcookie("token", $token);
}

include "includes/head.php" 
?>
<p>A pastebin for plain text. All pastes are given random ids. No formatting will be recognized.</p>
<form action="create.php" method="post">
  <input type="hidden" name="_snowman" value="☃">
  <input type="hidden" name="_token" value="<?=$token ?>">
  <div><textarea name="contents" cols="40" rows="20"></textarea></div>
  <div><input type="submit" value="Create New Paste"></div>
</form>
<? include "includes/foot.php" ?>