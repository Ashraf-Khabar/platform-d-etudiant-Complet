<?php
    session_start();
    require '../include/database-inc.php' ; 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style1.css">
    <title>Document</title>
</head>
<body>
        <center>

        <header>
                    <ul>
                        <li> <a href="../table.php">Student Informations</a></li>
                        <?phpheader("Location:../table.php") ;?>      
                        <li> <a href="semester1.php">Semester 1</a> </li>
                        <?phpheader("Location:../semester1.php") ;?>      
                        <li> <a href="semester2.php">Semester 2</a> </li>
                        <?phpheader("Location:../semester2.php") ;?>      
                        <li> <a href="semester3.php">Semester 3</a> </li>
                        <?phpheader("Location:../semester3.php") ;?>      
                        <li> <a href="semester4.php">Semester 4</a> </li>
                        <?phpheader("Location:../semester4.php") ;?>      
                        <li> <a href="../include/logout-inc.php">Deconnexion</a></li>
                        <?phpheader("Location:../include/logout-inc.php") ;?> 
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
                            <div class="table-wrapper" >
                                                <table class="fl-table">         
                                                        <?php
                                                                $som = 0 ; 
                                                                $connex ; 
                                                                $sql = "SELECT module,note FROM student , notes WHERE studenCNE =? AND student.iduser = notes.idusernote  
                                                                AND semester=2" ; 
                                                                $stmt = mysqli_stmt_init($connex) ; 
                                                                if (!mysqli_stmt_prepare($stmt,$sql))
                                                                {
                                                                    header("Location:../index.php?error=sqlerror");
                                                                    exit() ;
                                                                }else {
                                                                    mysqli_stmt_bind_param($stmt , "s" , $_SESSION['CNE-student']) ;                                     
                                                                    mysqli_stmt_execute($stmt) ;  
                                                                    $result = mysqli_stmt_get_result($stmt) ;
                                                                    if ($row = mysqli_fetch_assoc($result) > 0 )      // fetch data from the result
                                                                    {
                                                                        
                                                                        while ($row = $result-> fetch_assoc()) 
                                                                        {
                                                                            echo "<tr><th>".$row['module']."</tr>" ;
                                                                            echo "<tr><td>".$row['note']."</tr>" ;
                                                                            $som = $som + $row['note'] ; 
                                                                        }

                                                                        $moy = $som / 5 ; 
                                                                        if ($moy > 12 )
                                                                        {
                                                                            echo '
                                                                                <img src="../img/valide.png" width="150">  
                                                                        
                                                                            ' ; 
                                                                        }
                                                                        else 
                                                                        {
                                                                            echo '
                                                                                <img src="../img/nonvalide.png" width="150">  
                                                                        
                                                                            ' ; 
                                                                        }


                                                                        
                                                                            
                                                                    }
                                                                    else
                                                                    {
                                                                        echo "No result ! " ; 
                                                            
                                                                    }
   
                                                                }                                             
                                                            ?>
                                            </table>
                                    </center>
                        </div> <br>
                    </center>
 
</body>
</html>