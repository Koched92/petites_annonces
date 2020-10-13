<?php
error_reporting(E_ALL);
session_start() ; 
include_once 'bdd.php'; 

?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Petites Annonces | Gestion des annonces</title>
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


	
	<div style="width:70%;margin-left:15% ; margin-top:200px;">		

		

		<?php 
			if (isset($_SESSION['username']))
			{
				echo '
					<form id="form_ajout" onsubmit="return submitFormAjout(event)" >
			
		<div >
		
			<div>
				<label style="margin-top: 25px;">Titre : <span class="text-danger">*</span></label>
				<input type="text" class="form-control" name="nv_titre" required/>
			</div>
			<div>
				<label>Description : <span class="text-danger">*</span></label>
				<input type="text" class="form-control" name="nv_description" required/>
			</div>
			<div >
				<label>Categorie : <span class="text-danger">*</span></label>
				<input type="text" class="form-control" name="nv_categorie" required/>
			</div>
			<div class="top-margin">
				<!--<label>Nom du vendeur : <span class="text-danger">*</span></label>-->
				<input type="hidden" class="form-control" value="'.$_SESSION['username'].'" name="nv_nom_vendeur" required/>
			</div>
			<div class="top-margin">
				<label>Prix<span class="text-danger">*</span></label>
				<input type="text" class="form-control" name="nv_prix" required/>
			</div>
			<div class="top-margin">
				<label> Lien photo<span class="text-danger">*</span></label>
				<input type="text" class="form-control" name="nv_photo" required/>
			</div>
			<div class="top-margin">
				<label>Latitude<span class="text-danger">*</span></label>
				<input type="text" class="form-control" name="nv_lat" required/>
			</div>
			<div class="top-margin">
				<label>Longitude<span class="text-danger">*</span></label>
				<input type="text" class="form-control" name="nv_lon" required/>
			</div>
			<br> 
			<div class="row">
				<div class="col-lg-8">
					
				</div>
				<div class="col-lg-4 text-right">
					<input class="btn btn-success" type="submit" id="btn_ajouter" name="ajouter_annonce" value="Ajouter"/>
				</div>
			</div>
			
		</div>


		</form>


		<br/>
		<br/>' ;
			
			}

		?>
		
		<hr/>
		<br/>
		<div >
			
			<input type="text" class="form-control" id="filtre_annonces" placeholder="Rechercher une annonce">
			<div style="float: right; ">
				<br>
				<button class="btn btn-info" type="submit" id="afficher_annonces_btn" onclick="afficherAnnonces(this)">Afficher les données</button>
			</div>
		</div>
		<br/>
		


	</div>

	<br/>
	<br/>
	<br/> 


	<div > 	
		<ul class="product-list-vertical" id="contenu-de-page"  > </ul>
	</div>
	
	
	<!-- Footer -->

	<?php include_once 'footer.php' ; ?>

</div>

<script src="js/jquery-3.2.1.min.js"></script>
<script src="styles/bootstrap4/popper.js"></script>
<script src="styles/bootstrap4/bootstrap.min.js"></script>
<script src="plugins/Isotope/isotope.pkgd.min.js"></script>
<script src="plugins/OwlCarousel2-2.2.1/owl.carousel.js"></script>
<script src="plugins/easing/easing.js"></script>
<script src="js/custom.js"></script>
<script type="text/javascript" src="js/global.js"></script> <!-- Mon fichier -->

</body>

</html>
