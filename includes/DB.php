<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 5/14/14
 * Time: 2:16 PM
 */


class DB {
    static private $dbHost = 'localhost';
    static private $dbUser = 'root';
    static private $dbPass = '1234';
    static private $dbName = 'tv_series';
    static private $db = NULL;

    static private function Connect()
    {
        self::$db = mysql_connect(self::$dbHost, self::$dbUser, self::$dbPass) or die ('Error connect: ' .mysql_error () );
        mysql_select_db (self::$dbName, self::$db) or die ('Error select: ' .mysql_error ());
    }

    static public function Select($select, $from, $where = NULL, $other = NULL)
    {
        if(!self::$db) { self::Connect(); }

        $queryString = "SELECT $select FROM $from" .
            (isset($where) ? " WHERE $where" : "") .
            (isset($other) ? " $other" : "");
        $query = mysql_query($queryString, self::$db);

        if($query){
            $i = 0;
            while($result[] = mysql_fetch_object($query)){
                $i++;
            }
            unset($result[$i]);

            return $result;
        }
        return NULL;
    }
    static public function Insert($table,$columns,$values){
        if(!self::$db) { self::Connect(); }

        $queryString = "INSERT INTO $table (";

        foreach($columns as $column){
            $queryString .= $column . ",";
        }
        $queryString = substr($queryString, 0, strlen($queryString)-1);

        $queryString .= ") VALUES ('";
        foreach($values as $value){
            $queryString .= $value . "','";
        }
        $queryString = substr($queryString, 0, strlen($queryString)-2);

        $queryString .= ")";

        echo $queryString;

        $query = mysql_query($queryString, self::$db);
        if(!$query){
            return false;
        }
        return true;
    }
    static public function Update($table,$columns,$values,$id){
        if(!self::$db) { self::Connect(); }

        $queryString = "UPDATE $table SET ";

        if(!(count($columns) == count($values))) {
            return false;
        }

        foreach($columns as $column){
            $value = current($values);
            $queryString .= "$column = '$value',";
            $value = next($values);
        }
        $queryString = substr($queryString, 0, strlen($queryString)-1);

        $queryString .= " WHERE id='$id'";

        $query = mysql_query($queryString, self::$db);
        if(!$query){
            return false;
        }
        return true;
    }
}