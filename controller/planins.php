<?php  require_once '../db/query.php'; 

    $plan=$_POST['plan'];
    $amt=$_POST['amt'];
          
    $sql="INSERT INTO plan(Pl_valid,Amount) VALUES('$plan','$amt')";
      $sqlh=new library();
      $result=$sqlh->editdata($sql);
      header("location:../plan.php");
?>