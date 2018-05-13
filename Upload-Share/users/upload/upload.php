<?php 
  
  


$abs_us_root=$_SERVER['DOCUMENT_ROOT'];

$self_path=explode("/", $_SERVER['PHP_SELF']);
$self_path_length=count($self_path);
$file_found=FALSE;

for($i = 1; $i < $self_path_length; $i++){
	array_splice($self_path, $self_path_length-$i, $i);
	$us_url_root=implode("/",$self_path)."/";
	
	if (file_exists($abs_us_root.$us_url_root.'z_us_root.php')){
		$file_found=TRUE;
		break;
	}else{
		$file_found=FALSE;
	}
}

require_once $abs_us_root.$us_url_root.'users/init.php';
 
$path_for = $us_url_root;
 
  
  ?>

<?php

 if (isset($_GET['upload']))

   {
   
   $_SESSION['getUploadName'] = $_GET['upload'];

   }

?>


<?php require_once $abs_us_root.$us_url_root.'users/includes/custom_header.php'; ?>
<?php require_once $abs_us_root.$us_url_root.'users/includes/custom_navigation.php'; ?>
<?php if (!securePage($_SERVER['PHP_SELF'])){die();} ?>
<?php
//dealing with if the user is logged in
if($user->isLoggedIn() || !$user->isLoggedIn() && !checkMenu(2,$user->data()->id)){
	if (($settings->site_offline==1) && (!in_array($user->data()->id, $master_account)) && ($currentPage != 'login.php') && ($currentPage != 'maintenance.php')){
		$user->logout();
		Redirect::to($us_url_root.'users/maintenance.php');
	}
}

$grav = get_gravatar(strtolower(trim($user->data()->email)));
$get_info_id = $user->data()->id;
// $groupname = ucfirst($loggedInUser->title);
$raw = date_parse($user->data()->join_date);
$signupdate = $raw['month']."/".$raw['day']."/".$raw['year'];
$userdetails = fetchUserDetails(NULL, NULL, $get_info_id); //Fetch user details

?>



<!DOCTYPE html>

<html lang="en">
    <head>
        <meta charset="utf-8" />

        <title>Folders</title>





<!-- Scripts --> 

        <!-- Move & Delete Functions Javascript Script -->

 <script type="text/javascript" language="javascript" src="js/galleryfunctions1.js"></script>

      

    </head>
    <body>

        
<div id="page-wrapper">

<div class="container">

    <h3><?php  
  
  if (isset($_GET['upload']))

   {

       $db2 = DB::getInstance();

       //File no

        $query0 = $db2->query("SELECT no,publicORprivate FROM file WHERE file_name='".$_GET['upload']."'AND user_no='".$user_no_info."'"); 

    $x0 = $query0->results(true);

     $fileNo = NULL;

    foreach ($x0 as $value0)

                {


                   $fileNo = $value0['no'];
                   $PorP = $value0['publicORprivate'];
                }
                
                
                if(!isset($fileNo))  {
                    
                    header("Location: upload.php");
                }



    //Showing Folder name & File no

    $url = "update_folder.php?upload=$fileNo";
  
  echo $_GET['upload'];

  echo "  ("."<a href=$url>$PorP</a>".")";
    
    }

    ?>
    
    </h3>

<div class="well">
<div class="row">
   
    

    

       <?php
           
   
           
   //getting upload name

   if (isset($_GET['upload']))

   {
        
    $name2 = $_GET['upload']; 

   

    //getting upload no

    $user_no_info = $user->data()->id; 

    $query1 = $db2->query("SELECT * FROM file WHERE file_name='".$name2."'AND user_no='".$user_no_info."'"); 

    $x1 = $query1->results(true);

   $catNo = NULL;

    foreach ($x1 as $value1)

                {
                   $catNo = $value1['no'];
                   break;
                }

               

    //getting user name
    
   $user_no_info = $user->data()->id;       

//getting pictures info for a user

$query2 = $db2->query("SELECT * FROM category WHERE category='".$catNo."' AND user_no='".$user_no_info."'");

$x2 = $query2->results(true);

 $count1=1;

 echo("<div class='table-responsive'>");
   echo("<table class='table'>");
                               
               foreach ($x2 as $value2)

                {

                        $catNo = $value2['no'];
          $fileValue = $value2['file'];
           $folderValue =  $value2['folder'];
           $fileName = $value2['category'];    

           $pathforimage = $path_for.'users/upload/images/delete.png';

            $pathforimage2 = $path_for.'users/upload/images/move.png';

             

            if ($count1 == 1)

            {

   
 echo("<thead>");
 echo("<tr>");
 echo("<th>File</th>");
  echo("<th>Download</th>");
  echo("<th>Move?</th>");
  echo("<th>Delete?</th>");
 echo("</tr>");
 echo("</thead>");
 

   $count1 +=1;

            }


echo("<tbody>");
 echo("<tr class='success'>");
 echo("<td>Default</td>");
  echo("<td> <a href='upload/data/".$value2['folder']."/".$value2['file']."' download>".$value2['file']."</a> </td>");
  echo("<td><button id='close-image' class='btn btn-link' onclick='moveFunction(\"$catNo\",\"$fileValue\",\"$folderValue\",\"$fileName\")'><img src='$pathforimage2'></button></td>");
   echo("<td><button id='close-image' class='btn btn-link' onclick='deleteFunction(\"$fileValue\",\"$folderValue\",\"$fileName\")'><img src= '$pathforimage'></button></td>");


 
  echo("</tbody>");

            
                                           
                }

                 echo("</table>");

 echo("</div>");
          
   }

            ?>





    <!-- If upload name not set -->

    <?php  
  
  if (!isset($_GET['upload']))

   {
       ?>

     <div class="row">

 <div class="col-sm-6 col-md-4">

    <div class="thumbnail">
       

     <?php 


 
 $pathforimage3 = $path_for.'users/upload/images/albums.png';

  $path_create_upload = $path_for.'users/upload/create_folder.php';
 
 echo("<img src='$pathforimage3'>");  ?>

      <div class="caption">
        <h3 style="text-align: center;">Create a Folder</h3>
        
        <p style="text-align: center;"><a href="<?php  echo ("$path_create_upload"); ?>" class="btn btn-primary" role="button">Create</a></p>
      </div>
   
           </div>



  </div>     
  

  <div class="col-sm-6 col-md-4">

    <div class="thumbnail">




     <?php 
 
 $pathforimage3 = $path_for.'users/upload/images/upload.png';

  $path_create_upload = $path_for.'users/upload/upload_file.php';
 
 echo("<img src='$pathforimage3'>");  ?>

      <div class="caption">
        <h3 style="text-align: center;">Upload Files</h3>
        
        <p style="text-align: center;"><a href="<?php  echo ("$path_create_upload"); ?>" class="btn btn-primary" role="button">Upload</a></p>
      </div>
   
        
        </div>



  </div>


 <div class="col-sm-6 col-md-4">

    <div class="thumbnail">



       

     <?php 
 
 $pathforimage3 = $path_for.'users/upload/images/pic_folder.png';

  $path_create_upload = $path_for.'users/upload/list_uploads.php';
 
 echo("<img src='$pathforimage3'>");  ?>

      <div class="caption">
        <h3 style="text-align: center;">Upload Folders</h3>
        
        <p style="text-align: center;"><a href="<?php  echo ("$path_create_upload"); ?>" class="btn btn-primary" role="button">Folders</a></p>
      </div>
   
     </div>



  </div>



</div>    
        


       <?php  
  
   }
       ?>


 <!-- ------------------- -->


    
       </div> <!-- /.col -->
		</div> <!-- /.row -->
	</div> <!-- /.container -->
    </div> <!-- /.wrapper -->



        <!-- footers -->
<?php require_once $abs_us_root.$us_url_root.'users/includes/page_footer.php'; // the final html footer copyright row + the external js calls ?>

<!-- Place any per-page javascript here -->

<?php require_once $abs_us_root.$us_url_root.'users/includes/html_footer.php'; // currently just the closing /body and /html ?>


   

        

 </body>    

</html>
