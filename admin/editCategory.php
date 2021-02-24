<?php 
    require '../models/databaseTable.php'; 
    $category  = new DatabaseTable('tbl_category');
    $categorySingle = $category->find('id', $_GET['id']);

    if(isset($_POST['add'])){
        unset($_POST['add']);
        $category->update($_POST, 'id');
        header('Location:categories.php?msg=Category Updated Successfully');
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<title>Admin Control Panel</title>

	<!-- Custom styles for this template-->
	<link href="./css/sb-admin.css" rel="stylesheet">

    <!-- data table css -->
    <!-- <link href="./datatables/dataTables.bootstrap4.css" rel="stylesheet"> -->

</head>
<body>
    <nav class="navbar navbar-expand navbar-dark bg-dark static-top">
        <a class="navbar-brand mr-1" href="index.php">Admin Control Panel</a>
    </nav>  

    <div id="wrapper">  
        <!-- Sidebar -->
        <?php require '../views/admin/sidebar.php'; ?>
        <div id="content-wrapper">
            <div class="container-fluid">

                <!-- Page Title and Breadcrumbs-->
                <ol class="breadcrumb">
                    <li>Add Category</li>
                    <li class="breadcrumb-item">
                        <a href="index.php">Dashboard</a> / Category / CategoryEdit
                    </li>
                </ol>

                <div class="card card-form mx-auto mt-12 col-sm-6">
                    <div class="card-body">
                        <form method="POST" action="">
                            <input type="hidden" name="id" value="<?php echo $categorySingle['id']; ?>">
                            <div class="form-group ">
                                <div class="form-label-group">
                                    <input type="text" id="name" class="form-control" placeholder="Category Name" name="name" required value="<?php echo $categorySingle['name'] ?>">
                                    <label for="name">Category Name</label>                         
                                </div>
                            </div>

                            <input type="submit" name="add" value="Add Category" class="btn btn-primary">
                            <input type="reset" name="reset" value="Reset" class="btn btn-primary">
                            <a href="categories.php" class="btn btn-primary">Cancel</a>
                        </form>
                    </div>
                </div>
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
    <script src="./js/jquery.min.js"></script>
    <script src="./js/bootstrap.bundle.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin.min.js"></script>  



    <!-- data table js -->
    <!-- <script src="datatables/jquery.dataTables.js"></script>
    <script src="datatables/dataTables.bootstrap4.js"></script>
    <script src="datatables/datatables-demo.js"></script> -->

</body>
</html>