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

    <!-- Custom styles for this template -->
    <link href="users/upload/index_files/css/business-frontpage.css" rel="stylesheet">

  </head>

  <body>

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
      <div class="container">
        <a class="navbar-brand" href="#">Upload & Share</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">

              	<?php if($user->isLoggedIn()){$uid = $user->data()->id;?>
				<a class="btn btn-default" href="users/account.php" role="button">User Account &raquo;</a>
			<?php }else{?>
				<a class="btn btn-warning" href="users/login.php" role="button">Log In &raquo;</a>
				<a class="btn btn-info" href="users/join.php" role="button">Sign Up &raquo;</a>
			<?php } ?>
            

          </ul>
        </div>
      </div>
    </nav>

    <!-- Header with Background Image -->
    <header class="business-header">
      <div class="container">
        <div class="row">
          <div class="col-lg-12">

            
             
            <h1 class="display-3 text-center text-white mt-4">Upload & Share</h1>

            
              
          </div>
        </div>
      </div>
    </header>

    <!-- Page Content -->
    <div class="container">

      <!-- /.row -->

      <div class="row">
        <div class="col-sm-4 my-4">
          <div class="card">
            <img class="card-img-top" src="users/upload/index_files/css/7.jpg" alt="">
            <div class="card-body">
              <h4 class="card-title text-center">Create</h4>
              <p class="card-text text-center">Create your online folders for files.</p>
            </div>
            <div class="card-footer text-center">
              <a href="users/join.php" class="btn btn-primary">Find Out More!</a>
            </div>
          </div>
        </div>
        <div class="col-sm-4 my-4">
          <div class="card">
            <img class="card-img-top" src="users/upload/index_files/css/OLAZ660.jpg" alt="">
            <div class="card-body">
              <h4 class="card-title text-center">Upload</h4>
              <p class="card-text text-center">Upload your files to your own private or public folders online.</p>
            </div>
            <div class="card-footer text-center">
              <a href="users/join.php" class="btn btn-primary">Find Out More!</a>
            </div>
          </div>
        </div>
        <div class="col-sm-4 my-4">
          <div class="card">
            <img class="card-img-top" src="users/upload/index_files/css/119473-OPL22L-840-min.jpg" alt="">
            <div class="card-body">
              <h4 class="card-title text-center">Access</h4>
              <p class="card-text text-center">Limit folder access to private or public</p>
            </div>
            <div class="card-footer text-center">
              <a href="users/join.php" class="btn btn-primary">Find Out More!</a>
            </div>
          </div>
        </div>

      </div>
      <!-- /.row -->

    </div>
    <!-- /.container -->

    <!-- Footer -->
    <footer class="py-5 bg-dark">
      <div class="container">

          

        <div class="row">
                <div class="col-sm-12 text-center">
                        <footer><font color='white'><br>&copy;
                          <?php echo date("Y"); ?>
                           <?=$settings->copyright; ?></font></footer>
                        <br>
                </div>
        </div>


       <p   <a class="m-0 text-center text-white" href="https://www.freepik.com/free-vector/uploading-background-design_1050692.htm">Graphics by Freepik</a> </p>
            
      </div>
      <!-- /.container -->
    </footer>

    <!-- Bootstrap core JavaScript -->
    <script src="users/upload/index_files/vendor/jquery/jquery.min.js"></script>
    <script src="users/upload/index_files/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  </body>

</html>
