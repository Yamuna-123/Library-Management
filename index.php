<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Library Management </title>
    <link rel="stylesheet" href="controller/css/bootstrap.min.css" />
    <link rel="stylesheet" href="controller/css/style.css" />
	<link rel="stylesheet" href="controller/css/home.css" />
  <style>
    .card{
      background-color:whitesmoke;
    }
  </style>
  </head>
  <body>
      <?php include 'nav.php'; ?>
    <br/>
    <h1 class='h3' align='center'> Welcome to e-Library </h1>
    <br/>
    <div class="container">
      <div class="row justify-content-md-center">
        <div class="col-sm-4">
          <div class="card">
		  <form action="controller/login.php" method="post" name='myform'> 
            <h5 class="card-header bg-info">Login</h5>
            <div class="card-body">
              <div class="row">
                <div class="col-sm-12">
                  <div class="form-group">
                    <label> User name </label>
                    <input type="text" class="form-control" name="name" placeholder='Enter the Registered Email'/>
                    <span id="name" style="color:red"></span>
                  </div>
                </div>
                <div class="col-sm-12">
                  <div class="form-group">
                    <label> Password</label>
                    <input type="password" class="form-control" name="password"/>
                    <span id="password" style="color:red"></span>
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col-sm-12">
                  <ul class="list-inline pull-right">
                    <li class="list-inline-item">
                      <button type="reset" class="btn btn-danger">Cancel</button>
                    </li>
                    <li class="list-inline-item">
                        <button class="btn btn-success" type="submit" onclick='return validate()'>Submit</button>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
			</form>
          </div>
        </div>
      </div>
    </div>
    <script type="text/javascript">
            function validate(){
                var name=document.myform.name.value;
                var password=document.myform.password.value;
                var s=true;
                if(name==""||name==null){
                    document.getElementById("name").innerHTML="This field is required*";
                    s=false;
                }else{
                    document.getElementById("name").innerHTML=" ";
                }
                if(password==""||password==null){
                    document.getElementById("password").innerHTML="This field is required*";
                    s=false;
                }else{
                    document.getElementById("password").innerHTML=" ";
                }
                return s;
            } </script>
      </div> 
    <script src="controller/js/bootstrap.min.js"></script>
  </body>
</html>
