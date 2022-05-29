<?php  require_once '../db/query.php'; 

    $id=$_GET['id']; 
    $sql="UPDATE activation SET Status='Active' where Act_Id='$id'";
    $sqlh=new library();
    $sqlh->editdata($sql);
          
    $sql1="SELECT Mem_Id FROM activation where Act_Id='$id'";
    $result1=$sqlh->getdata($sql1); 
    foreach($result1 as $row){
        $id2=$row['Mem_Id'];
    } 
    //echo $id1;
    //print_r($result1);
    $sql2="UPDATE member SET Status='Active' where Mem_Id='$id2'";
    $sqlh->editdata($sql2);
        header("location:../active.php");
?> 