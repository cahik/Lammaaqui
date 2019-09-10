<?php
session_start();

session_destroy();

header("Location: /Lammaaqui/index.php");

?>