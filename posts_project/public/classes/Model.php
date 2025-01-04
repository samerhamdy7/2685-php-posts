<?php

abstract class Model {
    
    static $db;
    
    const SOFE_DELET = true;

    static function connect () {
        self::$db = new mysqli ('localhost' , 'root' , '' , '2685_php_posts');
        
    }
    
    static function all($limit = null){
        
        $table = 'pst_' . static::TABLE;
        
        $qry = "SELECT * FROM `$table` ";
        
        if(static::SOFT_DELET){
            
            $qry .= "WHERE `deleted_at` IS NULL";
        };
        
        if($limit){
            
            $qry .= " LIMIT $limit";
        };
        
        $res = static::$db->query($qry);
        
        return mysqli_fetch_all($res , MYSQLI_ASSOC);

    }
    
    static function count(){
        
        $table = 'pst_' . static::TABLE;
        
        $qry = "SELECT COUNT(*) AS Count FROM `$table`";
        
        if(static::SOFT_DELET){

            $qry = "WHERE `deleted_at` IS NULL";
            
        }

        $res = static::$db->quey($qry);

        return mysqli_fetch_column($qry);

 
    }

    static function single_item($id){

        $table = 'pst_' . static::TABLE;

        $qry = "SELECT * FROM `$table` WHERE `deleted_at` IS NULL AND `id` = '$id';";

        $res = self::$db->query($qry);

        return mysqli_fetch_assoc($res);

        
    }
}

