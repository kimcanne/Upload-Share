<p align="center"><?php
include("install/includes/install_settings.php");
foreach ($files as $file) {
	if (!unlink($file)) {
		echo ("Error deleting $file<br>");
	}else{
		echo ("Deleted $file<br>");
	}
}
rrmdir("install");
?> </p> 
<p align="center">If you made it this far, everything SHOULD be good to go. If you see any errors above, you will want to navigate to the install folder, and delete it manually. Click the button below to make sure you have the latest updates to your database.</p> 
<h3 align="center"><a class="button" href="..index.php">Lets look at your website!</a></h3> 
<?php
function rrmdir($dir) {
  if (is_dir($dir)) {
    $objects = scandir($dir);
    foreach ($objects as $object) {
      if ($object != "." && $object != "..") {
        if (is_dir($dir."/".$object))
          rrmdir($dir."/".$object);
        else
          unlink($dir."/".$object);
      }
    }
    rmdir($dir);
  }
}
?>
