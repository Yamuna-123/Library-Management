<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title> Login validation </title>
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <link rel="stylesheet" href="css/style.css" />
	  <link rel="stylesheet" href="css/home.css" />
  </head>
  <body>
  <nav class="navbar navbar-expand-lg navbar-primary bg-primary">
                    <button
                        class="navbar-toggler"
                        type="button"
                        data-toggle="collapse"
                        data-target="#navbarTogglerDemo03"
                        aria-controls="navbarTogglerDemo03"
                        aria-expanded="false"
                        aria-label="Toggle navigation"
                    >
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div> <a class="navbar-brand" style='color:white;font-size:22px' href=""> &nbsp; e-Library </a> </div>

                    <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
                        <ul class="navbar-nav mt-2 mt-lg-0 navi_linked">
                        <li class="nav-item active">
                            <a class="nav-link" href="../index.php" style="font-size:20px"> Sign In </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../register.php" style="font-size:20px"> Sign Up </a>
                        </li>
                        </ul>
                    </div>
                </nav>
    <br />
        <?php session_start();

          include '../db/query.php';
          
          
           $email=$_POST['name'];
           $password=$_POST['password'];
           $sql="SELECT * FROM login where Username='$email'";
            $sqlh=new library();
            $result=$sqlh->getdata($sql);
                foreach($result as $key=>$row){
                        $name=$row['Username'];
                        $pass=$row['Password'];
                        $role=$row['Status'];
                        if($password==$pass){
                            $_SESSION['sname']=$row['Username'];
                            $_SESSION['srole']=$row['Status'];
                            if($row['Status']=='A'){
                                //echo "Admin";
                                header("location:../dashboard.php");
                            }else{
                                //echo "User";
                                header("location:../books.php");
                            }
                        }else{
                            echo "Password Incorrect";
                            echo"<div align='left'> <br/>
                            <a href='../index.php'>
                                <button class='btn btn-secondary' > << Go Back </button>
                            </a>
                            </div>";
                        }
                    }
                if($result==''||$result==null){
                    echo"User not Found <br/> Please Sign up to register as a user";
                    echo"<div align='left'> <br/> <a href='../index.php'> 
                            <button class='btn btn-secondary' > << Go Back </button> 
                        </a> </div>";
                }
        ?>
    </body>
</html>