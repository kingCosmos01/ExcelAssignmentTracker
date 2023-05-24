<?php

    class Router {

        public function __construct()
        {
            $url = $this->getRout();
        }


        private function getRout() {
            
            if(isset($_GET['url']))
            {
                $url = $_GET['url'];
                $url = rtrim($url);
            }

            return $url;
        }

    }