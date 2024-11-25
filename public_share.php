<?php
$directory = './uploads/';


if (!is_dir($directory)) {
    die("The directory does not exist: $directory");
}

// Get all files in the directory
$files = scandir($directory);

// Filter out the current and parent directory references ('.' and '..')
$files = array_diff($files, ['.', '..']);

// Display the list of files
foreach ($files as $file) {

    $fileName = $file;

    // Split the string by '===='
    $file = explode(
        '====',
        $fileName
    );
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />

    <title>All Share</title>

    <!-- Custom fonts for this template -->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet" />

    <!-- Custom styles for this template -->
    <link href="css/sb-admin-2.min.css" rel="stylesheet" />

    <!-- Custom styles for this page -->
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet" />

    <!-- new add -->

    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script> -->

    <style>
        /* Additional styling for the modal */
        .modal-header {
            background-color: #007bff;
            color: white;
        }

        .btn-upload {
            background-color: #28a745;
            color: white;
        }

        .btn-upload:hover {
            background-color: #218838;
            color: white;
        }

        .rounded-logo {
            width: 25%;
            /* Same as w-25 */
            border-radius: 50%;
            color: white;
            /* Makes it round */
            border: 5px solid #007bff;
            /* Blue border */
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            /* Subtle shadow */
            overflow: hidden;
            /* Ensure rounded edges clip the image */
            object-fit: cover;
            /* Ensures the image fits well inside */
        }
    </style>
</head>

<body id="page-top">
    <!-- Page Wrapper -->
    <div id="wrapper">
        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="#">
                <div class="sidebar-brand-icon rotate-n-15">

                </div>
                <img class="rounded-logo" src="./img/share-logo.png" alt="logo">
                <div class="sidebar-brand-text mx-3">Easy Share <sup>+</sup></div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0" />

            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link" href="#">
                    <i class="fas fa-fw fa-box-open"></i>
                    <span>All Resource</span></a>
            </li>











            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block" />

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>
        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">
            <!-- Main Content -->
            <div id="content">
                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
                    <!-- Sidebar Toggle (Topbar) -->
                    <form class="form-inline">
                        <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                            <i class="fa fa-bars"></i>
                        </button>
                    </form>

                    <!-- Topbar Search -->
                    <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                        <div class="input-group">
                            <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2" />
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="button">
                                    <i class="fas fa-search fa-sm"></i>
                                </button>
                            </div>
                        </div>
                    </form>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
                                <form class="form-inline mr-auto w-100 navbar-search">
                                    <div class="input-group">
                                        <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2" />
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="button">
                                                <i class="fas fa-search fa-sm"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </li>




                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo 'USER'; ?></span>
                                <img class="img-profile rounded-circle" src="img/undraw_profile.svg" />
                            </a>
                            <!-- Dropdown - User Information -->

                        </li>
                    </ul>
                </nav>

                <!-- End of Topbar -->



                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <!-- Page Heading -->
                    <!-- <h1 class="h3 mb-2 text-gray-800">My ALL share</h1>
                    <p class="mb-4"></a>enjrj jc jcc</p> -->



                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3 d-flex justify-content-between align-items-center">
                            <h6 class="m-0 font-weight-bold text-primary">All Shared Link</h6>
                            <!-- <a href="#" class="btn btn-primary px-2" data-bs-toggle="modal" data-bs-target="#fileUploadModal">
                        <span class="icon text-white-50">
                            <i class="fas fa-plus text-white"></i>
                        </span>
                        <span class="text">share new file</span>
                    </a> -->
                        </div>

                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Resource Name</th>
                                            <th>File Type</th>
                                            <th>Date</th>
                                            <th>Sender</th>
                                            <th>Downlod</th>

                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Resource Name</th>
                                            <th>File Type</th>
                                            <th>Date</th>
                                            <th>Sender</th>
                                            <th class="text-center">Downlod</th>

                                        </tr>
                                    </tfoot>
                                    <tbody>

                                        <?php foreach ($files as $file) {

                                            $fileName = $file;

                                            // Split the string by '===='
                                            $fileDetails = explode(
                                                '====',
                                                $fileName
                                            );
                                        ?>

                                            <tr>
                                                <td>
                                                    <?php if ($fileDetails[0] != null) {
                                                        echo $fileDetails[0];
                                                    } ?>
                                                </td>
                                                <td>
                                                    <?php if ($fileDetails[1] != null) {
                                                        echo $fileDetails[1];
                                                    } ?>
                                                </td>
                                                <td>
                                                    <?php
                                                    if ($fileDetails[2] != null) {
                                                        $formattedDate = date("d F Y", strtotime($fileDetails[2]));
                                                        echo $formattedDate;
                                                    }
                                                    ?>
                                                </td>
                                                <td>
                                                    <?php
                                                    if ($fileDetails[3] != null) {

                                                        echo $fileDetails[3];
                                                    }
                                                    ?>
                                                </td>

                                                <?php if ($fileName == null) { ?>
                                                    <td class="text-center">
                                                        file not found
                                                    </td>

                                                <?php } else { ?>


                                                    <td class="text-center">
                                                        <a href="<?php echo ($fileName != null) ? './uploads/' . $fileName : '#'; ?>"
                                                            download
                                                            class="btn btn-primary btn-circle btn-sm">
                                                            <i class="fas fa-download"></i>
                                                        </a>
                                                    </td>

                                                <?php } ?>


                                            </tr>

                                        <?php } ?>

                                        <!-- <tr>
                                            <td>Data Structure and Algorithm</td>
                                            <td>.pdf</td>

                                            <td>10/10/2024</td>
                                            <td class="text-center">
                                                <a href="#" class="btn btn-primary btn-circle btn-sm">
                                                    <i class="fas fa-download"></i>
                                                </a>
                                            </td>
                                            <td class="text-center">
                                                <a href="#" class="btn btn-danger btn-circle btn-sm">
                                                    <i class="fas fa-trash"></i>
                                                </a>
                                            </td>
                                        </tr> -->

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.container-fluid -->
            </div>
            <!-- End of Main Content -->




            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Your easy share 2024</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->
        </div>
        <!-- End of Content Wrapper -->
    </div>
    <!-- End of Page Wrapper -->

    <!-- Modal -->
    <div class="modal fade" id="fileUploadModal" tabindex="-1" aria-labelledby="fileUploadModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="fileUploadModalLabel">Upload New Resource</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="upload.php" id="fileUploadForm" method="post" enctype="multipart/form-data">
                        <!-- Resource Title Input -->
                        <div class="mb-3">
                            <label for="resourceTitle" class="form-label">Resource Title</label>
                            <input type="text" name="resourceTiitle" class="form-control" id="resourceTitle" placeholder="Enter resource title" required>
                        </div>
                        <!-- File Upload Input -->
                        <div class="mb-3">
                            <label for="fileInput" class="form-label">Choose File</label>
                            <input type="file" name="fileToUpload" class="form-control" id="fileInput" required>
                        </div>

                        <input type="hidden" name="user_id" value="<?php echo $_SESSION['id']; ?>">

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

                            <button style="text-align: right;" type="submit" name="submit" class="btn btn-upload">Upload</button>
                        </div>
                    </form>
                </div>
                <!-- <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

                    <button type="submit" name="submit" onclick="" class="btn btn-upload">Upload</button>
                </div> -->
            </div>
        </div>
    </div>

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="logout.php">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/datatables-demo.js"></script>

    <!-- Bootstrap JS and Dependencies -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>