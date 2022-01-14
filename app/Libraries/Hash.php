<?php namespace App\Libraries;

class Hash{
    public static function make($password){
        return password_hash($password,PASSWORD_DEFAULT);
    }
    public static function maken($npwd){
        return password_hash($npwd,PASSWORD_DEFAULT);
    }
    public static function check_pass($entered_pass,$db_pass){
        // print_r($entered_pass);
        // print_r($db_pass);
        if(password_verify($entered_pass,$db_pass)){
            return true;
            
            // die(
            //     'if'
            // );
        }else{
            return false;
            //die('else');
        }
    }
}


?>