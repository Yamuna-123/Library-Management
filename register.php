
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title> Registration </title>
    <link rel="stylesheet" href="controller/css/bootstrap.min.css" />
	  <link rel="stylesheet" href="controller/css/home.css" />
    <link rel="stylesheet" href="controller/css/style.css" />
    <script src="controller/js/bootstrap.min.js"> </script>
    <style>
      div.container{
        margin: 50px 30% 25px 30%;
        width:500px;
        padding:25px;
        background-color:whitesmoke; 
      }
    </style>
  </head>
 <body>
      <?php include 'nav.php'; ?>
     <div class="container">
      <div class="row justify-content-md-center">
			<form autocomplete="off" method="post" name="myform" action='controller/regis.php'> 
              <div class="row">
                <div class="col-sm-6">
                  <div class="form-group">
                    <label> First Name</label>
                    <input type="text" class="form-control" name="fname" autocomplete="off"/>
                    <span id="fname" style="color:red"></span>
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="form-group">
                    <label> Last Name</label>
                    <input type="text" class="form-control" name="lname" autocomplete="off"/>
                    <span id="lname" style="color:red"></span>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-sm-6">
                  <div class="form-group">
                    <label> Email Address</label>
                    <input type="email" name="email" class="form-control" autocomplete="off"/>
                    <span id="mail" style="color:red"></span>
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="form-group">
                    <label> Gender </label>
                    <select name='gen' class='form-control'>
                      <option> </option> 
                      <option value='M'> Male </option>
                      <option value='F'> Female </option>
                    </select>
                    <span id="gen" style="color:red"></span>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-sm-6">
                  <div class="form-group">
                    <label> Mobile </label>
                    <input type="number" name="mob" class="form-control" min='1000000000' max='9999999999' autocomplete="off"/>
                    <span id="mob" style="color:red"></span>
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="form-group">
                    <label> DOB </label>
                    <input type="date" name="dob" class="form-control" autocomplete="off"/>
                    <span id="dob" style="color:red"></span>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-sm-6">
                  <div class="form-group">
                    <label> Password </label>
                    <input type="password" name="pass" class="form-control" autocomplete="off"/>
                    <span id="pass" style="color:red"></span>
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="form-group">
                    <label> Confirm Password </label>
                    <input type="password" name="cpass" class="form-control" autocomplete="off"
                    placeholder='Re-Enter the password'/>
                    <span id="cpass" style="color:red"></span>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-sm-12">
                  <ul class="list-inline pull-right">
                    <li class="list-inline-item">
                      <button type="reset" class="btn btn-danger" >Cancel</button>
                    </li>
                    <li class="list-inline-item">
                        <button class="btn btn-success" type="submit" onclick='return validate()'>Register</button>
                    </li>
                  </ul>
                </div>
              </div>
			</form>
    <script type="text/javascript">
            function validate(){
                var fname=document.myform.fname.value;
                var lname=document.myform.lname.value;
                var mail=document.myform.email.value;
                var mob=document.myform.mob.value;
                var dob=document.myform.dob.value;
                var gen=document.myform.gen.value;
                var pass=document.myform.pass.value;
                var cpass=document.myform.cpass.value;
                var s=true;
                if(fname==""||fname==null){
                    document.getElementById("fname").innerHTML="This field is required*";
                    s=false;
                }else{
                    document.getElementById("fname").innerHTML=" ";
                }
                if(lname==""||lname==null){
                    document.getElementById("lname").innerHTML="This field is required*";
                    s=false;
                }else{
                    document.getElementById("lname").innerHTML=" ";
                }
                if(mail==""||mail==null){
                    document.getElementById("mail").innerHTML="This field is required*";
                    s=false;
                }else{
                    document.getElementById("mail").innerHTML=" ";
                } 
                if(mob==""||mob==null){
                    document.getElementById("mob").innerHTML="This field is required*";
                    s=false;
                } else{
                    document.getElementById("mob").innerHTML=" ";
                }
                if(dob==""||dob==null){
                    document.getElementById("dob").innerHTML="This field is required*";
                    s=false;
                }else{
                    document.getElementById("dob").innerHTML=" ";
                }
                if(gen==""||gen==null){
                    document.getElementById("gen").innerHTML="This field is required*";
                    s=false;
                }else{
                    document.getElementById("gen").innerHTML=" ";
                }
                if(cpass==""||cpass==null){
                    document.getElementById("cpass").innerHTML="This field is required*";
                    s=false;
                }else{
                    document.getElementById("cpass").innerHTML=" ";
                }
                if(pass==""||pass==null){
                    document.getElementById("pass").innerHTML="This field is required*";
                    s=false;
                }else{
                    document.getElementById("pass").innerHTML=" ";
                }
                if(cpass!=pass){
                    document.getElementById("cpass").innerHTML="Password doesn't match. Enter the same password";
                    s=false;
                }else{
                    document.getElementById("cpass").innerHTML=" ";
                }
                return s;
            } </script>
      </div> 
    </div>
  </body> 
</html>
