<?php
class Manufacture extends Db{
    //Viet phuong thuc lay ra tat ca san pham moi nhat
    function getAllManu(){
        $sql = self::$connection->prepare("SELECT * 
        FROM manufactures ORDER BY created_at DESC");
        $sql->execute();//return an object
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items; //return an array
    }
    public function HienThiMotManu($id)
    {
        $sql = self::$connection->prepare("SELECT * FROM manufactures WHERE id_manu = ?");
        $sql->bind_param("i", $id);
        $sql->execute();
        return $sql->get_result()->fetch_assoc(); // Trả về một dòng dưới dạng mảng liên kết
    }
    function DeleteManu($id) {
        $sql = self::$connection->prepare("DELETE FROM `manufactures` WHERE `id_manu` = ?");
        $sql->bind_param("i", $id);
        if ($sql->execute()) {
            return true;
        }
        else{
            return false;
        }
       
    }
    function ThemManu($name){
        $sql = self::$connection->query("INSERT INTO `manufactures`(`name_manu`) VALUES ('$name')");
        if ($sql) {
            return true;
        }
        else{
            return false;
        }
    }
    function SuaManu($name, $id){
        $sql = self::$connection->prepare("UPDATE `manufactures` SET `name_manu`= ? WHERE id_manu = ?");
        $sql->bind_param("si",$name,$id);
        if ($sql->execute()) {
            return true;
        }
        else{
            return false;
        }
    }

    
    
    
    
}