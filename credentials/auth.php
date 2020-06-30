<?php
session_start();
if(!isset($_SESSION["user"])){
header("Location: ../credentials/index.php");
exit(); }
?>