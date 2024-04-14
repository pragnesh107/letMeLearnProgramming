<?php
session_start();
session_destroy();
header("location: http://localhost/Programming_Blog/index.php");
?>