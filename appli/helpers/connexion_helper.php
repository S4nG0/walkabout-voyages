<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if (!function_exists('connecte')) {

    function connecte($user) {
        if($user == null){
            return false;
        }
        return true;
    }
    
}

if(!function_exists('connecte_admin')){
    
    function connecte_admin($user) {
        if($user == null){
            redirect(base_url().'walkadmin');
        }
    }
}