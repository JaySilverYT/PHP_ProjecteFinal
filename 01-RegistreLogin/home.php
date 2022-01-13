<?php
if(!isset($_COOKIE[session_name()])){
        header("Location: index.php");
        exit;
    }
    else{
        session_start();
        if(!isset($_SESSION['username']) && !isset($_SESSION['mail'])){
            //Hi ha la sessió però no les variables de sessió!! Hasta la vista baby!
            header("Location: log-out.php");
            exit;
        }else{
             include "Includes/header.php"?>

            <h1>Benvinguts :)</h1> 
            
             <?php include "Includes/footer.php"?>
<?php
            }
        }?>