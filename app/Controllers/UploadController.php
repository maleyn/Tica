<?php 

namespace Projet\Controllers;

class UploadController
{

  public function uploadimg($img) {
    echo "<div class='mt-5'></div>";
    $target_dir = "app/Public/Front/img/";
    $target_file = $target_dir . basename($_FILES["$img"]["name"]);
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

// Check if image file is a actual image or fake image
    if(isset($_POST["submit"])) {
      $check = getimagesize($_FILES["$img"]["tmp_name"]);
      if($check !== false) {
        echo "le fichier est une image - " . $check["mime"] . ".";
      } else {
        echo "Le fichier n'est pas une image.";
      
      }
    }

// Check if file already exists
    if (file_exists($target_file)) {
      
      return $target_file;
    }

// Check file size
    if ($_FILES["$img"]["size"] > 2500000) {
      
      return $error = "<span class='text-danger'>Désolé l'image est trop volumineuse (elle doit être inférieur à 2.5Mo)</span>";
    }

// Allow certain file formats
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") {
      
      return $error = "<span class='text-danger'>Désolé, sont autorisés seulement les fichiers JPG, JPEG & PNG</span>";
      
    }

    return $target_file;
  }
  
}
