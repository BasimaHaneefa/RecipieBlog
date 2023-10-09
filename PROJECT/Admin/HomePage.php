<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>RecipieBlog Admin</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="../Assets/Template/Admin/vendors/feather/feather.css">
  <link rel="stylesheet" href="../Assets/Template/Admin/vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" href="../Assets/Template/Admin/vendors/css/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <link rel="stylesheet" href="../Assets/Template/Admin/vendors/datatables.net-bs4/dataTables.bootstrap4.css">
  <link rel="stylesheet" href="../Assets/Template/Admin/vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" type="text/css" href="../Assets/Template/Admin/js/select.dataTables.min.css">
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="../Assets/Template/Admin/css/vertical-layout-light/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="../Assets/Template/Admin/images/favicon.png" />

  <?php
  include("SessionValidator.php");
include("../Assets/Connection/Connection.php");
?>
</head>
<body>
  <div class="container-scroller">
    <!-- partial:partials/_navbar.html -->
    <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
      <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
        <a class="navbar-brand brand-logo mr-5" href="index.html"><img src="../Assets/Template/Admin/images/logo.svg" class="mr-2" alt="logo"/></a>
        <a class="navbar-brand brand-logo-mini" href="index.html"><img src="../Assets/Template/Admin/images/logo-mini.svg" alt="logo"/></a>
      </div>
      <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
        <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
          <span class="icon-menu"></span>
        </button>
       
        <ul class="navbar-nav navbar-nav-right">
         
          <li class="nav-item nav-profile dropdown">
            <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" id="profileDropdown">
              Admin
            </a>
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">
             
              <a class="dropdown-item" href="Logout.php">
                <i class="ti-power-off text-primary"></i>
                Logout
              </a>
            </div>
          </li>
         
        </ul>
       
      </div>
    </nav>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:partials/_settings-panel.html -->
      <div class="theme-setting-wrapper">
        <div id="settings-trigger"><i class="ti-settings"></i></div>
        <div id="theme-settings" class="settings-panel">
          <i class="settings-close ti-close"></i>
          <p class="settings-heading">SIDEBAR SKINS</p>
          <div class="sidebar-bg-options selected" id="sidebar-light-theme"><div class="img-ss rounded-circle bg-light border mr-3"></div>Light</div>
          <div class="sidebar-bg-options" id="sidebar-dark-theme"><div class="img-ss rounded-circle bg-dark border mr-3"></div>Dark</div>
          <p class="settings-heading mt-2">HEADER SKINS</p>
          <div class="color-tiles mx-0 px-4">
            <div class="tiles success"></div>
            <div class="tiles warning"></div>
            <div class="tiles danger"></div>
            <div class="tiles info"></div>
            <div class="tiles dark"></div>
            <div class="tiles default"></div>
          </div>
        </div>
      </div>
      
      <!-- partial -->
      <!-- partial:partials/_sidebar.html -->
      <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
          <li class="nav-item">
            <a class="nav-link" href="HomePage.php">
              <i class="icon-grid menu-icon"></i>
              <span class="menu-title">Dashboard</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
              <i class="icon-grid-2 menu-icon"></i>
              <span class="menu-title">Basic Data</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-basic">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="Category.php">Category</a></li>
                <li class="nav-item"> <a class="nav-link" href="Subcategory.php">Subcategory</a></li>
                  </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="ViewComplaint.php">
              <i class="icon-paper menu-icon"></i>
              <span class="menu-title">View Cmplaints</span>
            </a>
          </li>
          
        </ul>
      </nav>
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-md-12 grid-margin">
              <div class="row">
                <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                  <h3 class="font-weight-bold">Welcome Admin</h3>
                   </div>
                <div class="col-12 col-xl-4">
                 <div class="justify-content-end d-flex">
                  <div class="dropdown flex-md-grow-1 flex-xl-grow-0">
                   
                    
                  </div>
                 </div>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6 grid-margin stretch-card">
              <div class="card tale-bg">
                <div class="card-people mt-auto">
                  <img src="../Assets/Template/Admin/images/dashboard/people.svg" alt="people">
                  <div class="weather-info">
                    <div class="d-flex">
                      <div>
                        <h2 class="mb-0 font-weight-normal"><i class="icon-sun mr-2"></i>31<sup>C</sup></h2>
                      </div>
                      <div class="ml-2">
                         <h6 class="font-weight-normal">India</h6>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-6 grid-margin transparent">
              <div class="row">
                <div class="col-md-6 mb-4 stretch-card transparent">
                  <div class="card card-tale">
                    <div class="card-body">
                      <p class="mb-4">Total Blog</p>
                      <?php
                      $selQry="select COALESCE(COUNT(*),0) as bnum from tbl_blog";
                      $row=$Conn->query($selQry);
                      $data=$row->fetch_assoc();
?>
                      <p class="fs-30 mb-2"><?php echo $data["bnum"]  ?></p>
                     
                    </div>
                  </div>
                </div>
                <div class="col-md-6 mb-4 stretch-card transparent">
                  <div class="card card-dark-blue">
                    <div class="card-body">
                      <p class="mb-4">Total User</p>
                      <?php
                      $selQr="select COALESCE(COUNT(*),0) as unum from tbl_user";
                      $row1=$Conn->query($selQr);
                      $data1=$row1->fetch_assoc();
?>
                      <p class="fs-30 mb-2"><?php echo $data1["unum"]  ?></p>
                      
                    </div>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6 mb-4 mb-lg-0 stretch-card transparent">
                  <div class="card card-light-blue">
                    <div class="card-body">
                      <p class="mb-4">Number of Orders</p>
                      <?php
                      $selQ="select COALESCE(COUNT(*),0) as onum from tbl_order";
                      $row2=$Conn->query($selQ);
                      $data2=$row2->fetch_assoc();
?>
                      <p class="fs-30 mb-2"><?php echo $data2["onum"]  ?></p>
                   
                    </div>
                  </div>
                </div>
                <div class="col-md-6 stretch-card transparent">
                  <div class="card card-light-danger">
                    <div class="card-body">
                      <p class="mb-4">Happy Clients</p>
                      <?php

                      $sel="select COALESCE(COUNT(*),0) as num from tbl_user ";
                      $row3=$Conn->query($sel);
                      $data3=$row3->fetch_assoc();
?>
                      <p class="fs-30 mb-2"><?php echo $data3["num"]  ?></p>
                     
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          
          
          
            
          
          <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <p class="card-title">User List</p>
                  <div class="row">
                    <div class="col-12">
                      <div class="table-responsive">
                        <table id="example" class="display expandable-table" style="width:100%">
                          <thead>
                            <tr>
                              <th>#Sl.no</th>
                              <th>Name</th>
                              <th>Contact</th>
                              <th>Description</th>
                              <th>Email</th>
                              
                            </tr>
                          </thead>
                          <tbody>
<?php
$i=0;
$selU="select * from tbl_user";
$rowU=$Conn->query($selU);
while($dataU=$rowU->fetch_assoc())
{
  $i++;
?>
                          <tr>
                            <td><?php echo $i; ?></td>
                            <td><?php echo $dataU["user_name"] ?></td>  
                            <td><?php echo $dataU["user_contact"] ?></td>  
                            <td><?php echo $dataU["user_description"] ?></td>  
                            <td><?php echo $dataU["user_email"] ?></td>  
</tr>
<?php
}
?>
</tbody>
                      </table>
                      </div>
                    </div>
                  </div>
                  </div>
                </div>

                
              </div>
            </div>
        </div>
        <!-- content-wrapper ends -->
        <!-- partial:partials/_footer.html -->
        <footer class="footer">
          <div class="d-sm-flex justify-content-center justify-content-sm-between">
            <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © 2021.  Premium <a href="https://www.bootstrapdash.com/" target="_blank">Bootstrap admin template</a> from BootstrapDash. All rights reserved.</span>
            <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Hand-crafted & made with <i class="ti-heart text-danger ml-1"></i></span>
          </div>
          <div class="d-sm-flex justify-content-center justify-content-sm-between">
            <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Distributed by <a href="https://www.themewagon.com/" target="_blank">Themewagon</a></span> 
          </div>
        </footer> 
        <!-- partial -->
      </div>
      <!-- main-panel ends -->
    </div>   
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->

  <!-- plugins:js -->
  <script src="../Assets/Template/Admin/vendors/js/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page -->
  <script src="../Assets/Template/Admin/vendors/chart.js/Chart.min.js"></script>
  <script src="../Assets/Template/Admin/vendors/datatables.net/jquery.dataTables.js"></script>
  <script src="../Assets/Template/Admin/vendors/datatables.net-bs4/dataTables.bootstrap4.js"></script>
  <script src="../Assets/Template/Admin/js/dataTables.select.min.js"></script>

  <!-- End plugin js for this page -->
  <!-- inject:js -->
  <script src="../Assets/Template/Admin/js/off-canvas.js"></script>
  <script src="../Assets/Template/Admin/js/hoverable-collapse.js"></script>
  <script src="../Assets/Template/Admin/js/template.js"></script>
  <script src="../Assets/Template/Admin/js/settings.js"></script>
  <script src="../Assets/Template/Admin/js/todolist.js"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="../Assets/Template/Admin/js/dashboard.js"></script>
  <script src="../Assets/Template/Admin/js/Chart.roundedBarCharts.js"></script>
  <!-- End custom js for this page-->
</body>

</html>

