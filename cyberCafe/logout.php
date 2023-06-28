<?php
/* Start the session */
if(!session_id()){ session_start(); }
/* remove all session variables */
session_unset(); 
/* destroy the session */
session_destroy();
include 'config.php';
header("Location:".$base_url); exit;
?>