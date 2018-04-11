
function deleteFunction(filename,foldername,file) {


var txt;
var r = confirm("Delete file "+filename);


if (r == true) {
    

   window.location.replace("delete_file.php?file="+file+"&foldername="+foldername+"&filename="+filename);


} else {
   
    txt = "You pressed Cancel!";
}

}


function moveFunction(no,filename,foldername,file) {


var txt;
var r = confirm("Move file "+filename);


if (r == true) {
    

   window.location.replace("move_file.php?fileno="+no+"&file="+file+"&foldername="+foldername+"&filename="+filename);


} else {
   
    txt = "You pressed Cancel!";
}

}
