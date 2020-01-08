<?php

    class Session{ 

        private $logged_in = false;
        public $user_id;

        function __construct()
        {
            session_start();
            $this->check_logged_in();
        }

        private function check_logged_in(){
            if(isset($_SESSION['user_id'])){
                $this->user_id = $_SESSION['user_id'];
                $this->logged_in = true;
            }else{
                unset($this->user_id);
                $this->logged_in = false;
            }
        }

        public function is_logged_in(){
            $this->logged_in;
          
        }

        public function login($user)
        {
            $this->user_id = $_SESSION['user_id'] = $user;
            $this->logged_in = true;
            
            return $_SESSION['user_id']; 
        }

        public function logout()
        {
            unset($_SESSION['user_id']);
            unset($this->user_id);

            return  $this->logged_in = false;

        }
    }

    // $session = new Session();

    // $session->login('omar');
    // $session->is_logged_in();
    // echo $session->user_id;
?>