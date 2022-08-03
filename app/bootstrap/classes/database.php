<?php
namespace App\Bootstrap\Classes;

use PDOException;

class Database {

    private static $instance = null;
    protected $_conn;
    protected $server;
    protected $database;
    protected $username;
    protected $password;
    protected $conxMessage;
    protected $dbType;
    //errMode = 'silent' or 'exception'
    protected $errMode;

    public function __construct($server=null, $database=null, $username=null,$password=null,$dbType=null,$errMode=null) {
        $this->server = $server;    
        $this->database = $database;    
        $this->username = $username;    
        $this->password = $password;    
        $this->dbType = $dbType;
        $this->errMode = $errMode;
        $this->connect();    
    }

    public static function getInstance($server=null, $database=null, $username=null,$password=null,$dbType=null,$errMode=null) {
        if(!self::$instance){
            self::$instance = new Database($server, $database, $username, $password, $dbType, $errMode);
        }
        return self::$instance;
    }

    public function connect() {
        try {
            $this->_conn = new \PDO("$this->dbType:host=$this->server;dbname=$this->database", $this->username, $this->password);
            if($this->errMode=='silent') {
                $this->_conn->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_SILENT);
            } else {
                $this->_conn->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
            }
            $this->conxMessage = 'Connected Successfully';
        } catch(PDOException $e) {
            $this->conxMessage = 'Connection Failed : '.$e->getMessage();
        }
    }

    public function conxMessage() {
        return $this->conxMessage;
    }
    
    public function getConx() {
        return $this->_conn;
    }
}