<?php require 'Includes/bbddConex.php';?>

<?php
$db = openDB();
$username = false;
$passwordOK = false;
$error = false;
$nombreOK = false;

if(isset($_POST['username']) && !empty($_POST['username']))
{
    $username = filter_input(INPUT_POST,'username'); //Filter input serveix per a evitar la injeccio de codi.
}

if(isset($_POST['password']) && !empty($_POST['password']) && strlen($_POST['password']) < 12)
{
    $password = filter_input(INPUT_POST, 'password'); //Filter input serveix per a evitar la injeccio de codi.
}

if (isset($_POST['username']) && isset($_POST['password']))
{
    $sql = 'SELECT username, mail, passHash FROM `users` WHERE `username` = ? OR `mail` = ?';
    $usuaris = $db->prepare($sql);
    $usuaris->execute(array($username, $username)); //Dentro del execute tiene que haber las variables en orden que hay en el WHERE del sql. (En este caso 'username' e 'password's)


    foreach ($usuaris as $fila) {

        if ($fila['username'] == $username)
        {
            session_start();
            $nombreOK = true;
            $error = false;
            $_SESSION["username"] = $fila['username'];
        }
        else if($fila['mail'] == $username)
        {
            session_start();
            $nombreOK = true;
            $error = false;
            $_SESSION["mail"] = $fila['mail'];
        }
        if ($fila['passHash'] == password_verify($password, $fila['passHash']))
        {
            $passwordOK = true;
            $error = false;
            $_SESSION["password"] = $password;
        }
    }
    if($nombreOK == true && $passwordOK == true)
    {
        if(isset($_COOKIE[session_name()]))
        {
            updateLastSingIn($username);
            header('Location: home.php');
        }
    }
    else
    {
        header('Location: index.php?error=true');
    }
}

function updateLastSingIn($xUsername)
{
    $db = openDB();

    $sql = "UPDATE `users` SET lastSignIn = now() WHERE `username` = '$xUsername';";
    
    $db->query($sql);
}

?>

