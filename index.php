<?php 
    require 'models/databaseTable.php';
    $category = new DatabaseTable('tbl_category');
    $categoryList = $category->findAll();
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<title>Images</title>

	<!-- Custom styles for this template-->
	<link href="admin/css/sb-admin.css" rel="stylesheet">
</head>
<body>
    <nav class="navbar navbar-expand navbar-dark bg-dark static-top">
        <a class="navbar-brand mr-1" href="index.php">Image Display</a>
    </nav>  

    <div id="wrapper">  
        <!-- Sidebar -->
        <?php require 'views/front/sidebar.php'; ?>
        <div id="content-wrapper">
            <div class="container-fluid">
                <!-- Page Title and Breadcrumbs-->
                <ol class="breadcrumb">
                    <li>Welcome to Categorywise Image Display app</li>
                    <li class="breadcrumb-item">
                        <a href="index.php">Dashboard</a>
                    </li>
                </ol>
            </div>
            <!-- /.container-fluid -->
            
            <!-- Sticky Footer -->
            <footer class="sticky-footer">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Footer Panel</span>
                    </div>
                </div>
            </footer>
        </div>
        <!-- /.content-wrapper -->
    </div>
    <!-- /#wrapper -->

    <!-- Bootstrap core JavaScript-->
    <!-- <script src="./Smart Help Desk _ Dashboard_files/jquery.min.js"></script> -->
    <!-- <script src="./Smart Help Desk _ Dashboard_files/bootstrap.bundle.min.js"></script> -->

    <!-- Core plugin JavaScript-->
    <!-- <script src="./Smart Help Desk _ Dashboard_files/jquery.easing.min.js"></script> -->

    <!-- Page level plugin JavaScript-->


    <!-- Custom scripts for all pages-->
    <!-- <script src="./Smart Help Desk _ Dashboard_files/sb-admin.min.js"></script>   -->
</body>
</html>