<?php

session_start();

session_destroy();

session_unset();

header ("location: Login_v3/login.php");

?>