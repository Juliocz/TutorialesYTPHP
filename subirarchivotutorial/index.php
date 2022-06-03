<?php

    if($_SERVER['REQUEST_METHOD']=='POST'){
       // var_dump($_FILES);
        $name=$_FILES['archivo']['name'];
        $name_temp=$_FILES['archivo']['tmp_name'];
        move_uploaded_file($name_temp,$name);
        echo "SUBIDO CORRECTAMENTE :".$name;
        echo "RUTa: ".$name_temp;
 }

    include_once 'vista.html';
?>