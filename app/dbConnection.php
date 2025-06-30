<?php

    session_start();
    
    ini_set('display_errors', 1); ini_set('display_startup_errors', 1); error_reporting(E_ALL);

    class DBConnection {
        private static $instance = null;
        private $con;
        
        private $host = "localhost";
        private $server = "root";
        private $pass = "";
        private $dbname = "iptms";
        private $dsn;

        private function __construct() {
            $this->dsn = 'mysql:host='.$this->host.';dbname='.$this->dbname;
            $this->con = new PDO($this->dsn, $this->server, $this->pass);
        }

        public static function getInstance() {
            if (!self::$instance) {
                self::$instance = new DBConnection();
            }
            return self::$instance;
        }

        public function getConnection() {
            return $this->con;
        }
    }

    $dbInstance = DBConnection::getInstance();
    $con = $dbInstance->getConnection();

    $id = uniqid()."::". md5(microtime())."::".date('d.m.Yh:i:s')."::".password_hash(microtime(), PASSWORD_DEFAULT)."::".sha1(microtime());

?>
