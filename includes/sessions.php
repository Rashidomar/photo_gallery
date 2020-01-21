<?php

    class Session{ 

        private $logged_in = false;
        public $user_id;
        public $username;

        function __construct()
        {       
            session_start();
            $this->check_logged_in();
        }

        private function check_logged_in(){
            if(isset($_SESSION['user_id']) && isset($_SESSION['username'])){
                $this->user_id = $_SESSION['user_id'];
                $this->username = $_SESSION['username'];
                $this->logged_in = true;
            }else{
                unset($this->user_id);
                unset($this->username);
                $this->logged_in = false;
            }
        }

        public function is_logged_in(){

            return $this->logged_in;
          
        }

        public function create_session($user_id,$username)
        {
            $this->user_id = $_SESSION['user_id'] = $user_id;
            $this->username = $_SESSION['username'] = $username;
            $this->logged_in = true;

            return array('id' => $_SESSION['user_id'],'username' => $_SESSION['username']);
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