<?php 
error_reporting(E_ALL);

session_start();
include_once 'bdd.php';

if (isset($_SESSION['username'])) // si l'utilisateur est authentifié
{

	if ( isset($_GET['id']) ) 
	{
		$idAnnonce = $_GET['id'] ;

		$bd = connexionbd() ; 

		if ( $idAnnonce != null )
		{
			$req = "DELETE FROM annonces 
						WHERE id = '".$idAnnonce."' 
						AND nom_vendeur = '".$_SESSION['username']."'" ; 

			$res = $bd->query($req) ; 

		}
		
		if ( $res )
		{
			$json['result'] =  ' delete successful' ;	
		}else 
			$json['result'] =  'delete failed' ;


	}else if ( isset($_POST['nv_titre']) && isset($_POST['nv_description']) && isset($_POST['nv_categorie']) && isset($_POST['nv_photo']) && isset($_POST['nv_nom_vendeur']) && isset($_POST['nv_prix']) && isset($_POST['nv_lat']) && isset($_POST['nv_lon']) )
	{
		$titre = $_POST['nv_titre'] ;
		$description = $_POST['nv_description'];
		$categorie = $_POST['nv_categorie'];
		//$nomVendeur = $_POST['nv_nom_vendeur'];
		$nomVendeur = $_SESSION['username'];
		$prix = $_POST['nv_prix'];
		$photo = $_POST['nv_photo'];
		$rdv_lat = $_POST['nv_lat'];
		$rdv_lon = $_POST['nv_lon'];

		$bd = connexionbd() ; 
		$bd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);	
		try
		{
			$req = "INSERT INTO annonces (`id` , `titre`, `description`, `categorie` , `nom_vendeur` , `prix` , `photo` , `rdv_lat` , `rdv_lon` , `date_ajout`) VALUES (DEFAULT ,'$titre' , '$description' , '$categorie', '$nomVendeur', '$prix' , '$photo' , '$rdv_lat', '$rdv_lon' , DEFAULT )" ; 

			$res = $bd->query($req) ; 
		}catch (Exception $e)
		{
			die('Erreur : ' . $e->getMessage());
		}

		if ( $res )
		{
			$json['result'] =  'add successful'  ;	
		}else 
			$json['result'] =  'add failed'  ;
		
	}else 
		$json['result'] = 'unknown request' ;

	echo (json_encode($json)) ;


}else // si l'utilisateur n'est pas authentifié
{
	header("HTTP/1.1 401 Unauthorized");
	exit;
}

?>