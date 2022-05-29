<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title> Add Category </title>
    <link rel="stylesheet" href="controller/css/bootstrap.min.css" />
    <link rel="stylesheet" href="controller/css/style.css" />
	<link rel="stylesheet" href="controller/css/home.css" />
    </head>
  <body>
      <?php include 'navbar.php'; ?>
    <br/>
    <h1 class='h3' align='center'> Add Category </h1>
    <br/>
    <div class="container">
      <div class="row justify-content-md-center">
        <div class="col-sm-4">
		  <form action="controller/catins.php" method="post" name='myform'> 
              <div class="row">
                <div class="col-sm-12">
                  <div class="form-group">
                    <label> Category Name </label>
                    <input type="text" class="form-control" name="name"/>
                    <span id="name" style="color:red"></span>
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
                var name=document.myform.name.value;
                var s=true;
                if(name==""||name==null){
                    document.getElementById("name").innerHTML="This field is required*";
                    s=false;
                }else{
                    document.getElementById("name").innerHTML=" ";
                }
                return s;
            } </script>
      </div> 
    <script src="controller/js/bootstrap.min.js"></script>
  </body>
</html>
