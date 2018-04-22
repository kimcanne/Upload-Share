<?php
/*
UserSpice 4
An Open Source PHP User Management System
by the UserSpice Team at http://UserSpice.com

This program is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 3 of the License, or
(at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program.  If not, see <http://www.gnu.org/licenses/>.
*/
?>
<?php require_once 'init.php'; ?>
<?php require_once $abs_us_root.$us_url_root.'users/includes/header.php'; ?>
<?php require_once $abs_us_root.$us_url_root.'users/includes/navigation.php'; ?>
<?php if (!securePage($_SERVER['PHP_SELF'])){die();} ?>
<?php
//PHP Goes Here!

if(isset($_GET['id'])) $userID = Input::get('id');

else

{ 

if(!isset($user->data()->id)){

    exit();
}

$userID = $user->data()->id;

}

$userQ = $db->query("SELECT * FROM profiles LEFT JOIN users ON user_id = users.id WHERE user_id = ?",array($userID));


if ($userQ->count() > 0) {
	$thatUser = $userQ->first();

	if($user->isLoggedIn() && $user->data()->id == $userID)
		{
		$editbio = ' <small><a href="edit_profile.php">Edit Bio</a></small>';
		}
	else
		{
		$editbio = '';
		}

	$ususername = ucfirst($thatUser->username)."'s Profile";
	$grav = get_gravatar(strtolower(trim($thatUser->email)));
	$useravatar = '<img src="'.$grav.'" class="img-thumbnail" alt="'.$ususername.'">';
	$usbio = html_entity_decode($thatUser->bio);
	//Uncomment out the line below to see what's available to you.
	//dump($thisUser);
	}
else
	{
	$ususername = '404';
	$usbio = 'User not found';
	$useravatar = '';
	$editbio = ' <small><a href="/">Go to the homepage</a></small>';
	}



?>
   <div id="page-wrapper">

		 <div class="container">
				<!-- Main jumbotron for a primary marketing message or call to action -->
				<div class="well">
					<div class="row">
						<div class="col-xs-12 col-md-2">
							<p><?php echo $useravatar;?></p>
						</div>
						<div class="col-xs-12 col-md-10">
						<h1><?php echouser($userID);?>'s Profile</h1>
							<?php echo $usbio.$editbio;?>

					</div>
					</div>
				</div>


             <!--------List File Folders------->
<?php
             $usersAlbumsQ = $db->query("SELECT file_name FROM file WHERE user_no='".$userID."' AND publicORprivate = 'Public' ORDER BY user_no ASC");

$file_info = $usersAlbumsQ->results(true);

?>

              <div class="btn-group">
    <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
    Public File Folders <span class="caret"></span></button>
    <ul class="dropdown-menu" role="menu">

        <?php


                  
				
				foreach ($file_info as $Data) {
				 
                  ?>

      <li><a href="profile.php?id=<?= $userID; ?>&upload=<?= $Data["file_name"]; ?>"><?= $Data["file_name"]; ?></a></li>
      
         <?php

				}

				?>

    </ul>
  </div>

			
             <!-----Files Folder Start------->

                 <h3><?php  
  
  if (isset($_GET['upload']))

   {
  
  echo $_GET['upload']; 
    
    }

    ?>
    
    </h3>

<div class="well">
<div class="row">
   
    

    

       <?php
           
   $db2 = DB::getInstance();
           
   //getting upload name

   if (isset($_GET['upload']))

   {
        
    $name2 = $_GET['upload']; 

   

    //getting upload no

   // $user_no_info = $user->data()->id; 

    $query1 = $db2->query("SELECT * FROM file WHERE file_name='".$name2."'AND user_no='".$userID."'"); 

    $x1 = $query1->results(true);

   $catNo = NULL;

    foreach ($x1 as $value1)

                {
                   $catNo = $value1['no'];
                   break;
                }

               

    //getting user name
    
 //  $user_no_info = $user->data()->id;       

//getting pictures info for a user

$query2 = $db2->query("SELECT * FROM category WHERE category='".$catNo."' AND user_no='".$userID."'");

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


             

            if ($count1 == 1)

            {

   
 echo("<thead>");
 echo("<tr>");

 echo("<th>File</th>");
  echo("<th>Download</th>");

 echo("</tr>");
 echo("</thead>");
 

   $count1 +=1;

            }


echo("<tbody>");
 echo("<tr class='success'>");
 echo("<td>Default</td>");
  echo("<td> <a href='upload/upload/data/".$value2['folder']."/".$value2['file']."' download>".$value2['file']."</a> </td>");


 
  echo("</tbody>");

            
                                           
                }

                 echo("</table>");

 echo("</div>");
          
   }

            ?>






 <!-----Files Folder
     End------->


    
       </div> <!-- /.col -->
		</div> <!-- /.row -->



    </div> <!-- /container --><br />

</div> <!-- /#page-wrapper -->

<!-- footers -->
<?php require_once $abs_us_root.$us_url_root.'users/includes/page_footer.php'; // the final html footer copyright row + the external js calls ?>
<!-- Place any per-page javascript here -->
<?php require_once $abs_us_root.$us_url_root.'users/includes/html_footer.php'; // currently just the closing /body and /html ?>
