<?php
    session_start(); // start the session 
    session_unset(); // take all the variables we created when we loged in and deelate all the values inside these sessions variables 
    session_destroy() ; // destroy the sessions runing in the website 
    header("Location:../index.php");
?>