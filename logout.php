<?php

session_start();
session_destroy();

setcookie("Username_ict", "", time()-5184000);

//header ("location: index.php");
echo '<script>window.location.href ="index.php";</script>';

?>