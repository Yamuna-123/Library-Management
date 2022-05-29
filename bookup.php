
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title> Update Book </title>
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
      <?php include 'navbar.php'; 
        include_once 'db/query.php'; 
        $sql="SELECT * FROM category";
        $sqlh=new library();
        $result=$sqlh->getdata($sql);
      ?>
     <div class="container">
      <div class="row justify-content-md-center">
			<form autocomplete="off" method="post" name="myform" action='controller/bookadd.php' enctype="multipart/form-data"> 
              <div class="row">
                <div class="col-sm-6">
                  <div class="form-group">
                    <label> Book Name </label>
                    <input type="text" class="form-control" name="bname" autocomplete="off"/>
                    <span id="bname" style="color:red"></span>
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="form-group">
                    <label> Author Name </label>
                    <input type="text" class="form-control" name="aname" autocomplete="off"/>
                    <span id="aname" style="color:red"></span>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-sm-6">
                  <div class="form-group">
                    <label> published Year </label>
                    <input type="year" name="pub" class="form-control" autocomplete="off"/>
                    <span id="pub" style="color:red"></span>
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="form-group">
                    <label> Price </label>
                    <input type="number" name="price" class="form-control" autocomplete="off"/>
                    <span id="price" style="color:red"></span>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-sm-12">
                  <div class="form-group">
                    <label> Category </label>
                    <select class='form-control' name='catg'>
                        <option>  </option>
                            <?php 
                                foreach($result as $row){
                                    echo "<option value='".$row['Catg_Id']."'>".$row['Catg_Name']."</option>";
                                }
                            ?>
                    </select>
                    <span id="catg" style="color:red"></span>
                  </div>
                </div>
              </div>
              <div class="row">
              <div class="col-sm-12">
                  <div class="form-group">
                    <label> Upload Book </label>
                    <input type="file" name="upbk" class="form-control" autocomplete="off"/>
                    <span id="upbk" style="color:red"></span>
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
                var bname=document.myform.bname.value;
                var aname=document.myform.aname.value;
                var pub=document.myform.pub.value;
                var catg=document.myform.catg.value;
                var upbk=document.myform.upbk.value;
                var price=document.myform.price.value;
                var s=true;
                if(bname==""||bname==null){
                    document.getElementById("bname").innerHTML="This field is required*";
                    s=false;
                }else{
                    document.getElementById("bname").innerHTML=" ";
                }
                if(aname==""||aname==null){
                    document.getElementById("aname").innerHTML="This field is required*";
                    s=false;
                }else{
                    document.getElementById("aname").innerHTML=" ";
                }
                if(pub==""||pub==null){
                    document.getElementById("pub").innerHTML="This field is required*";
                    s=false;
                }else{
                    document.getElementById("pub").innerHTML=" ";
                } 
                if(catg==""||catg==null){
                    document.getElementById("catg").innerHTML="This field is required*";
                    s=false;
                } else{
                    document.getElementById("catg").innerHTML=" ";
                }
                if(upbk==""||upbk==null){
                    document.getElementById("upbk").innerHTML="This field is required*";
                    s=false;
                }else{
                    document.getElementById("upbk").innerHTML=" ";
                }
                if(price==""||price==null){
                    document.getElementById("price").innerHTML="This field is required*";
                    s=false;
                }else{
                    document.getElementById("price").innerHTML=" ";
                }
                return s;
            } </script>
      </div> 
    </div>
  </body> 
</html>
