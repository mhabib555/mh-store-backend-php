<?php

namespace App\Bootstrap\Classes;

class Model
{

    protected $tableName;
    protected $primaryKey = 'id';
    protected $_conn;

    public function all()
    {
        if ($this->_conn) {
            $query = "SELECT * FROM $this->tableName";
            $stmt = $this->_conn->prepare($query);
            $stmt->execute();
            return $stmt->fetchAll(\PDO::FETCH_ASSOC);
        }
    }

    public function getById($id)
    {
        if ($this->_conn) {
            $query = "SELECT * FROM $this->tableName where $this->primaryKey = :id";
            $stmt = $this->_conn->prepare($query);
            $stmt->execute([
                ':id' => $id
            ]);
            return $stmt->fetch(\PDO::FETCH_ASSOC);
        }
    }
}
