<?php

if(file_exists("install/index.php")){
	//perform redirect if installer files exist
	//this if{} block may be deleted once installed
	header("Location: install/index.php");
}

require_once 'users/init.php';



if(isset($user) && $user->isLoggedIn()){
}
?> 
<!DOCTYPE html> 
<html lang="en"> 
    <head> 
        <meta charset="utf-8"> 
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"> 
        <meta name="description" content=""> 
        <meta name="author" content=""> 
        <title>Business Frontpage - Start Bootstrap Template</title>         
        <!-- Bootstrap core CSS -->         
        <link href="users/upload/index_files/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link href="carousel.css" rel="stylesheet"> 
        <!-- Custom styles for this template -->                  
    </head>     
    <body> 
        <!-- Navigation -->         
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top"> 
            <div class="container"> 
                <a class="navbar-brand" href="users/upload/upload.php">
                    <img class="img-fluid" src="users/images/logo.png" >
                </a>                 
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"> 
                    <span class="navbar-toggler-icon"></span> 
                </button>                 
                <div class="collapse navbar-collapse" id="navbarResponsive"> 
                    <ul class="navbar-nav ml-auto"> 
                        <?php if($user->isLoggedIn()){$uid = $user->data()->id;?> 
                            <a class="btn alert-success" href="users/upload/upload.php" role="button">User Account &raquo;</a> 
                            <?php }else{?> 
                            <a class="btn btn-warning" href="users/login.php" role="button">Log In &raquo;</a> 
                            <a class="btn btn-info" href="users/join.php" role="button">Sign Up &raquo;</a> 
                        <?php } ?> 
                    </ul>                     
                </div>
            </div>             
        </nav>
        <div id="myCarousel" class="carousel slide" data-ride="carousel" data-html="false">
            <ol class="carousel-indicators">
                <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                <li data-target="#myCarousel" data-slide-to="1"></li>
                <li data-target="#myCarousel" data-slide-to="2"></li>
                <li data-target="#myCarousel" data-slide-to="3"></li>
            </ol>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="first-slide" alt="First slide" src="https://images.unsplash.com/photo-1498931299472-f7a63a5a1cfa?ixlib=rb-1.2.1&q=80&fm=jpg&crop=entropy&cs=tinysrgb&w=1080&fit=max&ixid=eyJhcHBfaWQiOjIwOTIyfQ">
                    <div class="container">
                        <div class="carousel-caption d-md-block text-left d-block">
                            <h1 class="media media-body">Open Source Solution for sharing files</h1>
                            <p>3 Simple Steps can get you started...</p>
                            <p><a class="btn btn-lg btn-primary" href="#" role="button">Sign up today</a></p>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <img class="second-slide text-white" alt="Second slide" src="https://images.unsplash.com/photo-1422036306541-00138cae4dbc?ixlib=rb-1.2.1&q=80&fm=jpg&crop=entropy&cs=tinysrgb&w=1080&fit=max&ixid=eyJhcHBfaWQiOjIwOTIyfQ">
                    <div class="container">
                        <div class="carousel-caption d-md-block d-block">
                            <h1 class="bg-info d-block float-none">Step 1</h1>
                            <p class="text-white">Create a folder</p>
                            <p><a class="btn btn-lg btn-primary" href="#" role="button">Learn more</a></p>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <img class="third-slide" alt="Third slide" src="https://images.unsplash.com/photo-1520588545521-c6c96637e4c0?ixlib=rb-1.2.1&amp;q=80&amp;fm=jpg&amp;crop=entropy&amp;cs=tinysrgb&amp;w=1080&amp;fit=max&amp;ixid=eyJhcHBfaWQiOjIwOTIyfQ">
                    <div class="container">
                        <div class="carousel-caption d-md-block text-center d-none">
                            <h1 class="text-center bg-info">Step 2</h1>
                            <p class="text-center">Upload your files</p>
                            <p><a class="btn btn-lg btn-primary" href="#" role="button">Sign up</a>iin</p>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <img class="third-slide" alt="Fourth slide" src="https://images.unsplash.com/photo-1522251670181-320150ad6dab?ixlib=rb-1.2.1&amp;q=80&amp;fm=jpg&amp;crop=entropy&amp;cs=tinysrgb&amp;w=1080&amp;fit=max&amp;ixid=eyJhcHBfaWQiOjIwOTIyfQ">
                    <div class="container">
                        <div class="carousel-caption d-md-block text-center d-none">
                            <h1 class="text-center bg-info">Step 3</h1>
                            <p class="text-center">Public or Private Access for your files</p>
                            <p><a class="btn btn-lg btn-primary" href="#" role="button">Sign up</a></p>
                        </div>
                    </div>
                </div>
            </div>
            <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev"> <span class="carousel-control-prev-icon" aria-hidden="true"></span> <span class="sr-only">Previous</span> </a>
            <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next"> <span class="carousel-control-next-icon" aria-hidden="true"></span> <span class="sr-only">Next</span> </a>
        </div>
        <div class="container marketing">
            <!-- Three columns of text below the carousel -->
            <div class="row">
                <div class="col-lg-4">
                    <img alt="Generic placeholder image" width="300" height="300" src="create.png" class="rounded-0">
                    <h2>Create</h2>
                    <p>Create a Folder</p>
                    <p><a class="btn btn-secondary" href="#" role="button">View details »</a></p>
                </div>
                <!-- /.col-lg-4 -->
                <div class="col-lg-4">
                    <img class="rounded-0" src="upload.png" alt="Generic placeholder image" width="300" height="300">
                    <h2>Upload</h2>
                    <p>Upload files to a folder</p>
                    <p><a class="btn btn-secondary" href="#" role="button">View details »</a><br></p>
                </div>
                <!-- /.col-lg-4 -->
                <div class="col-lg-4">
                    <img class="rounded-0" src="access.png" alt="Generic placeholder image" width="300" height="300">
                    <h2>Access</h2>
                    <p>Public or Private access</p>
                    <p><a class="btn btn-secondary" href="#" role="button">View details »</a></p>
                </div>
                <!-- /.col-lg-4 -->
            </div>
            <!-- /.row -->
            <!-- START THE FEATURETTES -->
            <!-- /END THE FEATURETTES -->
            <!-- FOOTER -->
        </div>
        <script src="users/upload/js/jquery.min.js"></script>
        <script src="users/upload/js/popper.js"></script>
        <script src="users/upload/js/bootstrap.min.js"></script>
        <script src="users/upload/js/holder.min.js"></script>         
        <!-- Header with Background Image -->                  
        <!-- Page Content -->                  
        <!-- /.container -->         
        <!-- Footer -->         
        <footer class="py-5 bg-dark"> 
            <div class="container">                  
                <footer>
                    <p class="float-right"><a href="#">Back to top</a></p>
                    <p class="text-white">© 2019 Upload Open Source Solution</p>
                </footer>                 
            </p>             
        </div>         
        <!-- /.container -->         
    </footer>     
    <!-- Bootstrap core JavaScript -->               
</body> 
