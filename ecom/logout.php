<?php
session_start();
session_destroy();

echo "<script>alert('You can always shop by signing back in!')</script>";
echo "<script>window.open('index.php','_self')</script>";
?>