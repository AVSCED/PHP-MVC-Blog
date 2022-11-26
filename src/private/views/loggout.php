<?php
session_start();
//destroying session to loggout user
session_unset();
session_destroy();
header("Location:./homePage.php");
?>