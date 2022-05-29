<html>
    <head>
    <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title> Category</title>
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
        <?php include 'navbar.php';
            include_once 'db/query.php';
            $id=$_POST['id'];
            $sql1="SELECT * FROM category";
            if($id==0){
                $sql="SELECT * FROM category";
            }else{
                $sql="SELECT * FROM category where Catg_Id=$id";
            }  
            $sqlh=new library();
            $result=$sqlh->getdata($sql);
            $result1=$sqlh->getdata($sql1);
        ?>
        <br/>
        <div> 
           <a href='add category.php'> <button class='btn btn-outline-success'> Add Category </button> </a>
           &nbsp; &nbsp; &nbsp;
           <form action='catg1.php' method="post" align='center'>
                   <label class='h6'> Category </label>
                         <select class='col-md-2' name='id'>
                        <option value='All'> All </option>
                            <?php 
                                foreach($result1 as $row){
                                    echo "<option value='".$row['Catg_Id']."'>".$row['Catg_Name']."</option>";
                                }
                            ?>
                    </select>  &nbsp;
                    <button type='submit' class='btn btn-secondary'> Go </button>
        </form>
        </div> <br/>
        <div> 
      <h3 class='h5' align="center"> Category Details </h3> <br/>
      </div>
        <div style="margin:0px 20%">
      <table class="table table-striped">
        <tr align='center'>
          <th> # </th>
          <th> Category Id </th>
          <th> Category Name </th>
        </tr>
        <?php 
            $i=1;
            foreach($result as $key=>$row){
                echo "<tr> <td> $i </td>";
                echo "<td>".$row['Catg_Id']."</td>";
                echo "<td>".$row['Catg_Name']."</td>";
                $i=$i+1;
              }
              echo "</table>";
        ?>
      </table>
    </div>            
    </body>
</html>