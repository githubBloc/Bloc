<?php

$NewName = "../../uploads/NotFree";
$OldName = "../../uploads/Free";

echo file_exists($OldName);

rename($OldName, $NewName);



?>