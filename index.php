<?php
session_start() ; 
//include_once 'bdd.php';
//creation_table() ;
//insertion_exemples() ;

?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Petites Annonces | Accueil</title>
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
</head>

<body>

<div class="super_container">

	<!-- Header -->

<?php  include_once 'header.php' ?>
	<!-- Slider -->

	<div class="main_slider" style="background-image:url(images/slider_2.jpg)">
		<div class="container fill_height">
			<div class="row align-items-center fill_height">
				<div class="col" style="margin-bottom:280px;" >
					<div class="main_slider_content" >
					
						<h2>Bienvenue sur PETITES<span style="color:#fe4c50;font-family: 'Poppins', sans-serif;">ANNONCES</span></h2>
						<br>
						<h6>votre site de référence pour consulter et publier gratuitement des petites annonces <br> en France</h6>
						<div class="red_button " style="padding-right:10px;padding-left:10px;"><a href="listeAnnonces.php">TROUVER</a></div>
					</div>
				</div>
			</div>
		</div>
	</div>

	
	<!-- Footer -->
<?php  include_once 'footer.php' ?>

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
