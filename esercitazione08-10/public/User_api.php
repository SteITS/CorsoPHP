<?php
require '../vendor/autoload.php';
use App\controller\UserController;
/*
use App\Model\Product;
use App\Config\Database;
use App\Repos\ProductDAO;
/*
$p = new Product();
var_dump($p);
*/
/*
$db = new Database();
$db->getConnection();

$dao = new ProductDAO($db->getConnection());

$ctrl->read();
*/


$ctrl = new UserController();


if($_SERVER['REQUEST_METHOD']==='POST'){
    $input = file_get_contents('php://input');
    $input = json_decode($input,true);

    $data = [
        'name' => $input['name'],
        'email' => $input['email'],
        'password' => $input['password'],
    ];

    $ctrl->createFromJSON($data);
    
}

if($_SERVER['REQUEST_METHOD']==='GET'){
    $ctrl->read();
    

}