<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <style>
        h5 {
        color: red ;
        }
    </style>
    <title>Document</title>
    <title>Document</title>
</head>
        <center>
                <?php
                     if (isset($_GET['error'])) 
                     {
                        if($_GET['error'] == "emptyfields")
                        {
                            echo '<h5 classe="signuperror">Vous Devez Remplire Tout Les Champs!</h5>';
                        
                        }
                        else if ($_GET['error'] == "wrongpassword")
                        {
                            echo '<h5 classe="signuperror">Mot De Passe Est Faut!</h5>';
                        }
                        else if ($_GET['error'] == "nostudent")
                        {
                            echo '<h5 classe="signuperror">Cet Etudiant N existe Pas!!</h5>';
                        }
                        
                     }
                ?>
        </center>
        <center>
                <form action="include/login-inc.php" method="POST" >
                    <p class="name" >E-mail d'étulisateur</p>
                    <input type="text" name="nomEtulisateur"> <br>
                    <p class="mp">Mot de passe</p>
                    <input type="password" name="motDePasse"> <br><br><br>

                    <input class="register"  type="submit" name="log_in" value="Log In">
                </form>

                <form action="signup.php">
                    <br>
                    <input class="connexion"  type="submit" name="Sign_Up" value="Sign Up">
                </form>

                
        </center> 
<body>
