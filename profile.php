<html>
    <head>
    <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title> User Profile </title>
        <link rel="stylesheet" href="controller/css/bootstrap.min.css" />
        <link rel="stylesheet" href="controller/css/style.css" />
        <link rel="stylesheet" href="controller/css/home.css" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <style> 
            div.r1{
                margin:-40px 0px 0px 0px;
            }
        </style>
    </head>
    <body>
        <?php session_start();
            $mail=$_SESSION['sname'];
            include 'usenav.php';
            include_once 'db/query.php'; 
            $sql="SELECT * FROM member where Email='$mail'";
            $sqlh=new library();
            $result=$sqlh->getdata($sql);
        ?>
        <br/>
        <div> 
      <h3 class='h5' align="center"> Profile </h3> <br/>
      </div>
        <div>
      <table class="table table-striped">
        <tr align='center'>
          <th> # </th>
          <th> User Id </th>
          <th> Name </th>
          <th> Gender </th>
          <th> D.O.B </th>
          <th> E-mail </th>
          <th> Mobile Number </th>
          <th> Status </th>
        </tr>
        <?php 
            $i=1;
            foreach($result as $key=>$row){
                echo "<tr> <td> $i </td>";
                echo "<td>".$row['Mem_Id']."</td>";
                echo "<td>".$row['Firstname']." ".$row['Lastname']."</td>";
                if($row['Gender']=='F'){
                  echo "<td> Female </td>";
                }else{
                    echo "<td> Male </td>"; 
                }
                echo "<td>".$row['DOB']."</td>";
                echo "<td>".$row['Email']."</td>";
                echo "<td>".$row['Mobile']."</td>";
                echo "<td>".$row['Status']."</td>";
                $i=$i+1;
              }
              echo "</table>";
        ?>
      </table>
    </div>            
    </body>
</html>