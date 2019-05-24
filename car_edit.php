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
                    <h4>แก้ไขข้อมูลประเภทรถ</h4>
                    <?php
                         include 'connectdb.php';
                         if(isset($_GET['submit'])){
                            $car_brand_id = $_GET['car_brand_id'];
                            $regise_no = $_GET['regise_no'];
                            $engine_no = $_GET['engine_no'];
                            $sql        = "update car set regise_no='$regise_no' where car_brand_id='$car_brand_id'";
                            $sql        = "update car set engine_no='$engine_no' where car_brand_id='$car_brand_id'";
                            include 'connectdb.php';
                            mysqli_query($conn,$sql);
                            mysqli_close($conn);
                            echo "แก้ไขข้อมูลประเภทรถ $regise_no $engine_no เรียบร้อยแล้ว<br>";
                            echo '<a href="car_list.php">แสดงรายชื่อประเภทรถทั้งหมด</a>';
                        }else{
                    ?>
                    <form class="form-horizontal" role="form" name="car_edit" action="<?php echo $_SERVER['PHP_SELF'];?>">
                        <div class="form-group">
                            <input type="hidden" name="car_brand_id" id="car_brand_id" value="<?php echo "$car_id";?>">
                            <label for="car_brand_id" class="col-md-2 col-lg-2 control-label">ชื่อ</label>
                            <div class="col-md-10 col-lg-10">
                                <select name="car_brand_id" id="car_brand_id" class="form-control">
                                <?php
                                    include 'connectdb.php';
                                    $sql2 = "select * from car where car_brand_id='$car_brand_id'";
                                    $result2 = mysqli_query($conn,$sql2);
                                    $row2 = mysqli_fetch_array($result2,MYSQLI_ASSOC);
                                    $regise_no = $row2['regise_no'];
                                    $fengine_no = $row2['engine_no'];
                                    $fcar_id = $row2['car_id'];
                                    $sql =  "SELECT * FROM car order by car_id";
                                    $result = mysqli_query($conn,$sql);
                                    while (($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) != NULL) {
                                        echo '<option value=';
                                        echo '"' . $row['car_id'].'"';
                                        if($row['car_id']==$fcar_id){
                                            echo ' selected="selected" ';
                                        }
                                        echo ">";
                                        echo $row['car_brand_id'];
                                        echo '</option>';
                                    }
                                    mysqli_free_result($result);
                                    mysqli_close($conn);
                                ?>
                                </select>
                           </div>    
                        </div>
                        <div class="form-group">
                            <label for="regise_no" class="col-md-2 col-lg-2 control-label">ทะเบียนรถ</label>
                            <div class="col-md-10 col-lg-10">
                                <input type="text" name="regise_no" id="regise_no" class="form-control" value="<?php echo $regise_no;?>">
                            </div>    
                        </div>    
                        <div class="form-group">
                            <label for="engine_no" class="col-md-2 col-lg-2 control-label">หมายเลขรถ</label>
                            <div class="col-md-10 col-lg-10">
                                <input type="text" name="engine_no" id="engine_no" class="form-control" value="<?php echo $fengine_no;?>">
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