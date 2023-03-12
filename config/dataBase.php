<?php
class dataBase{
    public static function connect($host = 'localhost', $user='root', $pwd='', $db='casa_alcaide'){
        try{
            $conn = new mysqli($host, $user, $pwd, $db); 
            if ($conn->connect_errno){
                throw new Exception('ERROR: Could not connect.');
            }
        }catch(Exception $e){
            throw new Exception($e->getMessage());
        }
        return $conn;
    }
}