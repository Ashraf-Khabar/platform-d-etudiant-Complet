<?php

    $dbservername = "localhost";
    $dbusername = "root";
    $dbpassword = "";
    $dbname = "ensatLoginSystem" ; 

    $connex = mysqli_connect ($dbservername,$dbusername,$dbpassword,$dbname) ;

    if (!$connex)
    {
        die("connexion failed:".mysqli_connect_error()) ; 
    }