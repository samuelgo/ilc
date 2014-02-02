<?php 

//connect to database  
mysql_connect('localhost', 'root', '1EXbejCy7FjzSYss0pYnMC4Xb');  
mysql_select_db('certificados');  
  
//get the username  
$certificado = mysql_real_escape_string($_POST['certificado']); 

  
//mysql query to select field username if it's equal to the username that we check '  
$result = mysql_query('select certificado from certificadosprincial where certificado = "'. $certificado .'"');  
$row = mysql_fetch_row($result);
$check = $row[0];

  
//if number of rows fields is bigger them 0 that means it's NOT available '  
if($check == 555){  
    //and we send 0 to the ajax request  
    // echo 1;
    echo "El certificado ".$check." ya está registrado por otro usuario en la base de datos";  
}else{
    //else if it's not bigger then 0, then it's available '  
    //and we send 1 to the ajax request  
    echo "El certificado ".$certificado." no se encuentra en la base de datos.";  
    // echo 0;  
}  

?>