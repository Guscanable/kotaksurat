<?php

class Databases extends Controller
{
    private $host = DB_HOST;
    private $db = DB_NAME;
    private $user = DB_USERNAME;
    private $pass = DB_PASS;
    public $dbh;

    public function __construct()
    {
        $options = [
            PDO::ATTR_PERSISTENT => true,
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_CASE => PDO::CASE_NATURAL,
            PDO::ATTR_ORACLE_NULLS => PDO::NULL_EMPTY_STRING
        ];

        try {
            $this->dbh = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db, $this->user, $this->pass, $options);
        } catch (PDOException $e) {
            die("Database connection failed: " . $e->getMessage());
        }
    }
}
