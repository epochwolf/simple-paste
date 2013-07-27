<?php
// PARAMS: paste= -- The id of the paste. 
$paste_id = $_GET["paste"];
$error = false;

if(mb_check_encoding($paste_id, "UTF-8") && preg_match('/^[A-Za-z0-9]+$/u', $paste_id)){
  if(file_exists("pastes/$paste_id.txt")){
    $page_title = "$paste_id";
    $contents = file_get_contents("pastes/$paste_id.txt");
  }else{
    $error = "Missing file.";
  }
}else{
  $error = "Invalid paste id.";
}

include "includes/head.php";
?>
<? if(!$error){ ?>
<article id="paste">
<pre>
<?=$contents ?>
</pre>
</article>
<? } else { ?>
<p class="error"><?=$error ?></p>
<?php
}
include "includes/foot.php";