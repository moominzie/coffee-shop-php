<?php
session_start();
error_reporting(0);
include('includes/connection.php');
    ?>
<html lang="en">
<head>
<title>Contact Shop</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

    <!-- BOOTSTRAP CORE STYLE  -->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <!-- FONT AWESOME STYLE  -->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <!-- CUSTOM STYLE  -->
    <link href="assets/css/style.css" rel="stylesheet" />
    <!-- GOOGLE FONT -->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' /> 


  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Pridi:wght@200&display=swap" rel="stylesheet">

  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;400&display=swap" rel="stylesheet">

  <link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Abril+Fatface&display=swap" rel="stylesheet">
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Oswald&display=swap" rel="stylesheet">
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;400&family=Pridi:wght@200&family=Prompt:wght@200&display=swap" rel="stylesheet">
  <link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Mitr:wght@300&family=Oswald&display=swap" rel="stylesheet">

<link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Caveat:wght@700&display=swap" rel="stylesheet">
</head>
<body>
   <!------MENU SECTION START-->
   <?php include('includes/header.php');?>
<!-- MENU SECTION END-->

<form action="" method="post" enctype="multipart/form-data">
    <div class="container">
    <div class="row pad-botm">
            <div class="col-md-12">
                <h4 class="header-line">Contact Us</h4>
                
                            </div>

        </div>
    <div class="panel panel-warning" style="margin-left:20%; margin-right:20%">
        <div class="panel-heading" style="font-size:16px">Contact Form</div>
        <div class="panel-body" style="">

        <div class="form-group">
        <label style="font-family: 'Oswald', sans-serif;">Enter Name</label>
        <input class="form-control" type="text" name="" autocomplete="off" required />
    </div>
              
    <div class="form-group">
        <label style="font-family:'Oswald', sans-serif;">Enter Email</label>
        <input class="form-control" type="text" name="" autocomplete="off" required />
    </div>

    <div class="form-group">
        <label style="font-family: 'Oswald', sans-serif;">Enter Mobile Phone</label>
        <input class="form-control" type="password" name="" autocomplete="off" required />
    </div>

    <div class="form-group">
        <label style="font-family: 'Oswald', sans-serif;">Comment</label>
        <input class="form-control" type="password" name="" autocomplete="off" required />
    </div>

    <input type="submit" class="btn btn-warning" style="margin-top: 15px; width: 150px; font-family: 'Mitr', sans-serif; font-size: 16px" value="Send Message" name="save">
    </div>
        </div>
      </div>
    </div>
  </form>
</body>
</html>

