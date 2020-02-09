<?php
$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
if (file_exists($target_file)) {
    echo "El archivo ya existe";
    $uploadOk = 0;
}
if ($_FILES["fileToUpload"]["size"] > 500000) {
    echo "El archivo de patrones es demasiado grande";
    $uploadOk = 0;
}
if($imageFileType != "txt" && $imageFileType != "csv" ) {
    echo "solamente se pueden subir archivos de patrones en formato csv / txt";
    $uploadOk = 0;
}
if ($uploadOk == 0) {
    echo "Lo siento, el archivo de patrones no se pudo subir";
} else {
    
$target_file = "uploads/patrones.txt"; 

    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " fue subido correctamente.";
        header("https://mktx.azurewebsites.net/perceptron/index.html");
        die();
    }else {
        echo "Error al subir el archivo de patrones";
    }
}
?>