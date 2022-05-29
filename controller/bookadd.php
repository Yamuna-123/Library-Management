<?php
    include_once '../db/query.php';

    $bname=$_POST['bname'];
    $aname=$_POST['aname'];
    $pub=$_POST['pub'];
    $price=$_POST['price'];
    $catg=$_POST['catg'];

    $UploadFileDir='../Uploads/';
    $fileTmpPath=$_FILES['upbk']['tmp_name'];
    $filename=$_FILES['upbk']['name'];

    $dest_path=$UploadFileDir.$filename;
    if(move_uploaded_file($fileTmpPath,$dest_path)){
        echo "Files are moved Successfully<br/>";
    }else{
        echo "Error 1<br/>";
    }

    $sql="INSERT INTO book(Book_Name,Author_Name,Pub_Year,Price,Catg_id,Status,File_Name,File_Path) 
          VALUES('$bname','$aname','$pub','$price','$catg','Active','$filename','$dest_path')";
    $sqlh=new library();
    $sqlh->editdata($sql);
    header("location:../books.php");
?>