<?php 
include "../../config.php";
include "../models/db.php";
include "../models/manufacture.php";

$manu = new Manufacture();

if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    if ($manu->ThemManu($name)) {
        header('location:.././manufacture.php');
    }

}


?>