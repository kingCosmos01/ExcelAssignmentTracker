<?php

    class Redirect {

        public function redirect($url, $params = [])
        {
            return header("Location: " . $url ."?param=". urlencode($params[0]) . "&message=" . urlencode($params[1]));
        }
    }