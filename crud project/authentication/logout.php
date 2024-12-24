<?php
session_start();
session_unset();
session destroy();
header("location: login.html")
exit;
?>