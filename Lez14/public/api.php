<?php
require '../vendor/autoload.php';
use App\controller\ProductController;
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


$ctrl = new ProductController();


if($_SERVER['REQUEST_METHOD']==='POST'){
    $input = file_get_contents('php://input');
    $input = json_decode($input,true);

    $data = [
        'name' => $input['name'],
        'description' => $input['description'],
        'user_id' => $input['user_id'],
        'category_id' => $input['category_id'],
        'price' => $input['price'],
        'image' => $input['image']
    ];

    $ctrl->createFromJSON($data);
    
}

if($_SERVER['REQUEST_METHOD']==='GET'){
    $ctrl->read();
    

}