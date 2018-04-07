
function deleteFunction(filename,foldername,albumname) {


var txt;
var r = confirm("Delete file "+filename);


if (r == true) {
    

   window.location.replace("delete_file.php?albumname="+albumname+"&foldername="+foldername+"&filename="+filename);


} else {
   
    txt = "You pressed Cancel!";
}

}


function moveFunction(no,filename,foldername,albumname) {


var txt;
var r = confirm("Move file "+filename);


if (r == true) {
    

   window.location.replace("move_file.php?pic="+no+"&albumname="+albumname+"&foldername="+foldername+"&filename="+filename);


} else {
   
    txt = "You pressed Cancel!";
}

}
