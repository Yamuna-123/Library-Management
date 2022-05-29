<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title> Premium User </title>
    <link rel="stylesheet" href="controller/css/bootstrap.min.css" />
    <link rel="stylesheet" href="controller/css/style.css" />
	<link rel="stylesheet" href="controller/css/home.css" />
    </head>
  <body>
      <?php session_start();
        $mail=$_SESSION['sname'];
        include 'usenav.php'; 
        include_once 'db/query.php'; 
            $sql="SELECT * FROM plan";
            $sql1="SELECT Mem_Id FROM member where Email='$mail'";
            $sqlh=new library();
            $result=$sqlh->getdata($sql);
            $result1=$sqlh->getdata($sql1);
            foreach($result1 as $row){
                $id=$row['Mem_Id'];
            }
      ?>
    <br/>
    <h1 class='h3' align='center'> Upgrade Membership </h1>
    <br/>
    <div class="container">
      <div class="row justify-content-md-center">
        <div class="col-sm-4">
		  <form action="controller/memup.php" method="post" name='myform'>
          <div class="row">
                <div class="col-sm-12">
                  <div class="form-group">
                    <input type="hidden" class="form-control" name="id" value='<?php echo "$id"; ?>'/>
                  </div>
                </div> 
              <div class="row">
                <div class="col-sm-12">
                  <div class="form-group">
                    <label> Select a plan  </label>
                    <select class='form-control' name='plan'>
                         <option> </option> 
                            <?php 
                                foreach($result as $row){
                                    echo "<option value='".$row['Plan_Id']."'>".$row['Pl_valid']." - Rs.".$row['Amount']."</option>";
                                }
                            ?>
                    </select>
                    <span id="plan" style="color:red"></span>
                  </div>
                </div>
              <div class="row">
                <div class="col-sm-12">
                  <ul class="list-inline pull-right">
                    <li class="list-inline-item">
                      <button type="reset" class="btn btn-danger">Cancel</button>
                    </li>
                    <li class="list-inline-item">
                        <button class="btn btn-success" type="submit" onclick='return validate()'> Request Activate</button>
                    </li>
                  </ul>
                </div>
              </div>
            </form>
         </div>
    </div>
    <script type="text/javascript">
            function validate(){
                var plan=document.myform.plan.value;
                var s=true;
                if(plan==""||plan==null){
                    document.getElementById("plan").innerHTML="This field is required*";
                    s=false;
                }else{
                    document.getElementById("plan").innerHTML=" ";
                }
                return s;
            } </script>
      </div> 
    <script src="controller/js/bootstrap.min.js"></script>
  </body>
</html>
