<html> 
    <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="css/bootstrap.min.css" />
	  <link rel="stylesheet" href="css/home.css" />
    <link rel="stylesheet" href="css/style.css" />
    <script src="js/bootstrap.min.js"> </script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    </head>
    <body>
        <nav class="navbar navbar-expand-lg navbar-primary bg-primary">
            <button
                class="navbar-toggler"
                type="button"
                data-toggle="collapse"
                data-target="#navbarTogglerDemo03"
                aria-controls="navbarTogglerDemo03"
                aria-expanded="false"
                aria-label="Toggle navigation"
            >
                <span class="navbar-toggler-icon"></span>
            </button>
            <div> <a class="navbar-brand" style='color:white;font-size:22px' href=""> &nbsp; e-Library</a> </div>

            <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
                <ul class="navbar-nav mt-2 mt-lg-0 navi_linked">
                <li class="nav-item active">
                    <a class="nav-link" href="../profile.php" style="font-size:18px"> Profile </a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="../upgrade.php" style="font-size:18px"> Member Upgrade </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../books.php" style="font-size:18px"> e-books </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-warning" href="../index.php" style="font-size:18px">  
                    &nbsp; &nbsp; &nbsp; Logout </a>
                </li>
                </ul>
            </div>
        </nav>
        <br/>
    </body>
<html>

<?php  session_start();
    include '../db/query.php'; 
    $mail=$_SESSION['sname'];
    $id=$_GET['id'];
    
    $sqlh=new library();
    $sql3="SELECT File_Name,File_Path FROM book where Book_Id='$id'";
    $result3=$sqlh->getdata($sql3); 
    foreach($result3 as $row){
        $fname=$row['File_Name'];
        $fpath=$row['File_Path'];
    } 

    $sql1="SELECT Mem_Id FROM member where Email='$mail'";
    $result1=$sqlh->getdata($sql1); 
    foreach($result1 as $row){
        $id2=$row['Mem_Id'];
    } 

    $sql2="SELECT Down_Count FROM download where Book_Id='$id' AND Mem_Id='$id2'";
    $result2=$sqlh->getdata($sql2);
    foreach($result2 as $row){
        $id3=$row['Down_Count'];
    }
    $result4=$sqlh->countdata($sql2);
    $res=mysqli_num_rows($result4);
    //echo $fname."<br/>".$fpath; echo $id." ".$id2." ".$id3;
     if($res>0){
        $id4=$id3+1;
        //echo $id4;
         if($id3<3){
            $sql="UPDATE download SET Down_Count='$id4' where Book_Id='$id' AND Mem_Id='$id2'";
            $sqlh->editdata($sql);
            $file_path = "$fpath";

            header('Content-Description: File Transfer');
            header('Content-Type: application/octet-stream');
            header('Content-Disposition: attachment; filename="'.basename($file_path).'"');
            header('Expires: 0');
            header('Pragma: public');
            header('Content-Length: ' . filesize($file_path));

            // Clear output buffer
            flush();
            readfile($file_path);
            exit(); 
        }else{
         echo "<h5> You have reached the download limit: 3<br/>This book cannot be download again </h5>";
         echo "<br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href='../books.php'><button class='btn btn-outline-secondary'> << Go Back </button> </a>";
        }  
    }else{
        $sql="INSERT INTO download(Mem_Id,Book_Id,Down_Count) VALUES('$id2','$id','1')";
        $sqlh->editdata($sql);
        $file_path = "$fpath";

        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename="'.basename($file_path).'"');
        header('Expires: 0');
        header('Pragma: public');
        header('Content-Length: ' . filesize($file_path));

        // Clear output buffer
        flush();
        readfile($file_path);
        exit(); 
    }
?> 