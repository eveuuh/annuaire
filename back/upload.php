<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


include("config.php");
include ("header.php");

$photo='';
$userId= $_SESSION['id'];
if(isset($_FILES['photo']['name']))
{
    $photo_name =$_FILES['photo']['name'];
    $valid_extensions = array("jpg","GIF","png");
    $extension = pathinfo($photo_name, PATHINFO_EXTENSION);
   //if(in_array($extension, $valid_extensions))
    //{   
        $upload_path = 'upload/' . time() . '.' .$extension;
        if(move_uploaded_file($_FILES['photo']['tmp_name'],$upload_path))
        {
            $message = 'Image uploadée';
            $photo = $upload_path;
            $rqt= 'SELECT * FROM Profils WHERE AdherentID=:id';
            $statement = $connexion->prepare($rqt);
            $statement->bindParam(':id',$userId);
            $statement->execute();
            $result = $statement->fetchAll(PDO::FETCH_ASSOC);
            echo (count($result));
            if(count($result)>=1){
                $rqt= 'UPDATE Profils set photo=:photo WHERE AdherentID=:id';
            }
            else {
                $rqt='INSERT INTO Profils (photo,AdherentId, titre) values (:photo, :id, "")';
            } 
            try {
                $statement = $connexion->prepare($rqt);
                $statement->bindParam(':photo', $photo);
                $statement->bindParam(':id', $_SESSION['id']);
                $statement->execute();

                echo json_encode(["statut" => "ok","description"=>"Photo bien enregistrée", "photo"=>"$photo"]);
                exit;
            } catch(Exception $exception) {
                // echo $exception->getMessage();
                echo json_encode(["statut" => "erreur","description"=>"'.$exception->getMessage().'"]);

              
                exit;
            } 
        }
        else 
        { 
            $message = 'Il y a eu erreur pendant le telechargement de la photo'.$_FILES["photo"]["error"];
        }
          
   /* }    
    else
        {
            $message = 'Seulement les.jpg, .gif et .png images peuvent être téléchargées';
        }*/
            
    }

else
{
    $message = 'Seulement les.jpg, .gif et .png images peuvent être téléchargées';
}


$output = array (
    'message' => $message,
    'photo' => $photo
);

echo json_encode($output);