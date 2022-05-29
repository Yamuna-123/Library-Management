<html>
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title> Admin Dashboard </title>
        <link rel="stylesheet" href="controller/css/bootstrap.min.css" />
        <link rel="stylesheet" href="controller/css/style.css" />
        <link rel="stylesheet" href="controller/css/home.css" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <style>
            body{
                margin-top:20px;
                background:#FAFAFA;
            }
            .order-card {
                color: #fff;
            }

            .bg-c-blue {
                background: linear-gradient(45deg,#4099ff,#73b4ff);
            }

            .bg-c-green {
                background: linear-gradient(45deg,#2ed8b6,#59e0c5);
            }

            .bg-c-yellow {
                background: linear-gradient(45deg,#FFB64D,#ffcb80);
            }

            .bg-c-pink {
                background: linear-gradient(45deg,#FF5370,#ff869a);
            }


            .card {
                border-radius: 5px;
                -webkit-box-shadow: 0 1px 2.94px 0.06px rgba(4,26,55,0.16);
                box-shadow: 0 1px 2.94px 0.06px rgba(4,26,55,0.16);
                border: none;
                margin-bottom: 30px;
                -webkit-transition: all 0.3s ease-in-out;
                transition: all 0.3s ease-in-out;
            }

            .card .card-block {
                padding: 25px;
            }

            .order-card i {
                font-size: 26px;
            }

            .f-left {
                float: left;
            }

            .f-right {
                float: right;
            }
        </style>
    </head>
    <body>
        <?php session_start(); 
        include 'db/query.php';
        if(isset($_SESSION['sname'])){ ?>
         <?php include 'navbar.php'; 
            $sqlh=new library();
            // $sql="Select count(*) total as category";
            $sql1="SELECT Catg_Id from category";
            $sql2="SELECT Book_Id from book where Status='Active'";
            $sql3="SELECT Mem_Id FROM member";
            $sql4="SELECT Plan_Id FROM plan";
            $res=$sqlh->countdata($sql1);
            $res1=$sqlh->countdata($sql2);
            $res2=$sqlh->countdata($sql3);
            $res3=$sqlh->countdata($sql4);
            $rest=mysqli_num_rows($res);
            $rest1=mysqli_num_rows($res1);
            $rest2=mysqli_num_rows($res2);
            $rest3=mysqli_num_rows($res3);
         ?>
        <br/><br/><br/><br/>
<!--   new code  -->

<div class="container">
    <div class="row">
        <div class="col-md-4 col-xl-3">
            <div class="card bg-c-blue order-card">
                <div class="card-block">
                    <h5 class="m-b-20"> Total Books </h5>
                    <br/>
                    <h2 class="text-center"><i class="fa fa-book f-left"></i><span><?php echo $rest1; ?></span></h2>
                </div>
            </div>
        </div>
        
        <div class="col-md-4 col-xl-3">
            <div class="card bg-c-green order-card">
                <div class="card-block">
                    <h5 class="m-b-20"> Available Categories </h5>
                    <br/>
                    <h2 class="text-center"><i class="fa fa-gears f-left"></i><span><?php echo $rest; ?></span></h2>
                </div>
            </div>
        </div>
        
        <div class="col-md-4 col-xl-3">
            <div class="card bg-c-yellow order-card">
                <div class="card-block">
                    <h5 class="m-b-20"> Registered Users </h5>
                    <br/>
                    <h2 class="text-center"><i class="fa fa-users f-left"></i><span><?php echo $rest2; ?></span></h2>
                </div>
            </div>
        </div>
        
        <div class="col-md-4 col-xl-3">
            <div class="card bg-c-pink order-card">
                <div class="card-block">
                    <h5 class="m-b-20"> Available Plans </h5>
                    <br/>
                    <h2 class="text-center"><i class="fa fa-credit-card f-left"></i><span><?php echo $rest3; ?></span></h2>
                </div>
            </div>
        </div>
	</div>
</div>

<!--new code -->
        <?php }else{
            include 'nav.php';
            echo "Please login to see details";
            echo "<br/> <a href='index.php'> <button class='btn btn-primary'> Login </button> </a>";
        } ?>
    </body>
</html>