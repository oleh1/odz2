<?php
namespace Db;

class Database {
    private $_connection;
    private static $_instance;
    private $_host = "127.0.0.1";
    private $_username = "root";
    private $_password = "1";
    private $_database = "ODZ";



    public static function getInstance() {
        if(!self::$_instance) {
            self::$_instance = new self();
        }
        return self::$_instance;
    }


    private function __construct() {
        $this->_connection = mysqli_connect($this->_host, $this->_username,
            $this->_password, $this->_database)
        or die("Ошибка" . mysqli_error($this->_connection));

        if(mysqli_connect_error()) {
            trigger_error("Не удалось подключиться к MySQL: " . mysql_connect_error(),
                E_USER_ERROR);
        }
    }

    public function __clone(){}

    public function getConnection() {
        return $this->_connection;
    }
}