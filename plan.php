<html>
    <head>
    <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title> Plan </title>
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
            $sql="SELECT * FROM plan";
            $sqlh=new library();
            $result=$sqlh->getdata($sql);
        ?>
        <br/>
        <div> 
           <a href='addplan.php'> <button class='btn btn-outline-success'> Add a Plan </button> </a>
           &nbsp; &nbsp; &nbsp;
           <form action='plan1.php' method="post" align='center'>
                   <label class='h6'> Plan </label>
                         <select class='col-md-2' name='id'>
                         <option value='0'> ALL</option> 
                            <?php 
                                foreach($result as $row){
                                    echo "<option value='".$row['Plan_Id']."'>".$row['Pl_valid']." - Rs.".$row['Amount']."</option>";
                                }
                            ?>
                    </select>  &nbsp;
                    <button type='submit' class='btn btn-secondary'> Go </button>
        </form>
        </div> <br/>
        <div> 
      <h3 class='h5' align="center"> Plan Details </h3> <br/>
      </div>
        <div style="margin:0px 20%">
      <table class="table table-striped">
        <tr align='center'>
          <th> # </th>
          <th> Plan Id </th>
          <th> Plan Validity </th>
          <th> Amount </th>
        </tr>
        <?php 
            $i=1;
            foreach($result as $key=>$row){
                echo "<tr> <td> $i </td>";
                echo "<td>".$row['Plan_Id']."</td>";
                echo "<td>".$row['Pl_valid']."</td>";
                echo "<td>".$row['Amount']."</td>";
                $i=$i+1;
              }
              echo "</table>";
        ?>
      </table>
    </div>            
    </body>
</html>