<?php
session_start();

$nom = $_POST['nom'];
$description = $_POST['description'];
$prix = $_POST['prix'];
$createur = $_POST['createur'];
$categorie = $_POST['categorie'];



//upload file image

$target_dir = "../../images/";
$target_file = $target_dir . basename($_FILES["image"]["name"]);
if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
$image = $_FILES["image"]["name"];
} else {
  echo "Sorry, there was an error uploading your file.";
}

$date = date('Y-m-d');

include "../../inc/functions.php";
$conn = connect();

//3-Creation de la requette

$requette = "INSERT INTO produit (nom,description,prix,image,categorie,createur,date_creation) VALUES ('$nom', '$description','$prix','$image','$categorie','$createur', '$date')";

//3-execution de la requette

$resultat = $conn->query($requette);

if($resultat){
    header('location:liste.php?ajout=ok');
}



?>