<?php
    /*
        micro-MVC
        
        File name: controller.php
        Description: This file contains the "MVC CONTROLLER" class.
        
        Coded by George Delaportas (G0D)
        Copyright (C) 2015
        Open Software License (OSL 3.0)
    */
    
    // Check for direct access
    if (!defined('micro_mvc'))
        exit();
    
    // MVC CONTROLLER class
    class MVC_CONTROLLER
    {
        public static function root()
        {
            $result = ROOT_MODEL::Get_Data();
            MVC::Store_Content('root', $result);
            
            return true;
        }
        
        // Test route
        public static function test()
        {
            $result = TEST_MODEL::Get_Data();
            MVC::Store_Content('test', $result);
            
            return true;
        }

        // About route
        public static function about()
        {
            $result = ABOUT_MODEL::Get_Data();
            MVC::Store_Content('about', $result);

            return true;
        }

        // Find a team route
        public static function find_a_team()
        {
            $result = FIND_A_TEAM_MODEL::Get_Data();
            MVC::Store_Content('find_a_team', $result);

            return true;
        }

        // Improve your game route
        public static function improve_your_game()
        {
            $result = IMPROVE_GAME_MODEL::Get_Data();
            MVC::Store_Content('improve_your_game', $result);

            return true;
        }

        // Login page route
        public static function login_page()
        {
            $result = LOGIN_MODEL::Get_Data();
            MVC::Store_Content('login_page', $result);

            return true;
        }

        //User Authnetication
        public static function auth(){

            $result = AUTH_MODEL::Proccess_Data();
            MVC::Store_Content('form_page', $result);

            return true;
        }
    }
?>
