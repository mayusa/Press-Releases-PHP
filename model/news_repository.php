<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class News{
    public static function get_news(){
        global $db;
        $query = 'SELECT * FROM news ORDER BY release_date DESC';
	    try {
	        $statement = $db->prepare($query);
	        $statement->execute();
	        $results = $statement->fetchAll();
	        $statement->closeCursor();
	    } catch (PDOException $e) {
	        $error_message = $e->getMessage();
	        display_db_error($error_message);
	    }
            return $results;
    }
    
    public static function get_the_news($nid){
        global $db;
        $query = 'SELECT * FROM news WHERE nid = :nid';
	    try {
	        $statement = $db->prepare($query);
                $statement->bindValue(':nid', $nid);
	        $statement->execute();
	        $result = $statement->fetch();
	        $statement->closeCursor();
	    } catch (PDOException $e) {
	        $error_message = $e->getMessage();
	        display_db_error($error_message);
	    }
            return $result;
    }
    
    public static function get_news_by($uid){
        global $db;
        $query = 'SELECT * FROM news WHERE uid = :uid ORDER BY release_date DESC';
	    try {
	        $statement = $db->prepare($query);
                $statement->bindValue(':uid', $uid);
	        $statement->execute();
	        $results = $statement->fetchAll();
	        $statement->closeCursor();
                return $results;
	    } catch (PDOException $e) {
	        $error_message = $e->getMessage();
	        display_db_error($error_message);
	    }
    }
    
    public static function add_news($headline, $summary, $news_body, $com_name, $com_email, $uid, $date){
        global $db;
        $query = 'INSERT INTO news (headline, summary, news_body, com_name, com_email, uid, release_date)VALUES(:headline, :summary, :news_body, :com_name, :com_email, :uid, :release_date)';
        try {
            $statement = $db->prepare($query);
            $statement->bindValue(':headline', $headline);
            $statement->bindValue(':summary', $summary);
            $statement->bindValue(':news_body', $news_body);
            $statement->bindValue(':com_name', $com_name);
            $statement->bindValue(':com_email', $com_email);
            $statement->bindValue(':uid', $uid);
            $statement->bindValue(':release_date', $date);
            $statement->execute();
            $result = ($statement->rowCount() > 0);
        } catch (Exception $e) {
            $error_message = $e->getMessage();
	    display_db_error($error_message);
        }
        return $result;
    }
    
    public static function udt_news($nid, $headline, $summary, $news_body, $com_name, $com_email, $uid, $date){
        global $db;
        $query = 'UPDATE news SET headline=:headline, summary=:summary, news_body=:news_body, com_name=:com_name, com_email=:com_email, uid=:uid, release_date=:release_date WHERE nid=:nid';
        try {
            $statement = $db->prepare($query);
            $statement->bindValue(':headline', $headline);
            $statement->bindValue(':summary', $summary);
            $statement->bindValue(':news_body', $news_body);
            $statement->bindValue(':com_name', $com_name);
            $statement->bindValue(':com_email', $com_email);
            $statement->bindValue(':uid', $uid);
            $statement->bindValue(':release_date', $date);
            $statement->bindValue(':nid', $nid);
            $statement->execute();
            $result = ($statement->rowCount() > 0);
        } catch (Exception $e) {
            $error_message = $e->getMessage();
	    display_db_error($error_message);
        }
        return $result;
    }
    
    public static function delete_news($nid){
        global $db;
        $query = 'DELETE FROM news WHERE nid = :nid';
	    try {
	        $statement = $db->prepare($query);
                $statement->bindValue(':nid', $nid);
	        $statement->execute();
                $result =  ($statement->rowCount() > 0);
	        $statement->closeCursor();
                return $result;
	    } catch (PDOException $e) {
	        $error_message = $e->getMessage();
	        display_db_error($error_message);
	    }
    }
    
    public static function delete_news_byUid($uid){
        global $db;
        $query = 'DELETE FROM news WHERE uid = :uid';
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
    
    public static function get_news_ByTypeTitle($type, $title) {
	    global $db;
            if($type==0){
                $query = 'SELECT * FROM news ORDER BY release_date DESC';
            }
	    else if($type==1){
		    $query = 'SELECT * FROM news,users WHERE users.uid=news.uid 
		    			AND news_body LIKE :title ORDER BY release_date DESC';
	    }else if($type==2){
	    	 $query = 'SELECT * FROM news,users WHERE users.uid=news.uid 
		    			AND city LIKE :title ORDER BY release_date DESC';
	    }else if($type==3){
	    	 $query = 'SELECT * FROM news,users WHERE users.uid=news.uid 
		    			AND state LIKE :title ORDER BY release_date DESC';
	    }else{
	    	 $query = 'SELECT * FROM news,users WHERE users.uid=news.uid 
		    			AND country LIKE :title ORDER BY release_date DESC';
	    }
	    try {
	        $statement = $db->prepare($query);
        	$statement->bindValue(':title', '%'.$title.'%');
	        $statement->execute();
	        $result = $statement->fetchAll();
	        $statement->closeCursor();
	        return $result;
	    } catch (PDOException $e) {
	        $error_message = $e->getMessage();
	        display_db_error($error_message);
	    }
	}
}
?>

