<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <title>CaterServ - Catering Services Website Template</title>
        <meta content="width=device-width, initial-scale=1.0" name="viewport">
        <meta content="" name="keywords">
        <meta content="" name="description">

        <!-- Google Web Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&family=Playball&display=swap" rel="stylesheet">

        <!-- Icon Font Stylesheet -->
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css"/>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

        <!-- Libraries Stylesheet -->
        <link href="../Assets/Template/Main/lib/animate/animate.min.css" rel="stylesheet">
        <link href="../Assets/Template/Main/lib/lightbox/css/lightbox.min.css" rel="stylesheet">
        <link href="../Assets/Template/Main/lib/owlcarousel/owl.carousel.min.css" rel="stylesheet">

        <!-- Customized Bootstrap Stylesheet -->
        <link href="../Assets/Template/Main/css/bootstrap.min.css" rel="stylesheet">

        <!-- Template Stylesheet -->
        <link href="../Assets/Template/Main/css/style.css" rel="stylesheet">
        <style>
    .fixed-image {
        width: 300px; /* Set your desired width */
        height: 200px; /* Set your desired height */
    }
</style>
        <?php
include("SessionValidator.php");
include("../Assets/Connection/Connection.php");
?>
    </head>

    <body>

        <!-- Spinner Start -->
        <div id="spinner" class="show w-100 vh-100 bg-white position-fixed translate-middle top-50 start-50  d-flex align-items-center justify-content-center">
            <div class="spinner-grow text-primary" role="status"></div>
        </div>
        <!-- Spinner End -->


        <!-- Navbar start -->
        <div class="container-fluid nav-bar">
            <div class="container">
                <nav class="navbar navbar-light navbar-expand-lg py-4">
                    <a href="index.html" class="navbar-brand">
                        <h1 class="text-primary fw-bold mb-0">Cater<span class="text-dark">Serv</span> </h1>
                    </a>
                   
                    <div class="collapse navbar-collapse" id="navbarCollapse">
                        <div class="navbar-nav mx-auto">
                            <a href="HomePage.php" class="nav-item nav-link active">Home</a>
                            <a href="Viewblog.php" class="nav-item nav-link ">Blogs</a>
                            <div class="nav-item dropdown">
                                <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Profile</a>
                                <div class="dropdown-menu bg-light">
                                    <a href="Myprofile.php" class="dropdown-item">My profile</a>
                                    <a href="Editprofile.php" class="dropdown-item">Edit profile</a>
                                    <a href="Changepassword.php" class="dropdown-item">Change password</a>
                                    
                                </div>
                            </div>
                            <div class="nav-item dropdown">
                                <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Blog & Order</a>
                                <div class="dropdown-menu bg-light">
                                    <a href="Addblog.php" class="dropdown-item">Post New blog</a>
                                    <a href="ViewUserOrder.php" class="dropdown-item">View User Order</a>
                                   
                                </div>
                            </div>
                            <a href="ViewMyOrder.php" class="nav-item nav-link ">My Order</a>
                            <a href="Complaint.php" class="nav-item nav-link ">Complaint</a>
                        </div>
                        <a href="Logout.php" class="btn btn-primary py-2 px-4 d-none d-xl-inline-block rounded-pill">Logout</a>
                    </div>
                </nav>
            </div>
        </div>
        <!-- Navbar End -->


        
        <!-- Modal Search End -->
        <div class="container-fluid bg-light py-4 my-6 mt-0">
          