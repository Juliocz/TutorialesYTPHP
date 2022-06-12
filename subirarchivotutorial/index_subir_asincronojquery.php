<?php
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    var_dump($_FILES);
    $name=$_FILES['archivo']['name'];
    $nombre_temp_file=$_FILES['archivo']['tmp_name'];
    move_uploaded_file($nombre_temp_file,$name);
    echo "Subido con exito: ".$name;
    
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <title>Document</title>
</head>
<body>
    <form action="" method='post' enctype="multipart/form-data">
        <input type="file" name="archivo" id="archivo">
        <br>
        <input type="submit" value="Subir archivo">
        
    </form>
    <button onclick="uploadFilePost()">Subir post</button>

    <script>
        function uploadFilePost(input_file){
            var formData = new FormData();
            formData.append('section', 'general');
            formData.append('action', 'previewImg');

            //archivo nombre del archivo, el otro es el id del input, nombre archivo original y tipo lo da el input
            formData.append('archivo', $('#archivo')[0].files[0]); 

            var request =$.ajax({
            url: window.location.href,
            xhrFields: {//para enviar credenciales coockies
            withCredentials: true
            },
            data: formData,
            type: 'POST',
            contentType: false, // NEEDED, DON'T OMIT THIS (requires jQuery 1.6+)
            processData: false, // NEEDED, DON'T OMIT THIS
            success: function(data){
            console.log(data);
            },
            error: function(XMLHttpRequest, textStatus, errorThrown) { 
            alert("Status: " + textStatus); alert("Error: " + errorThrown); 
            }    
            });
        }
    </script>
</body>
</html>