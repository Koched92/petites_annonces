<?php
error_reporting(E_ALL);
session_start() ; 
include_once 'bdd.php'; 

?><!DOCTYPE html>
<html lang="en">
<head>
<title>Colo Shop</title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="description" content="Colo Shop Template">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="styles/bootstrap4/bootstrap.min.css">
<link href="plugins/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/owl.carousel.css">
<link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/owl.theme.default.css">
<link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/animate.css">
<link rel="stylesheet" type="text/css" href="styles/main_styles.css">
<link rel="stylesheet" type="text/css" href="styles/responsive.css">
<link rel="stylesheet" href="styles/bootstrap4/product-list-vertical.css">
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css">
</head>

<body>

<div class="super_container">

	<!-- Header -->
<?php include_once 'header.php' ; ?>
	
	<!-- Contenu -->	
	<br/>
<div style="margin-top: 200px;">
	
	<ul class="product-list-vertical contenu-de-page" >       

	<?php 
		 
	$bd = connexionbd() ; 
	$req = "SELECT * FROM `annonces` " ;  	
	$liste_annonces = requete($bd, $req) ; 
	echo count($liste_annonces).' Resultats au total<br/>' ;
	foreach ($liste_annonces as $row => $link) 
	{		

		echo '<li >

            <a href="#" class="product-photo">
                <img src="'.$link['photo'].'" height="160" alt="product" />
            </a>

            <div class="product-details">
               
            	
                <h2>'.$link['titre'].'</h2>
               
                
                <div class="product-rating">
                    <br>

                    <span  style="color:#868e96;font: normal 12px sans-serif;">'.$link['categorie'].'</span> 
					<br>
					<br>
					<span style="color:#5d5d5d;font: normal 12px sans-serif;">Ajouté par: '.$link['nom_vendeur'].' <span style="float: right;">Le '.$link['date_ajout'].'</span></span>
                </div>
                <p class="product-description">'.$link['description'].'</p>' ;

                
                if ( isset($_SESSION['username']) )
                {
                	if ($_SESSION['username'] == $link['nom_vendeur'] )
                	{
                		echo '<button style="width:150px;">Supprimer</button>';
                	}else 
                		echo '<button style="width:150px;">Acheter maintenant</button>'; 
                }else 
                	echo '<button style="width:150px;">Acheter maintenant</button>'; 
                
                echo '<p class="product-price">'.$link['prix'].' €</p>
            </div>

        </li>' ;
	}
		
	?>       

    </ul>
	
</div>
	






	
	

	
	<!-- Footer -->

	<?php include_once 'footer.php' ;?>

</div>

<script src="js/jquery-3.2.1.min.js"></script>
<script src="styles/bootstrap4/popper.js"></script>
<script src="styles/bootstrap4/bootstrap.min.js"></script>
<script src="plugins/Isotope/isotope.pkgd.min.js"></script>
<script src="plugins/OwlCarousel2-2.2.1/owl.carousel.js"></script>
<script src="plugins/easing/easing.js"></script>
<script src="js/custom.js"></script>
<script src="js/global.js"></script>
</body>

</html>
