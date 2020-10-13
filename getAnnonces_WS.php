<?php 
include_once 'bdd.php' ;	

if (isset($_GET['filtre']))
{
	$filtre = $_GET['filtre'] ;

	if ( $filtre != null )
	{
		$req = "SELECT * FROM `annonces` WHERE ( 
				annonces.titre LIKE '%".$filtre."%' 
			OR annonces.description LIKE '%".$filtre."%'
			OR annonces.categorie LIKE '%".$filtre."%'
			OR annonces.nom_vendeur LIKE '%".$filtre."%'
			OR annonces.prix LIKE '%".$filtre."%'
			OR annonces.date_ajout LIKE '%".$filtre."%'
		)" ;
	}else 
		  $req = "SELECT * FROM `annonces` " ;
}else 
	$req = "SELECT * FROM `annonces` " ;
	
	$bd = connexionbd() ; 
	$table = requete($bd, $req) ; 

echo (json_encode($table)) ;

?>