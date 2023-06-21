<?php
require_once 'vendor/autoload.php';
use App\classes\Auth;
use App\classes\Crud;
use App\classes\Product;



session_start();
if (isset($_GET['page']))
{
    if ($_GET['page']=='home')
    {
        include 'pages/home.php';
    }
    elseif ($_GET['page']=='about')
    {
        include 'pages/about.php';
    }
    elseif ($_GET['page']=='dashboard')
    {
        include 'pages/backend/dashboard.php';
    }
    elseif ($_GET['page']=='add')
    {
        include 'pages/backend/add.php';
    }
    elseif ($_GET['page']=='manage')
    {
        $product= new Product();
        $products = $product->getAllProductInfo();
        include 'pages/backend/manage.php';
    }
    elseif ($_GET['page']=='logout')
    {
        $auth= new Auth();
        $auth->logout();
    }
    elseif ($_GET['page']=='edit')
    {
        $id=$_GET['id'];
        $product= new Product();
        $productInfo =$product->getProductInfoById($id);
        extract($productInfo);
        include 'pages/backend/product-edit.php';
    }
    elseif ($_GET['page']=='delete')
    {
        $id=$_GET['id'];
        $product= new Product();
        $product->deleteProductInfo($id);
        $products = $product->getAllProductInfo();
        include 'pages/backend/manage.php';
    }


}
elseif (isset($_GET['status']))
{
    if ($_GET['status']=='manage')
    {
        $student= new Crud();
        $students =$student->getAllStudentInfo();

        include 'pages/backend/massage-manage.php';

    }
    elseif ($_GET['status']=='edit')
    {
        $id=$_GET['id'];
        $student= new Crud();
        $studentInfo = $student->getStudentInfoById($id);
        include 'pages/backend/edit.php';
    }
}

elseif (isset($_POST['btn']))
{
    if ($_POST['btn']=='Login')
    {
        $auth=new Auth($_POST);
        $result = $auth->login();
        include 'pages/home.php';
    }
//    elseif ($_POST['btn']=='Submit')
//    {
//        $subject=$_POST['subject'];
//        $allSubjetc=implode(" ",$subject);
//
//        echo '<br/>';
//        echo $allSubjetc;
//        exit();
////        $crud= new Crud($_POST);
////        $crud->add();
//    }
    elseif ($_POST['btn']=='Submit')
    {
        $crud= new Crud($_POST);
        $message = $crud->add();
        include 'pages/backend/dashboard.php';

    }
    elseif ($_POST['btn']=='UpdateBtn')
    {
        $student= new Crud($_POST);
        $message =$student->update();
        $students =$student->getAllStudentInfo();
        include 'pages/backend/massage-manage.php';
    }
    elseif ($_POST['btn']=='Create New Product')
    {
        $product= new Product($_POST,$_FILES);
        $message = $product->save();
        include 'pages/backend/add.php';
    }
    elseif ($_POST['btn']=='Update Product')
    {
        $id=$_POST['id'];
        $product=new Product($_POST, $_FILES);
        $productInfo =$product->getProductInfoById($id);
        $product->updateProductInfo($productInfo);

        $products = $product->getAllProductInfo();

        include 'pages/backend/manage.php';
    }

}
