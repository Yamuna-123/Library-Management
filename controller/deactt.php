<?php  require_once '../db/query.php'; 

    $id=$_GET['id']; 
    $sqlh=new library();
          
    $sql2="UPDATE member SET Status='Inactive' where Mem_Id='$id'";
    $sqlh->editdata($sql2);
        header("location:../inact.php");
?> 