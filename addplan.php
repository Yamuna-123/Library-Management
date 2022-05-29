<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title> Add Plan </title>
    <link rel="stylesheet" href="controller/css/bootstrap.min.css" />
    <link rel="stylesheet" href="controller/css/style.css" />
	<link rel="stylesheet" href="controller/css/home.css" />
    </head>
  <body>
      <?php include 'navbar.php'; ?>
    <br/>
    <h1 class='h3' align='center'> Add Plan </h1>
    <br/>
    <div class="container">
      <div class="row justify-content-md-center">
        <div class="col-sm-4">
		  <form action="controller/planins.php" method="post" name='myform'> 
              <div class="row">
                <div class="col-sm-12">
                  <div class="form-group">
                    <label> Plan Duration </label>
                    <input type="text" class="form-control" name="plan"/>
                    <span id="plan" style="color:red"></span>
                  </div>
                </div>
                <div class="col-sm-12">
                  <div class="form-group">
                    <label> Amount </label>
                    <input type="number" class="form-control" name="amt"/>
                    <span id="amt" style="color:red"></span>
                  </div>
                </div>
              <div class="row">
                <div class="col-sm-12">
                  <ul class="list-inline pull-right">
                    <li class="list-inline-item">
                      <button type="reset" class="btn btn-danger">Cancel</button>
                    </li>
                    <li class="list-inline-item">
                        <button class="btn btn-success" type="submit" onclick='return validate()'>Add</button>
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
                if(amt==""||amt==null){
                    document.getElementById("amt").innerHTML="This field is required*";
                    s=false;
                }else{
                    document.getElementById("amt").innerHTML=" ";
                }
                return s;
            } </script>
      </div> 
    <script src="controller/js/bootstrap.min.js"></script>
  </body>
</html>
