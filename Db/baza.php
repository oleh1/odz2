<?php
namespace Db;



class baza extends  Database
{
    private $db;
    private $mysqli;



    function __construct()
    {

        $this->db = Database::getInstance();
        $this->mysqli = $this->db->getConnection();

    }

    public function getMysqli()
    {
        return $this->mysqli;
    }

}