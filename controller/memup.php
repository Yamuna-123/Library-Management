<?php  require_once '../db/query.php'; 

    $id=$_POST['id'];
    $plan=$_POST['plan'];
    $date=date('y-m-d'); 
    $sql="SELECT Pl_valid FROM plan where Plan_Id='$plan'";
    $sqlh=new library();
    $result=$sqlh->getdata($sql);
    foreach($result as $row){
        $id1=$row['Pl_valid'];
    }       
    $sql1="SELECT DATE_ADD('$date',INTERVAL $id1) as date";
    $result1=$sqlh->getdata($sql1); 
    foreach($result1 as $row){
        $id2=$row['date'];
    } 
    //echo $id1;
    //print_r($result1);
    $sql2="INSERT INTO activation (Plan_Id,Mem_Id,Plan_Start,plan_End,Status) 
          VALUES('$plan','$id','$date','$id2','Pending')";
    $sqlh->editdata($sql2);
    $sql3="UPDATE member SET Status='Pending' where Mem_Id=$id";
    $sqlh->editdata($sql3);
        header("location:../profile.php");
?> 