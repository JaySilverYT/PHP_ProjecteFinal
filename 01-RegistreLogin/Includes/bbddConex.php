<?php 

    function openDB(){
        $cadena_connexio = 'mysql:dbname=cinetics;host=localhost:3306';
        $usuari = 'root';
        $passwd = '';
        $db = false;
        try{
            //Ens connectem a la BDs
            $db = new PDO($cadena_connexio, $usuari, $passwd);
            //Tallem la connexió a la BDs
            //$db = null;
        }catch(PDOException $e){
            echo 'Error amb la BDs: ' . $e->getMessage();
        }
        return $db;
    }

?>