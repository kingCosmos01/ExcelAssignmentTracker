<?php

    class Register extends Database {

        private $matric_number;
        private $fullname;
        private $email;
        private $password;
        private $c_pass;

        public $error;

        public function __construct($matric_number, $fullname, $email, $password, $c_pass) {

            $this->matric_number = $matric_number;
            $this->fullname = $fullname;
            $this->email = $email;
            $this->password = $password;
            $this->c_pass = $c_pass;

           
        }

        public function signupUser()
        {
            if($this->emptyInputs() == false)
            {
                $this->error = "Empty Inputs";
                $this->redirect('http://localhost/extracker/public/views/register.php', ['err', $this->error]);
                exit();
            }
            if($this->invalidEmail() == false)
            {
                $this->error = "Invalid Email";
                $this->redirect('http://localhost/extracker/public/views/register.php', ['err', $this->error]);
                exit();
            }
            if($this->passwordMatch() == false)
            {
                $this->error = "The Two Passwods Do not Match!";
                $this->redirect('http://localhost/extracker/public/views/register.php', ['err', $this->error]);
                exit();
            }
            if($this->checkIfUserExists($this->email) == false)
            {
                $this->error = "User Already Exists!";
                $this->redirect('http://localhost/extracker/public/views/register.php', ['err', $this->error]);
                exit();
            }


            $pass = $this->hashPassword($this->password);
            $this->createRecord($this->matric_number, $this->fullname, $this->email, $pass, 1);


            session_start();

            $_SESSION['user'] = $this->fullname;
            $_SESSION['email'] = $this->email;

        }


        private function emptyInputs()
        {
            $result;
            if(empty($this->matric_number) || empty($this->fullname) || empty($this->email) || empty($this->password) || empty($this->c_pass) )
            {
                $result = false;
            }
            else {
                $result = true;
            }

            return $result;
        }

        private function invalidEmail()
        {
            $result;
            if(!filter_var($this->email, FILTER_VALIDATE_EMAIL))
            {
                $result = false;
            }
            else {
                $result = true;
            }

            return $result;
        }

        private function passwordMatch()
        {
            $result;

            if($this->password !== $this->c_pass)
            {
                $result = false;
            }
            else 
            {
                $result = true;
            }

            return $result;
        }


        private function checkIfUserExists($email)
        {
            $query = "SELECT email FROM students WHERE email = ? ";
            $stmt = $this->connect()->prepare($query);

            if(!$stmt->execute(array($email)))
            {
                $stmt = null;
                $this->redirect('http://localhost/extracker/public/views/register.php', ['err', 'statementFailed!']);
                exit();
            }

            $resultCheck;
            if($stmt->rowCount() > 0)
            {
                $resultCheck = false;
            }
            else 
            {
                $resultCheck = true;
            }

            return $resultCheck;
        }

        private function createRecord($id, $fullname, $email, $password, $status)
        {
            $query = "INSERT INTO students (id, fullname, email, password, status) VALUES (?, ?, ?, ?, ?) ";
            $stmt = $this->connect()->prepare($query);

            if(!$stmt->execute(array($id, $fullname, $email, $password, $status)))
            {
                $stmt = null;
                $this->redirect('http://localhost/extracker/public/views/register.php', ['err', 'statementFailed!']);
                exit();
            }

            $stmt = null;
        }


      

        private function hashPassword($pass)
        {
            return $pass = password_hash($pass, PASSWORD_DEFAULT);
        }

        public function redirect($url, $params = [])
        {
            return header("Location: " . $url ."?param=". urlencode($params[0]) . "&m=" . urlencode($params[1]));
        }


    }