<?php
function connect_db() {
    $cn = new mysqli("localhost", "root", "", "vuanemdb");
    if($cn->connect_errno) {
        echo $cn->connect_error;
        exit();
    }
    return $cn;
}
?>