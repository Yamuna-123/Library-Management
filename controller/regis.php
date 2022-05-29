<?php  require_once '../db/query.php'; 

    $fname=$_POST['fname'];
    $lname=$_POST['lname'];
    $email=$_POST['email'];
    $mob=$_POST['mob'];
    $dob=$_POST['dob'];
    $pass=$_POST['pass'];
    $gen=$_POST['gen'];
      
    $sql="INSERT INTO member(Firstname,Lastname,Gender,Mobile,DOB,Email,Status) 
          VALUES('$fname','$lname','$gen','$mob','$dob','$email','Inactive')";
    $sql1="INSERT INTO login(Username,Password,Status) VALUES ('$email','$pass','U')";
      $sqlh=new library();
      $sqlh->editdata($sql);
      $sqlh->editdata($sql1);
      header("location:../index.php");
?>