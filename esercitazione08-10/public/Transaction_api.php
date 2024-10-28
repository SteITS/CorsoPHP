<?php
require '../vendor/autoload.php';
use App\controller\TransactionController;
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


$ctrl = new TransactionController();


if($_SERVER['REQUEST_METHOD']==='POST'){
    $input = file_get_contents('php://input');
    $input = json_decode($input,true);

    $data = [
        'date' => $input['date'],
        'receipt' => $input['receipt'],
        'user_id' => $input['user_id'],
        'description' => $input['description'],
        'amount' => $input['amount'],
        'category' => $input['category']
    ];

    $ctrl->createFromJSON($data);
    
}

if($_SERVER['REQUEST_METHOD']==='GET'){
    $ctrl->read();
    

}