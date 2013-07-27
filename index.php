<?php
$token = $_COOKIE["token"];

if(empty($token)){
  $token = uniqid();
  setcookie("token", $token);
}

include "includes/head.php" 
?>
<form action="create.php" method="post">
  <input type="hidden" name="_snowman" value="☃">
  <input type="hidden" name="_token" value="<?=$token ?>">
  <div><textarea name="contents" cols="40" rows="20"></textarea></div>
  <div><input type="submit" value="Create New Paste"></div>
</form>
<p>All pastes are given random ids.</p>
<? include "includes/foot.php" ?>