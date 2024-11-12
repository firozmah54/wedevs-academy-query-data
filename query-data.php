<?php 
/*
 * Plugin Name:       WeDevs Accademy 
 * Description:       Handle the basics with this plugin.

 */


class Query_data_wedevs_accademy{
    private static $instance;

    public static function get_instance(){

        if(!self::$instance){

            self::$instance = new self();
        }
        return self::$instance;
    }

    private function __construct(){

        $this->require_classes();
    }

    public function require_classes(){

        require_once __DIR__ . "/includes/admin-menu.php";

       new Query_data_wedevs_accademy_Admin_Menu();
    }
     
}


Query_data_wedevs_accademy::get_instance();