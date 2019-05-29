<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>php-id-w10-title-edit</title>
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
                <h4>แก้ไขข้อมูลลูกค้า</h4>    
                <?php
                    include 'connectdb.php';
                    if(isset($_GET['submit'])){
                        $customer_id = $_GET['customer_id'];
                        $fname = $_GET['fname'];
                        $lname = $_GET['lname'];
                        $phone = $_GET['phone'];
                        $email = $_GET['email'];
                        $address = $_GET['address'];
                        $sql        = "update customer set customer_id='$customer_id' where customer_id='$customer_id'";
                        mysqli_query($conn,$sql);
                        mysqli_close($conn);
                        echo "แก้ไข $customer_id เรียบร้อยแล้ว<br>";
                        echo '<a href="customer_list.php">แสดงลูกค้าทั้งหมด</a>';
                    }else{
                        $customer_id = $_REQUEST['customer_id'];
                        $sql =  "SELECT * FROM customer where customer_id='$customer_id'";
                        $result = mysqli_query($conn,$sql);
                        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
                        $customer_id = $row['customer_id'];
                        mysqli_free_result($result);
                        mysqli_close($conn);                        
                ?>
                    <form class="form-horizontal" role="form" name="customer_edit" action="<?php echo $_SERVER['PHP_SELF']?>">
                    <input type="hidden" name="customer_id" id="customer_id" value="<?php echo "$customer_id";?>">
                    <div class="form-group">

                            <label for="customer_id" class="col-md-2 col-lg-2 control-label">รหัส</label>				
                            <div class="col-md-10 col-lg-10">
                                <input type="text" name="customer_id" id="customer_id" class="form-control" value="<?php echo "$customer_id";?>">
                            </div>    
                            <label for="fname" class="col-md-2 col-lg-2 control-label">	ชื่อ</label>
                            <div class="col-md-10 col-lg-10">
                                <input type="text" name="fname" id="fname" class="form-control" value="<?php echo "$fname";?>">
                            </div> 
                            <label for="lname" class="col-md-2 col-lg-2 control-label">นามสกุล</label>
                            <div class="col-md-10 col-lg-10">
                                <input type="text" name="lname" id="lname" class="form-control" value="<?php echo "$lname";?>">
                            </div>    
                            <label for="phone" class="col-md-2 col-lg-2 control-label">เบอร์โทร</label>
                            <div class="col-md-10 col-lg-10">
                                <input type="text" name="phone" id="phone" class="form-control" value="<?php echo "$phone";?>">
                            </div>    
                            <label for="email" class="col-md-2 col-lg-2 control-label">อีเมล์</label>
                            <div class="col-md-10 col-lg-10">
                                <input type="text" name="email" id="email" class="form-control" value="<?php echo "$email";?>">
                            </div>    
                            <label for="address" class="col-md-2 col-lg-2 control-label">ที่อยู่</label>
                            <div class="col-md-10 col-lg-10">
                                <input type="text" name="address" id="address" class="form-control" value="<?php echo "$address";?>">
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
