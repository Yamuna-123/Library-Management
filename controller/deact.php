<?php  require_once '../db/query.php'; 

    $id=$_GET['id'];
          
    $sql="UPDATE book SET Status='Inactive' where Book_Id=$id"; 
      $sqlh=new library();
      $result=$sqlh->editdata($sql);
      header("location:../books.php");
?>