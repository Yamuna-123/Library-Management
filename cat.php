<html>
    <head>
    <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title> Book </title>
        <link rel="stylesheet" href="controller/css/bootstrap.min.css" />
        <link rel="stylesheet" href="controller/css/style.css" />
        <link rel="stylesheet" href="controller/css/home.css" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <style> 
            form{
                margin:-40px 0px 0px 0px;
            }
            select{
               height:35px;
            }
        </style>
    </head>
    <body>
        <?php session_start();
            if($_SESSION['srole']=='A'){ 
                include 'navbar.php';
            }else{
                include 'usenav.php';
            }
            include_once 'db/query.php';
            $mail=$_SESSION['sname']; 
            $id=$_POST['id'];
            if($id=='all'){
                header("location:books.php");
            }else{
                if($_SESSION['srole']=='A'){
                    $sql="SELECT Book_Id,Book_Name,Author_Name,Pub_Year,Price,book.Catg_Id,category.Catg_Name,
                        Status FROM book INNER JOIN category on book.Catg_Id=category.Catg_Id where book.Catg_Id='$id'";
                }else{
                    $sql="SELECT Book_Id,Book_Name,Author_Name,Pub_Year,Price,book.Catg_Id,category.Catg_Name,
                    Status FROM book INNER JOIN category on book.Catg_Id=category.Catg_Id where Status='Active' AND book.Catg_Id='$id'"; 
                }
            }
            $sql1="SELECT * FROM category";
            $sql2="SELECT Book_Id,Book_Name FROM book";
            $sql3="SELECT Status FROM member where Email='$mail'";
            $sqlh=new library();
            $result=$sqlh->getdata($sql);
            $result1=$sqlh->getdata($sql1);
            $result2=$sqlh->getdata($sql2);
            $result3=$sqlh->getdata($sql3);
            foreach($result3 as $row){
                $id2=$row['Status'];
            }
        ?>
        <br/>
        <br/>
        <div> 
        <?php if($_SESSION['srole']=='A'){ 
           echo "<a href='bookup.php'> <button class='btn btn-outline-success'> Book &nbsp; 
                 <i class='fa fa-upload' style='font-size:16px'></i> </button> </a>"; }
                 $mail=$_SESSION['sname'];?>
           &nbsp; &nbsp; &nbsp;
           <form action='cat.php' method="post" align='center'>
                   <label class='h6'> Category </label>
                         <select class='col-md-2' name='id'>
                        <option value='all'> All </option>
                            <?php 
                                foreach($result1 as $row){
                                    echo "<option value='".$row['Catg_Id']."'>".$row['Catg_Name']."</option>";
                                }
                            ?>
                    </select>  &nbsp;
                    <button type='submit' class='btn btn-secondary'> Go </button>
        </form>
        <form action='book.php' method="post" align='right'>
                   <label class='h6'> Book </label>
                         <select class='col-md-2' name='id'>
                        <option value='all'> All </option>
                            <?php 
                                foreach($result2 as $row){
                                    echo "<option value='".$row['Book_Id']."'>".$row['Book_Name']."</option>";
                                }
                            ?>
                    </select>  &nbsp;
                    <button type='submit' class='btn btn-secondary'> Go </button>
        </form>
        </div> <br/>
        <div> 
      <h3 class='h5' align="center"> Book Details </h3> <br/>
      </div> 
        <div style="margin:0px 2%">
      <table class="table table-striped">
        <tr align='center'>
          <th> # </th>
          <th> Book Name </th>
          <th> Author </th>
          <th> Published year </th>
          <th> Price </th>
          <th> Category </th>
          <?php if($_SESSION['srole']=='A'){
              echo"<th> Status </th>"; 
                echo "<th> Deactivate </th>";
            }else{
                if($id2=='Active'){
                echo "<th> Download </th>";}
            } ?>
        </tr>
        <?php 
            $i=1;
            foreach($result as $key=>$row){
                echo "<tr> <td> $i </td>";
                $id=$row['Book_Id'];
                echo "<td>".$row['Book_Name']."</td>";
                echo "<td>".$row['Author_Name']."</td>";
                echo "<td>".$row['Pub_Year']."</td>";
                echo "<td>".$row['Price']."</td>";
                echo "<td>".$row['Catg_Name']."</td>";
                if($_SESSION['srole']=='A'){ 
                    echo "<td>".$row['Status']."</td>";
                    if($row['Status']=='Active'){
                        echo "<td> <a href='controller/deact.php?id=$id'>De-Activate </a> </td>";
                    }else{
                        echo "<td> <a href='controller/act.php?id=$id'>Activate </a> </td>";
                    }
                }else{
                    if($id2=='Active'){
                        echo "<td> <a href='controller/download.php?id=$id'> <button class='btn btn-outline-primary'> 
                          <i class='fa fa-download' style='font-size:16px'></i> </button> </a> </td>";
                    }
                }
                $i=$i+1;
              }
              echo "</table>";
        ?>
      </table>
    </div>            
    </body>
</html>