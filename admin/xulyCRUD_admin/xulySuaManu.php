<?php 
include "../../config.php";
include "../models/db.php";
include "../models/manufacture.php";

$manu = new Manufacture();
if(isset($_POST['submit'])){
    $id = $_POST['id'];
    $name = $_POST['name'];
    var_dump($name);
   if ($manu->SuaManu($name,$id)) {
    header('location:.././manufacture.php');
   }
}

?>