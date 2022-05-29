<?php  require_once '../db/query.php'; 

    $name=$_POST['name'];
          
    $sql="INSERT INTO category(Catg_Name) VALUES('$name')";
      $sqlh=new library();
      $result=$sqlh->editdata($sql);
      header("location:../category.php");
?>