<?php
require_once('config/dataBase.php');
require_once('models/user.php');

class UserDAO{
    //consulta si existe el usuario en la bbdd, si existe lo devuelve sino devuelve false
    public static function getUserIfExist($email){
        $conn = dataBase::connect();
        $stmt = $conn->prepare("SELECT * FROM usuarios WHERE email=?");

        //Adjunta las variables a la consulta
        $stmt->bind_param("s", $email);

        //Ejecuta la sentencia
        $stmt->execute();
        $result = $stmt->get_result();

        $user = $result->fetch_object("User");

        $conn->close();
        
        return $user ?: false;
    }

    //Registra usuario y devuelve despues de instertarlo 
    public static function registerUser($name, $lastname, $address, $phone, $email, $psw){
        $conn = dataBase::connect();
        $stmt = $conn->prepare("INSERT INTO usuarios (nombre, apellidos, direccion, telefono, email, contrasena) VALUES (?,?,?,?,?,?)");

        //Adjunta las variables a la consulta
        $stmt->bind_param("ssssss", $name, $lastname, $address, $phone, $email, $psw);

        //Execute statement
        $stmt->execute();
    
        $conn->close(); 

        $new_user = UserDAO::getUserIfExist($email);
        return $new_user;        
    }

    //actualiza datos usuario menos la contraseña y lo devuelve
    public static function updateUser($name, $lastname, $address, $phone, $email, $id){
        $conn = dataBase::connect();
        $stmt = $conn->prepare("UPDATE USUARIOS SET nombre = ?, apellidos = ?, direccion = ?, telefono = ?, email = ? WHERE idUsuario = ?");

        //Adjunta las variables a la consulta
        $stmt->bind_param("sssssi", $name, $lastname, $address, $phone, $email, $id);

        //Execute statement
        $stmt->execute();
    
        $conn->close(); 

        $user_updated = UserDAO::getUserIfExist($email);
        return $user_updated;        
    }

    //Actualiza la contraseña del usuario
    public static function updateUserPass($psw, $id){
        $conn = dataBase::connect();
        $stmt = $conn->prepare("UPDATE USUARIOS SET contrasena = ? WHERE idUsuario = ?");

        //Adjunta las variables a la consulta
        $stmt->bind_param("si", $psw, $id);

        //Execute statement
        $stmt->execute();
    
        $conn->close();    
    }

    public static function getAll()
    {
        $conn = dataBase::connect();
        $stmt = $conn->prepare("SELECT * from usuarios ORDER BY idUsuario ASC");

        $stmt->execute();
        $result = $stmt->get_result();

        $users = [];
        while ($userDB = $result->fetch_object("User")) {
            $users[] = $userDB;
        }

        $conn->close();

        return $users;
    }

    //añade usuario, para admin, de modo que puede tocar el rol
    public static function addUser($rol, $name, $lastname, $address, $phone, $email, $psw){
        $conn = dataBase::connect();
        $stmt = $conn->prepare("INSERT INTO usuarios (rol, nombre, apellidos, direccion, telefono, email, contrasena) VALUES (?, ?,?,?,?,?,?)");

        //Adjunta las variables a la consulta
        $stmt->bind_param("sssssss", $rol, $name, $lastname, $address, $phone, $email, $psw);

        //Execute statement
        $stmt->execute();
    
        $conn->close();     
    }

    //edita usuario, para admin, de modo que puede tocar el rol
    public static function editUser($rol, $name, $lastname, $address, $phone, $email, $id){
        $conn = dataBase::connect();
        $stmt = $conn->prepare("UPDATE USUARIOS SET rol = ?, nombre = ?, apellidos = ?, direccion = ?, telefono = ?, email = ? WHERE idUsuario = ?");

        //Adjunta las variables a la consulta
        $stmt->bind_param("ssssssi", $rol, $name, $lastname, $address, $phone, $email, $id);

        //Execute statement
        $stmt->execute();
    
        $conn->close();
    }

    public static function getById($id)
    {
        $conn = dataBase::connect();
        $stmt = $conn->prepare("SELECT * FROM usuarios WHERE idUsuario=?");

        //Adjunta las variables a la consulta
        $stmt->bind_param("i", $id);

        $stmt->execute();
        $result = $stmt->get_result();

        $user = $result->fetch_object("User");

        $conn->close();

        return $user;
    }

    public static function removeUser($id)
    {
        $conn = dataBase::connect();
        $stmt = $conn->prepare("DELETE from usuarios WHERE idUsuario = ?");

        $stmt->bind_param("i", $id);
        $stmt->execute();
    
        $conn->close();
    }
}