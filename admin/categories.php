<?php 
    require '../models/databaseTable.php'; 
    $category  = new DatabaseTable('tbl_category');
    // var_dump($category);

    if(isset($_GET['id'])){
        $imageUnderCatList = $category->findImagesByCatId($_GET['id']);
        if($imageUnderCatList->rowCount() == 0){
            $category->delete('id', $_GET['id']);
            header('Location:categories.php?msg=Category Deleted Successfully');
        }
        else{
            header('Location:categories.php?msg=Category Can Not Be Deleted. There Are Images Under It.'); 
        }
    }

    $categoryList = $category->findAll();

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
    <link href="./datatables/dataTables.bootstrap4.css" rel="stylesheet">

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
                
                <!-- display msg -->
                <?php if(isset($_GET['msg'])){?>
                    <div class="alert alert-success alert-dismissible" role="alert" style="margin-top:5px;">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                        <strong>Success!</strong> <?php echo $_GET['msg']; ?>.
                    </div>
                <?php }?>

                <a href="addCategory.php" class="btn btn-primary btn-sm add-button">
                    <i class="fa fa-plus">&nbsp;</i>Add New Category
                </a>

                <!-- DataTables Example -->
                <div class="card mb-3">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>SN</th>
                                        <th>Category Name</th>
                                        <th style="min-width: 215px;width: 215px;">Action</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                    <th>SN</th>
                                    <th>Category Name</th>
                                    <th>Action</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                    <?php $sn = 1;
                                    foreach($categoryList as $cat){?>
                                        <tr>
                                            <td><?php echo $sn++; ?></td>
                                            <td><?php echo $cat['name']; ?></td>
                                            <td>
                                                <a href="editCategory.php?id=<?php echo $cat['id'];?>" class="btn btn-default btn-sm">
                                                    Edit
                                                </a> &nbsp;
                                                <a href="categories.php?id=<?php echo $cat['id']; ?>" class="btn btn-default btn-sm">
                                                    </i>Delete
                                                </a> &nbsp;
                                                <a href="addImage.php?catId=<?php echo $cat['id']; ?>" class="btn btn-default btn-sm">
                                                    Add Images
                                                </a>
                                            </td>
                                        </tr>
                                    <?php }?>
                                    
                                </tbody>
                            </table>
                        </div>
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
    <script src="datatables/jquery.dataTables.js"></script>
    <script src="datatables/dataTables.bootstrap4.js"></script>
    <script src="datatables/datatables-demo.js"></script>

</body>
</html>