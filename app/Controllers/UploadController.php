<?php 

namespace Projet\Controllers;

class UploadController
{

  public function uploadimg($img) {

    $targetDir = "app/Public/Front/img/";
    $targetFile = $targetDir . basename($_FILES["$img"]["name"]);
    $imageFileType = strtolower(pathinfo($targetFile,PATHINFO_EXTENSION));

// Vérifie si l'image n'est pas fausse 
    if(isset($_POST["submit"])) {
      $check = getimagesize($_FILES["$img"]["tmp_name"]);
      if($check !== false) {
        echo "le fichier est une image - " . $check["mime"] . ".";
      } else {
        echo "Le fichier n'est pas une image.";
      
      }
    }


// vérifie si le fichier existe déja
    if (file_exists($targetFile)) {
      
      return;
    }

// Vérifie la taille de l'image
    if ($_FILES["$img"]["size"] > 2500000) {
      
      return $error = "<span class='text-danger'>Désolé l'image est trop volumineuse (elle doit être inférieur à 2.5Mo)</span>";
    }

// Limitation des format de fichier
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") {
      
      return $error = "<span class='text-danger'>Désolé, sont autorisés seulement les fichiers JPG, JPEG & PNG</span>";
      
    }

    
  }
  
}
