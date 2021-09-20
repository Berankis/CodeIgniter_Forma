<?php

    namespace App\Models;

    use CodeIgniter\Model;

    class comments_model extends Model{        
        public function __construct(){
        }
        public function get_comments(){
            $db = db_connect();
            $query = $db->query('SELECT * FROM comments');
            return $db->escapeString($query->getResultArray());
        }
        public function get_comments_count(){
            $db = db_connect();
            $query = $db->query('SELECT * FROM comments');
            return $query->getNumRows();
        }
        public function get_replies(){
            $db = db_connect();
            $query = $db->query('SELECT * FROM replies');
            return $query->getResultArray();
        }
        public function save_comment($name, $email, $text, $date){
            $db = db_connect();
            if(!$db->query("INSERT INTO comments(email,name,comment,date) VALUES('$email','$name','".$db->escapeString($text)."','$date')")){
                return "neok";
            }else{
                return "ok";
            }
            
        }
        public function save_reply($comment_id, $name, $email, $text, $date){
            $db = db_connect();
            if(!$db->query("INSERT INTO replies(comment_id,email,name,text,date) VALUES('$comment_id','$email','$name','".$db->escapeString($text)."','$date')")){
                return "neok";
            }else{
                return "ok";
            }
            
        }
    }

?>