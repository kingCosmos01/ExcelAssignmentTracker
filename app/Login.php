<?php

    class Login extends Database {

        private $email;
        private $password;

        public $error;

        public function __construct($email, $password) {

            $this->email = $email;          
            $this->password = $password;
           
        }

        public function LoginUser()
        {
            if($this->emptyInputs() == false)
            {
                $this->error = "Empty Inputs";
                $this->redirect('http://localhost/extracker/public/views/login.php', ['err', $this->error]);
                exit();
            }
            if($this->checkIfUserExists($this->email, $this->password) == false )
            {
                $this->error = "User Does not Exist!";
                $this->redirect('http://localhost/extracker/public/views/login.php', ['err', $this->error]);
                exit();
            }

            $this->setUser($this->email);

        }

        private function checkIfUserExists($email, $password)
        {
            $result;

            $query = "SELECT * FROM students WHERE email = ? AND password = ?";
            $stmt = $this->connect()->prepare($query);

            $stmt->execute(array($email, $password));

            if($stmt->rowCount() > 0)
            {
                $result = true;
            }
            else {
                $result = false;
            }

            return $result;
        }



        private function setUser($email)
        {
            session_start();

            return $_SESSION['user'] = $email;
        }



        private function emptyInputs()
        {
            $result;
            if(empty($this->email) || empty($this->password))
            {
                $result = false;
            }
            else {
                $result = true;
            }

            return $result;
        }

        public function redirect($url, $params = [])
        {
            return header("Location: " . $url ."?param=". urlencode($params[0]) . "&m=" . urlencode($params[1]));
        }

        

      

    }