<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style1.css">

    <title>Document</title>
</head>
<body>
        <center>

        <header>
                    <ul>
                        <li> <a href="table.php">Student Informations</a></li>
                        <li> <a href="tablefiles/semester1.php">Semester 1</a></li>
                        <li> <a href="tablefiles/semester2.php">Semester 2</a></li>
                        <li> <a href="tablefiles/semester3.php">Semester 3</a></li>
                        <li> <a href="tablefiles/semester4.php">Semester 4</a></li>
                        <li> <a href="include/logout-inc.php">Deconnexion</a></li>
                        <br><br><br>
                    </ul>
        </header>
        </center>
            
                    
                    <center>
                        <h2 class="header_bonjour">
                            Bonjour Monsieur 
                            <span style="color:black;"> 

                                        <?php
                                            echo $_SESSION['last-name']." ".$_SESSION['first-name'];
                                        ?>
                            </span>
                        </h2>
        </center>
        
        <center>
            <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
            <div class="table-wrapper" >
                <table class="fl-table">
                                        <tr>
                                            <th>Nom</th>
                                            <th>Prenom</th>
                                            <th>CNE</th>
                                            <th>Email</th>
                                            <th>Niveau</th>
                                        </tr>
                                        <tr>
                                            <td><?php echo "     ".$_SESSION['last-name'] ?></td>
                                            <td><?php echo "     ".$_SESSION['first-name']?></td>
                                            <td><?php echo "     ".$_SESSION['CNE-student'] ?></td>
                                            <td><?php echo "     ".$_SESSION['email-student'] ?></td>
                                            <td>        GINF 1</td>     
                                        </tr>
                                </table>
                        </center>
            </div>

            <center>             
                <form action="photouploads/upload.php" method="POST" enctype="multipart/form-data">
                    <br>
                    <input type="file" name="photoApload" >
                    <button type="submit" name="submit">Upload Photo</button>
                </form>                
        </center> 
            
              
 
</body>
</html>
