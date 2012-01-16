<?php

// ------------------------------------- validation functions ----------------------------------------
// any empty changed to be false
function empty2false($var) {
    if (empty($var))
        return false;
    else
        return $var;
}

?>
