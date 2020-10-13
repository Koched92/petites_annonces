<?php

session_start() ; 

function validerUtilisateur( $login , $mdp)
{

	$json = file_get_contents("user_db.json");
	$array = json_decode($json,true);

	foreach ($array as $key => $jsons) 
	{ 
	    if ( strcasecmp($jsons['username'], $login ) == 0 && $jsons['password'] == $mdp) 
	    {	    	
	    	return $jsons['username'] ;
	    }
	}

	return null ;
}


if ( isset($_POST['login']) && isset($_POST['password'])) //Si on demande au WS de s'authentifier
{
	$login = $_POST['login'] ;
	$mdp = $_POST['password'] ; 
	$auth = validerUtilisateur( $login , $mdp) ; 
	if ( $auth == null ) 
	{		
		$reponse['resultat'] = 0 ;
    	echo json_encode($reponse) ;	
	}else 
	{		
		$_SESSION['username'] = $auth ; 		

		$reponse['resultat'] = 1 ; 			
		$reponse['username'] = $auth ; 
		echo json_encode($reponse) ;
	}
}else  // sinon traiter l'appel au WS comme demande de deconnexion
{	
	session_destroy();
	header("location: index.php"); 
	exit();
}


?>