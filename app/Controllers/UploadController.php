<?php 

namespace Projet\Controllers;

class UploadController
{
  /* ----------- Controller gérant l'upload des images ----------- */

  public function uploadimg($img) 
  {
    
    
    $targetDir = "app/Public/Front/img/";
    $targetFile = $targetDir . basename($_FILES["$img"]["name"]);
    $imageFileType = strtolower(pathinfo($targetFile,PATHINFO_EXTENSION));
    $upload = 1;


// Vérifie si l'image est valide
    if(isset($_POST["submit"]) && self::checkvalid($img) == true) 
    {
      return "<span class='text-green'>le fichier est valide.";
    } elseif (isset($_POST["submit"]) && self::checkvalid($img) == false)
    {
      return "<span class='text-red'>Le fichier n'est pas une image valide.";
    }


// vérifie si le fichier existe déja
    if (file_exists($targetFile)) 
    {
      
      return $targetFile;
      
    }

// Vérifie la taille de l'image
    if (self::checksize($img) == true)
    {
      $upload = 0;
      return $error = "<span class='text-red'>Désolé l'image est trop volumineuse (elle doit être inférieur à 2.5Mo)</span>";
    }

// Limitation des formats de fichier

    if(self::checkformat($imageFileType) == true)
    {
      $upload = 0;
      return $error = "<span class='text-red'>Désolé, sont autorisés seulement les fichiers JPG, JPEG & PNG</span>";
    }

    if($upload == 1)
    {
    move_uploaded_file($_FILES["$img"]["tmp_name"], $targetFile);
    return $targetFile;

    }

  }

  private static function checksize($img) 
  {
    
    if ($_FILES["$img"]["size"] > 2500000) {
      return true;
      
    }
  }

  private static function checkformat($imageFileType)
  {
    if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg")
    {
      return true;
    }
  }
  private static function checkvalid($img)
  {
    
    $check = getimagesize($_FILES["$img"]["tmp_name"]);

      if($check !== false) {
        $upload = 1;
        return true;
        
      } else {
        $upload = 0;
        return false;
        
      }
  }
  
}


