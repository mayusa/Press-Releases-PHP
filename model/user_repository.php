<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class User{
    public static function get_users(){
        global $db;
        $query = 'SELECT * FROM users';
	    try {
	        $statement = $db->prepare($query);
	        $statement->execute();
	        $result = $statement->fetchAll();
	        $statement->closeCursor();
	    } catch (PDOException $e) {
	        $error_message = $e->getMessage();
	        display_db_error($error_message);
	    }
            return $result;
    }
    
    public static function get_the_user($uid){
        global $db;
        $query = 'SELECT * FROM users WHERE uid = :uid';
	    try {
	        $statement = $db->prepare($query);
                $statement->bindValue(':uid', $uid);
	        $statement->execute();
	        $result = $statement->fetch();
	        $statement->closeCursor();
	    } catch (PDOException $e) {
	        $error_message = $e->getMessage();
	        display_db_error($error_message);
	    }
            return $result;
    }
    
    public static function add_user($uname, $pwd, $city, $state, $cty){
        global $db;
        $query = 'INSERT INTO users (uname, pwd, city, state, country, is_admin)VALUES(:uname, :pwd, :city, :state, :country, :status)';
        try {
            $statement = $db->prepare($query);
            $statement->bindValue(':uname', $uname);
            $statement->bindValue(':pwd', $pwd);
            $statement->bindValue(':city', $city);
            $statement->bindValue(':state', $state);
            $statement->bindValue(':country', $cty);
            $statement->bindValue(':status', '0');
            $statement->execute();
            $result = ($statement->rowCount() > 0);
        } catch (Exception $e) {
            $error_message = $e->getMessage();
	    display_db_error($error_message);
        }
        return $result;
    }
    
    public static function udt_user($uid, $pwd, $city, $state, $cty){
        global $db;
        $query = 'UPDATE users SET pwd = :pwd, city = :city, state = :state, country = :cty WHERE uid = :uid';
        try {
            $statement = $db->prepare($query);
            $statement->bindValue(':pwd', $pwd);
            $statement->bindValue(':city', $city);
            $statement->bindValue(':state', $state);
            $statement->bindValue(':cty', $cty);
            $statement->bindValue(':uid', $uid);
            $statement->execute();
            $result = ($statement->rowCount() > 0);
        } catch (Exception $e) {
            $error_message = $e->getMessage();
	    display_db_error($error_message);
        }
        return $result;
    }
    
    public static function udt_user_authority($uid, $is_admin){
        global $db;
        $query = 'UPDATE users SET is_admin = :is_admin WHERE uid = :uid';
        try {
            $statement = $db->prepare($query);  
            $statement->bindValue(':uid', $uid);
            $statement->bindValue(':is_admin', $is_admin);
            $statement->execute();
            $result = ($statement->rowCount() > 0);
        } catch (Exception $e) {
            $error_message = $e->getMessage();
	    display_db_error($error_message);
        }
        return $result;
    }
    
    public static function get_the_user_by($uname, $pwd){
        global $db;
        $query = 'SELECT * FROM users WHERE uname = :uname AND pwd = :pwd';
	    try {
	        $statement = $db->prepare($query);
                $statement->bindValue(':uname', $uname);
                $statement->bindValue(':pwd', $pwd);
	        $statement->execute();
	        $result = $statement->fetch();
	        $statement->closeCursor();
	    } catch (PDOException $e) {
	        $error_message = $e->getMessage();
	        display_db_error($error_message);
	    }
            return $result;
    }
    
    public static function get_the_user_byName($uname){
        global $db;
        $query = 'SELECT * FROM users WHERE uname = :uname';
	    try {
	        $statement = $db->prepare($query);
                $statement->bindValue(':uname', $uname);
                //$statement->bindValue(':pwd', $pwd);
	        $statement->execute();
	        $result = $statement->fetch();
	        $statement->closeCursor();
	    } catch (PDOException $e) {
	        $error_message = $e->getMessage();
	        display_db_error($error_message);
	    }
            return $result;
    }
    
    public static function delete_user($uid){
        global $db;
        $query = 'DELETE FROM users WHERE uid = :uid';
	    try {
	        $statement = $db->prepare($query);
                $statement->bindValue(':uid', $uid);
	        $statement->execute();
                $result =  ($statement->rowCount() > 0);
	        $statement->closeCursor();
                return $result;
	    } catch (PDOException $e) {
	        $error_message = $e->getMessage();
	        display_db_error($error_message);
	    }
    }
}
?>

