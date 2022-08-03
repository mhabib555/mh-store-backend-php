<?php
// Load bootstrap file to initialize app

use App\Bootstrap\Classes\Database;
use App\Model\AdminPanelMenu;

require_once('../app/bootstrap/bootstrap.php');

require_once '../vendor/autoload.php';

$db = Database::getInstance('localhost', 'mh_store', 'root', '', 'mysql', 'silent');

$menus = new AdminPanelMenu();

var_dump($menus->all())


?>