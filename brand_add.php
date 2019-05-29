<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>php-id-w10</title>
        <!-- Bootstrap -->
        <link href="bootstrap/css/bootstrap.css" rel="stylesheet" type="text/css">
        <link href="bootstrap/css/bootstrap-theme.css" rel="stylesheet" type="text/css">
        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="bootstrap/js/jquery.min.js"></script>
        <!-- Include all compiled plugins (below), or include individual files as needed -->
        <script src="bootstrap/js/bootstrap.min.js"></script>        
        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="bootstrap/js/html5shiv.min.js"></script>
            <script src="bootstrap/js/respond.min.js"></script>
        <![endif]-->
    </head>
    <body>        
        <div class="container">
            <div class="row"> 
                <div class="jumbotron" style="background-color: cornflowerblue;">
                    <?php include 'topbanner.php';?>
                </div>
            </div>
            <div class="row">
                <?php include 'menu.php';?>
            </div>
            <div class="row">
                <div class="col-sm-12 col-md-3 col-lg-3">
                    <p>Login Area</p>
                </div>  
                <div class="col-sm-12 col-md-9 col-lg-9">
                <h4>เพิ่มเช่ารถ</h4>    
                <?php
                    if(isset($_GET['submit'])){
                        $Name_car = $_GET['Name_car'];
                        $Description = $_GET['Description'];
                        $sql = "insert into brand (Name_car,Description) values ('$Name_car','$Description')";
                        include 'connectdb.php';
                        mysqli_query($conn,$sql);
                        mysqli_close($conn);
                        echo "เพิ่มเช่ารถ $Name_car เรียบร้อยแล้ว<br>";
                        echo '<a href="brand_list.php">แสดงเช่ารถทั้งหมด</a>';
                    }else{
                ?>
                    <form class="form-horizontal" role="form" name="brand_add" action="<?php echo $_SERVER['PHP_SELF']?>">
                        <div class="form-group">
                            <label for="Name_car" class="col-md-2 col-lg-2 control-label">ยี่ห้อรถ</label>
                            <div class="col-md-10 col-lg-10">
                                <input type="text" name="Name_car" id="Name_car" class="form-control">
                            </div>   
                            <label for="Description" class="col-md-2 col-lg-2 control-label">คำอธิบาย</label>
                            <div class="col-md-10 col-lg-10">
                                <input type="text" name="Description" id="Description" class="form-control">
                            </div>    
                        </div>
                        <div class="form-group">
                            <div class="col-md-10 col-lg-10">
                                <input type="submit" name="submit" value="ตกลง" class="btn btn-default">
                            </div>    
                        </div>
                    </form>
                <?php
                    }
                ?>
                </div>    
            </div>
            <div class="row">
                <address>คณะครุศาสตร์</address>
            </div>
        </div>    
    </body>
</html>