<?php

include ('../includes/index.php');

if($_GET['logout']){
    User::UserExit();
}

if(empty($_POST['login']) || empty($_POST['auth_button']) || empty($_POST['auth_button'])) {
    header("Location: index.php");
} else {
    $login = $_POST['login'];
    $pass = $_POST['password'];
    $butt = $_POST['auth_button'];
}
if($butt) {
    trim($login);
    trim($pass);

    if (empty($login) || empty($pass)) {
        header("Location: index.php");
    }

    $login = stripslashes($login);
    $pass = stripslashes($pass);
    $login = htmlspecialchars($login);
    $pass = htmlspecialchars($pass);
    $pass = md5($pass);
    $myrow = DB::Select("password","users","name='$login'");

    if ($pass == $myrow[0]->password) {
        User::SetUser($login);
        header("Location: index.php");
    } else {
        header("location: index.php");
    }

} else {
    header("location: index.php");
}
?>