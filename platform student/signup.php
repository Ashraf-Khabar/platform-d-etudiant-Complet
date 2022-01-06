
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
</head>
      
<body>
    <main>
        <center>
            <p class="signup" >Signup</p>
            <?php
                
                if (isset($_GET['error']))
                {
                    if ($_GET['error'] == "emptyfields")
                    {
                        echo '<h5 classe="signuperror">Vous Devez Remplire Tout Les Champs!</h5>';
                    }
                    else if ($_GET['error']="invalideMail")
                    {
                        
                        echo '<h5 classe="signuperror">Vous Devez Entrer Un Email Juste!</h5>';
                    }
                    else if ($_GET['error']="invalideMail&Name")
                    {
                        echo '<h5 classe="signuperror">Vous Devez Entrer Un Email Juste Ou Un Nom Juste!</h5>';
                    }
                    else if ($_GET['error']="invalideName")
                    {
                        echo '<h5 classe="signuperror">Vous Devez Entrer Nom Juste!</h5>';
                    }
                    else if ($_GET['error']="passwordCheck")
                    {
                        echo '<h5 classe="signuperror">Les Deuc Mots De Passe Ne Sont Pas Egaux!</h5>';
                    }
                    else if ($_GET['error']="CNE%20taken")
                    {
                        echo '<h5 Ce CNE Est Deja Existant!</h5>';
                    }
                    
                }
            ?>
            <form classe="signup" action="include/signup-inc.php" method="POST" > <br><br>
                <input type="text" name ="Name" placeholder="Student first Name"> <br><br>
                <input type="text" name ="lastName" placeholder="Student last Name"> <br><br>
                <input type="text" name ="CNE" placeholder="Student CNE"> <br><br>
                <input type="text" name ="email" placeholder="Student Email"> <br><br>
                <input type="password" name ="password" placeholder="Student Password"> <br><br>
                <input type="password" name ="password-repeat" placeholder="Repeat Password"> <br><br>

                <input class="signup"  type="submit" name="signup-botton" value="Signup">
                <br><br>
            </form>
            <form classe="signup" action="index.php" method="POST" value="Back">
                <input class="signup"  type="submit" name="back-botton" value="Back">
            </form>

        </center>
        
    </main>
</body>
</html>