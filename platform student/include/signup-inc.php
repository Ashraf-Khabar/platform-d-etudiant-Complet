<?php
    if ( isset ($_POST['signup-botton']) ) 
    {
        require 'database-inc.php' ; 

        $studentName = $_POST['Name'];
        $studentlastName = $_POST['lastName'];
        $studentCEN = $_POST['CNE'];
        $studentMail = $_POST['email'];
        $studentPassword = $_POST['password'];
        $studentPasswordRepeat = $_POST['password-repeat'];

        /** checking if the student doesnt write anything in the input field : */

        if (empty($studentName) || empty($studentlastName) || empty($studentCEN) || empty($studentMail) || empty($studentPassword) || empty($studentPasswordRepeat))
        {
            /** showing an error message in the top-head of the page to indicate what kind of error had done */

            header("Location:../signup.php?error=emptyfields&firstName=".$studentName."&lastname=".$studentlastName."&CNE=".$studentCEN."&email".$studentMail) ; 
            exit() ;    
        }

        /** now checking if the student pass a good form of an email and a good form of a name  */

        else if (!filter_var($studentMail , FILTER_VALIDATE_EMAIL) && !preg_match("/^[a-zA-Z\s]*$/" , $studentName ))
        {
            header("Location:../signup.php?error=invalideMail&Name") ; 
            exit() ;    
        }

        // now checking if the student pass a good form of an email : 

        else if (!filter_var($studentMail , FILTER_VALIDATE_EMAIL))
        {
            header("Location:../signup.php?error=invalideMail&Name=".$studentName."&CNE=".$studentCEN) ; 
            exit() ;    
        }

        // now checking if the student pass a good form of a name 

        else if (!preg_match("/^[a-zA-Z\s]*$/" , $studentName ))
        {
            header("Location:../signup.php?error=invalideName&CNE=".$studentCEN."&mail=".$studentMail); 
            exit() ;    
        }      
        
        else if (!preg_match("/^[a-zA-Z\s]*$/" , $studentlastName ))
        {
            header("Location:../signup.php?error=invalidelastName&CNE=".$studentCEN."&mail=".$studentMail); 
            exit() ;    
        }

        // checking if the student pas the second password same as the fist password : 

        else if ($studentPassword !== $studentPasswordRepeat )
        {
            header("Location:../signup.php?error=passwordCheck&Name=".$studentName."&CNE=".$studentCEN."&mail=".$studentMail); 
            exit() ; 
        }
        else 
        {
            // create a tamplate or query : 
            $sql = "SELECT `studenCNE`, `studenEmail` FROM `student` WHERE `studenCNE`=? OR  'studenEmail'=? " ;
            // create a prepare statement : 
            $stmt = mysqli_stmt_init( $connex ) ; 
            //prepare the prepare statement : 
            if (!mysqli_stmt_prepare( $stmt , $sql) )  
            {
                header("Location:../signup.php?error=sqlerror"); 
                exit() ; 
            }
            else 
            {
                // bind the parameters to the placeholder : 
                mysqli_stmt_bind_param($stmt , "ss" , $studentCEN , $studentMail );  
                // run the parameeters inside the the database : 
                mysqli_stmt_execute($stmt) ;
                // this fonction take the result from the database and store it back into a variable called $stmt :  
                mysqli_stmt_store_result($stmt) ; 
                $resultcheck = mysqli_stmt_num_rows($stmt) ; 
                echo $resultcheck ; // check how many result insid a variable caled $stmt :  
                if ($resultcheck > 0)
                {
                    header("Location:../signup.php?error=CNE%20taken"); 
                    exit() ; 
                }  
                else
                {
                    
                    $sql = "INSERT INTO student (studentname,studentLastname,studenCNE,studenEmail,studentPWD) VALUES (?,?,?,?,?)";
                    $stmt = mysqli_stmt_init( $connex ) ; 
                    if (!mysqli_stmt_prepare( $stmt , $sql) )  
                    {
                        header("Location:../signup.php?error=sqlerror"); 
                        exit() ; 
                    }
                    else {
                        $passwordcripted = password_hash($studentPassword , PASSWORD_DEFAULT ) ; 
                        mysqli_stmt_bind_param($stmt , "sssss" ,$studentName , $studentlastName , $studentCEN , $studentMail , $passwordcripted);
                        mysqli_stmt_execute($stmt) ;
                        header("Location:../signup.php"); 
                        exit() ; 
                    }

                }
            }
        }
        mysqli_stmt_close($stmt) ;  
        mysqli_close($connex) ; 
    }
    else
    {
        header("Location:../signup.php"); 
        exit() ; 

    }
?>
