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
    $ctrl->create();
    header('location:index.php');
    
}

if($_SERVER['REQUEST_METHOD']==='GET'){
    $prodotti = $ctrl->readMVC();
    include '../src/view/header.php';
    include '../src/view/form.php';
    include '../src/view/table.php';
    include '../src/view/footer.php';
    

}