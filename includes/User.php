<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 5/14/14
 * Time: 7:15 PM
 */

class User {
    static public function SetUser($param){
        session_start();
        $_SESSION['login'] = $param;
    }
    static public function GetUserState(){
        session_start();
        if(isset($_SESSION['login'])) {
            return true;
        }
        return false;
    }
    static public function UserExit(){
        session_start();
        session_unset();
        session_destroy();
    }

}