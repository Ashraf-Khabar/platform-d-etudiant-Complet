<?php
session_start();
    if ( isset ( $_POST['log_in']) ) 
    {
        require 'database-inc.php' ; 

        $studentMail = $_POST['nomEtulisateur'];
        $studentPassword = $_POST['motDePasse'];

        if (empty($studentMail) || empty($studentPassword))
        {
            header("Location:../index.php?error=emptyfields");
            exit() ;  
        }
        else 
        {
            // selection of data in order to verify whether the email stored in tha database match with the email passed by the student 
            
            $sql = "SELECT * FROM student where studenEmail=? ;";
            $stmt = mysqli_stmt_init($connex);
            if (!mysqli_stmt_prepare($stmt,$sql))
            {
                header("Location:../index.php?error=sqlerror");
                exit() ;
            }else {
                mysqli_stmt_bind_param($stmt , "s" , $studentMail) ; 
                mysqli_stmt_execute($stmt) ;  
                $result = mysqli_stmt_get_result($stmt) ;
                if ($row = mysqli_fetch_assoc($result))      // fetch data from the result
                {
                    /* 
                        checking if the password passing by the student match with the password stored in the database ,
                        the password of the row
                    */
                    $passwordCheck = password_verify($studentPassword , $row['studentPWD']) ; 
                    if ($passwordCheck == false)
                    {

                        header("Location:../table.php?error=wrongpassword"); 
                        exit() ; 

                    }else if ($passwordCheck == true )
                    {

                        session_start() ; 
                        $_SESSION['id-student'] = $row['iduser'] ; 
                        $_SESSION['CNE-student'] = $row['studenCNE'] ; 
                        $_SESSION['email-student'] = $row['studenEmail'] ; 
                        $_SESSION['first-name'] = $row['studentname'] ; 
                        $_SESSION['last-name'] = $row['studentLastname'] ; 
                        
                        header("Location:../table.php?login=success"); 
                        exit() ; 

                    }
                    else {

                        header("Location:../table.php?error=wrongpassword"); 
                        exit() ; 

                    }
                } 
                else {

                    header("Location:../index.php?error=nostudent"); 
                    exit() ; 

                }
            }
        }

    }
    else 
    {
        header("Location:../index.php"); 
        exit() ; 
    }
