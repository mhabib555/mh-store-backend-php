<?php
namespace App\Model;

use App\Bootstrap\Classes\Database;
use App\Bootstrap\Classes\Model;

class AdminPanelMenu extends Model {

    public function __construct()
    {
        $this->tableName = 'adminpanel_menus';
        $this->_conn = Database::getInstance()->getConx();
    }
 
}