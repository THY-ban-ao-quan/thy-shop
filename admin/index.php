<?php
ob_start();

session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - Tables</title>

    <!-- Custom fonts for this template -->
    <link href="./assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="./assets/css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="./assets/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

    <!-- ckeditor -->
    <script type="text/javascript" src="../../../ckeditor/ckeditor.js"></script>

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-laugh-wink"></i>
                </div>
                <div class="sidebar-brand-text mx-3">THY<sup>shop</sup></div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Chức năng
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link" href="index.php">
                    <i class="fas fa-fw fa-chart-area"></i>
                    <span>Trang chủ</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link collapsed" href="?mod=donhang">
                    <i class="fas fa-list"></i>
                    <span>Quản lý đơn hàng</span>
                </a>
            </li>
            <!-- list danh mục -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="?mod=taikhoan">
                    <i class="fas fa-list"></i>
                    <span>Quản lý Tài khoản</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link collapsed" href="?mod=danhmuc">
                    <i class="fas fa-list"></i>
                    <span>Quản lý danh mục</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-list"></i>
                    <span>Quản lý loại sản phẩm</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <?php
                        require_once("views/danhmucView.php")
                        ?>
                    </div>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link collapsed" href="?mod=sanpham">
                    <i class="fas fa-list"></i>
                    <span>Quản lý sản phẩm</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link collapsed" href="?mod=mau">
                    <i class="fas fa-list"></i>
                    <span>Quản lý màu</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link collapsed" href="?mod=size">
                    <i class="fas fa-list"></i>
                    <span>Quản lý size</span>
                </a>
            </li>




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
                            <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
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
                                        <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="button">
                                                <i class="fas fa-search fa-sm"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </li>

                        <!-- Nav Item - Alerts -->
                        <li class="nav-item dropdown no-arrow mx-1">
                            <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-bell fa-fw"></i>
                                <!-- Counter - Alerts -->
                                <span class="badge badge-danger badge-counter">3+</span>
                            </a>
                            <!-- Dropdown - Alerts -->
                            <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="alertsDropdown">
                                <h6 class="dropdown-header">
                                    Alerts Center
                                </h6>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="mr-3">
                                        <div class="icon-circle bg-primary">
                                            <i class="fas fa-file-alt text-white"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="small text-gray-500">December 12, 2019</div>
                                        <span class="font-weight-bold">A new monthly report is ready to download!</span>
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="mr-3">
                                        <div class="icon-circle bg-success">
                                            <i class="fas fa-donate text-white"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="small text-gray-500">December 7, 2019</div>
                                        $290.29 has been deposited into your account!
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="mr-3">
                                        <div class="icon-circle bg-warning">
                                            <i class="fas fa-exclamation-triangle text-white"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="small text-gray-500">December 2, 2019</div>
                                        Spending Alert: We've noticed unusually high spending for your account.
                                    </div>
                                </a>
                                <a class="dropdown-item text-center small text-gray-500" href="#">Show All Alerts</a>
                            </div>
                        </li>

                        <!-- Nav Item - Messages -->
                        <li class="nav-item dropdown no-arrow mx-1">
                            <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-envelope fa-fw"></i>
                                <!-- Counter - Messages -->
                                <span class="badge badge-danger badge-counter">7</span>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="messagesDropdown">
                                <h6 class="dropdown-header">
                                    Message Center
                                </h6>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="dropdown-list-image mr-3">
                                        <img class="rounded-circle" src="img/undraw_profile_1.svg" alt="...">
                                        <div class="status-indicator bg-success"></div>
                                    </div>
                                    <div class="font-weight-bold">
                                        <div class="text-truncate">Hi there! I am wondering if you can help me with a
                                            problem I've been having.</div>
                                        <div class="small text-gray-500">Emily Fowler · 58m</div>
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="dropdown-list-image mr-3">
                                        <img class="rounded-circle" src="img/undraw_profile_2.svg" alt="...">
                                        <div class="status-indicator"></div>
                                    </div>
                                    <div>
                                        <div class="text-truncate">I have the photos that you ordered last month, how
                                            would you like them sent to you?</div>
                                        <div class="small text-gray-500">Jae Chun · 1d</div>
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="dropdown-list-image mr-3">
                                        <img class="rounded-circle" src="img/undraw_profile_3.svg" alt="...">
                                        <div class="status-indicator bg-warning"></div>
                                    </div>
                                    <div>
                                        <div class="text-truncate">Last month's report looks great, I am very happy with
                                            the progress so far, keep up the good work!</div>
                                        <div class="small text-gray-500">Morgan Alvarez · 2d</div>
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="dropdown-list-image mr-3">
                                        <img class="rounded-circle" src="https://source.unsplash.com/Mv9hjnEUHR4/60x60" alt="...">
                                        <div class="status-indicator bg-success"></div>
                                    </div>
                                    <div>
                                        <div class="text-truncate">Am I a good boy? The reason I ask is because someone
                                            told me that people say this to all dogs, even if they aren't good...</div>
                                        <div class="small text-gray-500">Chicken the Dog · 2w</div>
                                    </div>
                                </a>
                                <a class="dropdown-item text-center small text-gray-500" href="#">Read More Messages</a>
                            </div>
                        </li>

                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?= isset($_SESSION['login']['tenND']) ? $_SESSION['login']['tenND'] : "" ?></span>
                                <!-- <img class="img-profile rounded-circle"
                                    src="img/undraw_profile.svg"> -->
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Hồ sơ
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Đăng xuất
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <?php
                            $mod = isset($_GET['mod']) ? $_GET['mod'] : "";
                            // lấy tên danh mục
                            require_once('./controller/danhMucController.php');
                            $dm_controller = new danhMucController();
                            $idDM = isset($_GET['idDM']) ? $_GET['idDM'] : "";
                            $tenDM = $dm_controller->getTenDM($idDM);
                            ?>
                            <h6 class="m-0 font-weight-bold text-primary">DataTables <?= $mod ?> <?= $tenDM ?></h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <?php
                                $act = isset($_GET['act']) ? $_GET['act'] : "";
                                switch ($mod) {
                                    case "taikhoan":
                                        require_once('./controller/taiKhoanController.php');
                                        $tk_controller = new taiKhoanController();
                                        switch ($act) {
                                            case "add":
                                                require_once('./views/taikhoan/taiKhoanAddView.php');
                                                break;
                                            case "addCSDL":
                                                $tk_controller->add();
                                                break;
                                            case "detail":
                                                require_once('./views/taikhoan/taiKhoanDetailView.php');
                                                break;
                                            case "edit":
                                                require_once('./views/taikhoan/taiKhoanEditView.php');
                                                break;
                                            case "editCSDL":
                                                $tk_controller->update();
                                                break;
                                            case "delete":
                                                $tk_controller->delete();
                                            case "isActive":
                                                $tk_controller->isActive();
                                                break;
                                            default:
                                                require_once('./views/taikhoan/taiKhoanView.php');
                                        }
                                        break;
                                    case "danhmuc":
                                        require_once('./controller/danhMucController.php');
                                        $dm_controller = new danhMucController();
                                        switch ($act) {
                                            case "add":
                                                require_once('./views/danhmuc/danhMucAddView.php');
                                                break;
                                            case "addCSDL":
                                                $dm_controller->add();
                                                break;
                                            case "delete":
                                                $dm_controller->delete();
                                                break;
                                            case "edit":
                                                require_once('./views/danhmuc/danhMucEditView.php');
                                                break;
                                            case "editCSDL":
                                                $dm_controller->update();
                                                break;
                                            default:
                                                require_once('./views/danhmuc/danhMucView.php');
                                        }
                                        break;
                                    case "loaisanpham":
                                        require_once('./controller/loaiSanPhamController.php');
                                        $lsp_controller = new loaiSanPhamController();
                                        switch ($act) {
                                            case "add":
                                                require_once('./views/loaisanpham/loaiSanPhamAddView.php');
                                                break;
                                            case "addCSDL":
                                                $lsp_controller->add();
                                                break;
                                            case "detail":
                                                require_once('./views/loaisanpham/loaiSanPhamDetailView.php');
                                                break;
                                            case "edit":
                                                require_once('./views/loaisanpham/loaiSanPhamEditView.php');
                                                break;
                                            case "editCSDL":
                                                $lsp_controller->update();
                                                break;
                                            case "delete":
                                                $lsp_controller->delete();
                                                break;
                                            default:
                                                require_once('./views/loaisanpham/loaiSanPhamView.php');
                                        }
                                        break;
                                    case "sanpham":
                                        require_once('./controller/sanPhamController.php');
                                        $sp_controller = new sanPhamController();
                                        switch ($act) {
                                            case "add":
                                                require_once('./views/sanpham/sanPhamAddView.php');
                                                break;
                                            case "addCSDL":
                                                $sp_controller->add();
                                                break;
                                            case "edit":
                                                require_once('./views/sanpham/sanPhamEditView.php');
                                                break;
                                            case "editCSDL":
                                                $sp_controller->update();
                                                break;
                                            case "delete":
                                                $sp_controller->delete();
                                                break;
                                            default:
                                                require_once('./views/sanpham/sanPhamView.php');
                                        }
                                        break;
                                    case "mau":
                                        require_once('./controller/mauController.php');
                                        $m_controller = new mauController();
                                        switch ($act) {
                                            case "addCSDL":
                                                $m_controller->add();
                                                break;
                                            default:
                                                require_once('./views/mau/mauView.php');
                                        }
                                        break;
                                    case "size":
                                        require_once('./controller/sizeController.php');
                                        $s_controller = new sizeController();
                                        switch ($act) {
                                            case "addCSDL":
                                                $s_controller->add();
                                                break;
                                            default:
                                                require_once('./views/size/sizeView.php');
                                        }
                                        break;
                                    case "donhang":
                                        require_once('./controller/donHangController.php');
                                        $dh_controller = new donHangController();
                                        switch ($act) {
                                            case "detail":
                                                require_once('./views/donhang/donHangDetailView.php');
                                                break;
                                            case "duyet":
                                                $dh_controller->duyetonHang();
                                                break;
                                            default:
                                                require_once('./views/donhang/donHangView.php');
                                        }
                                        break;
                                    default:
                                        require_once('./views/thongke.php');
                                }
                                ?>
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
                        <!-- <span>Copyright &copy; Your Website 2020</span> -->
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

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
                    <a class="btn btn-primary" href="">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="./assets/vendor/jquery/jquery.min.js"></script>
    <script src="./assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="./assets/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="./assets/js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="./assets/vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="./assets/vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="./assets/js/demo/datatables-demo.js"></script>

    <!-- Page level plugins -->
    <script src="./assets/vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="./assets/js/chart.js"></script>
    <script src="./assets/js/chartDoanhThu.js"></script>


</body>

</html>