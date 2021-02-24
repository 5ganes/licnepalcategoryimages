<?php 
    ini_set('display_errors', 1);
    require '../models/databaseTable.php'; 
    $image  = new DatabaseTable('tbl_category_images');

    // get category by id
    $category = new DatabaseTable('tbl_category');
    $categorySingle = $category->find('id', $_GET['catId']);

    if(isset($_POST['add'])){
        unset($_POST['add']);
        $imageName = rand(1, 1000000) . str_replace(' ', '', strtolower($_FILES['image']['name']));
        $tmp_loc = $_FILES["image"]["tmp_name"];
        move_uploaded_file($tmp_loc, "uploads/" . $imageName);
        $_POST['name'] = $imageName;
        $image->insert($_POST);
        header('Location:addImage.php?catId='.$_POST['categoryId'].'&msg=Image Added Successfully');
    }

    $imageList = $image->findImagesByCatId($_GET['catId']);

    if(isset($_GET['did'])){
        $imageSingle = $image->find('id', $_GET['did']);
        if(file_exists('uploads/' . $imageSingle['name'])){
            unlink('uploads/' . $imageSingle['name']);
        }
        $image->delete('id', $_GET['did']);
        header('Location:addImage.php?catId='.$_GET['catId'].'&msg=Image Deleted Successfully');
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

                <!-- display msg -->
                <?php if(isset($_GET['msg'])){?>
                    <div class="alert alert-success alert-dismissible" role="alert" style="margin-top:5px;">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                        <strong>Success!</strong> <?php echo $_GET['msg']; ?>.
                    </div>
                <?php }?>

                <!-- Page Title and Breadcrumbs-->
                <ol class="breadcrumb">
                    <li>Add Image / <?php echo $categorySingle['name'];?></li>
                    <li class="breadcrumb-item">
                        <a href="index.php">Dashboard</a> / Image / ImageAdd
                    </li>
                </ol>

                <div class="card card-form mx-auto mt-12 col-sm-6">
                    <div class="card-body">
                        <form method="POST" action="" enctype="multipart/form-data">
                            <input type="hidden" name="categoryId" value="<?php echo $categorySingle['id'];?>">
                            <div class="form-group ">
                                <div class="form-label-group">
                                    <input type="file" name="image">                         
                                </div>
                            </div>

                            <input type="submit" name="add" value="Add Image" class="btn btn-primary">
                            <input type="reset" name="reset" value="Reset" class="btn btn-primary">
                            <a href="categories.php" class="btn btn-primary">Cancel</a>
                        </form>
                    </div>
                </div>
                <hr>
                
                <!-- image list -->
                <div class="card card-form mx-auto mt-12 col-sm-12">
                    <div class="card-body">
                        <div class="row">
                            <?php foreach($imageList as $img){?>
                                <div class="col-sm-3" style="margin-bottom: 1%;">
                                    <img src="uploads/<?php echo $img['name'];?>" style="max-width: 100%;">
                                    <a href="addImage.php?did=<?php echo $img['id'];?>&catId=<?php echo $_GET['catId'];?>">Delete</a>
                                </div>
                            <?php }?>
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
    <!-- <script src="datatables/jquery.dataTables.js"></script>
    <script src="datatables/dataTables.bootstrap4.js"></script>
    <script src="datatables/datatables-demo.js"></script> -->

</body>
</html>