
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

<?php
    
   if (isset($_POST['formSubmit']))

   {

	if($_POST['formSubmit'] == "Submit") 
    {

		$errorMessage = "";
        $upload = $_POST ['upload'];
        $varNo =$_POST ['no'];
        $varName = $_POST['name'];
        $varDes = $_POST['description'];
        $varAccess = $_POST['access'];

		
         {

           $db = DB::getInstance();

    //getting upload no

    $user_no_info = $user->data()->id; 

    $query1 = $db->query("SELECT * FROM file WHERE file_name='".$varName."'AND user_no='".$user_no_info."'"); 

    $x1 = $query1->results(true);

   

    foreach ($x1 as $value1)

                {
                    if ($value1['no']!=$varNo)

                    {
                    
                   $errorMessage .= "<li>This upload folder already exists!</li>";

                    }

                   break;
                }

          }


		if(empty($errorMessage)) 

        {
      
            //getting user name
    
            $user_no_info = $user->data()->id; 

            //posting to database

         //   $db = DB::getInstance();

          //  $fields=array('file_name'=>$varName, 'description'=>$varDes, 'publicORprivate'=>$varAccess);

         //   $query = $db->update('file',$varNo,$fields);

        //     $query = $db->query("UPDATE category SET file_name=? WHERE no=?",array($varName,$varNo)); 

             $query = $db->query("UPDATE file SET file_name=?, description=?, publicORprivate=? WHERE no=?",array($varName,$varDes,$varAccess,$varNo)); 

             $query->results();


			header("Location: upload.php?upload=".$varName."");

			exit();

        }
		
	}
            
   }
    
?>




    <div id="page-wrapper">
<div class="container">
<div class="well">
<div class="row">

    <?php
    	    if(!empty($errorMessage)) 
		    {
			    echo("<p>There was an error with your form:</p>\n");
			    echo("<ul>" . $errorMessage .$upload. "</ul>\n");
               $_GET['upload'] = $upload;
         
            }
   ?>

    <?php 
     if (isset($_GET['upload']))

   {
       $db2 = DB::getInstance();

    //   if(isset($upload))
       {
           
     //    $query0 = $db2->query("SELECT * FROM file WHERE no='".$upload."'AND user_no='".$user_no_info."'");
       }

    //   else

       {

       //File no

        $query0 = $db2->query("SELECT * FROM file WHERE no='".$_GET['upload']."'AND user_no='".$user_no_info."'"); 

       }

    $x0 = $query0->results(true);

     $fileNo = NULL;

    foreach ($x0 as $value0)

                {


                   $fileNo = $value0['no'];
                   $file_name = $value0['file_name'];
                   $file_description = $value0['description'];
                   $PorP = $value0['publicORprivate'];
                }

   }

                ?>

  <h2>Update Folder</h2>
  <form class="form-horizontal" action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="post">

      

       <input type="hidden" id="no" name ="no" type="text" value="<?php echo $fileNo;?>">

      <input type="hidden" id="upload" name ="upload" type="text" value="<?php echo $_GET['upload'];?>">
      
    <div class="form-group">
      <label class="col-sm-2 control-label">Upload Folder</label>
       
      <div class="col-sm-10">
        <input class="form-control" id="name" name ="name" type="text" value="<?php echo $file_name;?>">
      </div>
    </div>

   <div class="form-group">
      <label class="col-sm-2 control-label">Description</label>
      <div class="col-sm-10">
        <input class="form-control" id="description"  name ="description" type="text" value="<?php echo $file_description;?>">
      </div>
    </div>

      <div class="form-group">
  <label class="col-sm-2 control-label">Access</label>
 <div class="col-sm-10">
    <select class="form-control" id="access"  name ="access" >

       <?php 

   if ($PorP == 'Private'){
 
?>

    <option selected>Private</option>
    
   <option>Public</option>

            <?php 

   }
   else 
   {
 
?>

            <option>Private</option>
    
   <option selected>Public</option>

                 <?php 

   }

 
?>
   
  </select>

</div>
</div>
<div class="form-group"> 
    <div class="col-sm-10">

        <button type="submit" name="formSubmit" value="Submit" class="btn btn-primary">Update</button>


        
  </div>
   </div> 
              
  </form>



        </div> <!-- /.col -->
		</div> <!-- /.row -->
	</div> <!-- /.container -->
</div> <!-- /.wrapper -->

     <!-- footers -->
<?php require_once $abs_us_root.$us_url_root.'users/includes/page_footer.php'; // the final html footer copyright row + the external js calls ?>

<!-- Place any per-page javascript here -->

<?php require_once $abs_us_root.$us_url_root.'users/includes/html_footer.php'; // currently just the closing /body and /html ?>