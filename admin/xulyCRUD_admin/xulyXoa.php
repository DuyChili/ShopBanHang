<?php


include "../../config.php";
include "../models/db.php";
include "../models/product.php";
include "../models/protype.php";
include "../models/manufacture.php";
$product = new Product();
$type = new ProType();
$manu = new Manufacture();
if(isset($_GET['id_product'])){
    $id_product = $_GET['id_product'];
    $product->XoaProduct($id_product);
    header('location:.././product.php');
}

if (isset($_GET['id_type'])) {
    $id_type = $_GET['id_type'];
    if ($product->KiemTraIdType($id_type)) {
        header('location:.././protype.php?messagethongbao=Không thể xóa Type này!!!');
    }else{
        $type -> XoaProType($id_type);
    header('location:.././protype.php');
    }
    
}
if (isset($_GET['id_manu'])) {
   $id_manu = $_GET['id_manu'];
   if ($product->KiemTraIdManu($id_manu)) {
    header('location:.././manufacture.php?messagethongbao=Không thể xóa Manu này!!!');
   }
   else{
    $manu->DeleteManu($id_manu);
    header('location:.././manufacture.php');
   }
  
}

?>