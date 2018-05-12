<?php
include('../config/config.php');
session_start();
unset($_SESSION['username']);
header("Location: ".$basedir);
?>