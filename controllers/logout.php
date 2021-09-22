<?php

include_once("../config/variables.php");
session_start();
session_unset();
session_destroy();

header("Location: " . $host . "/home.php");
?>